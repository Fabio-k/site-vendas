<?php
session_start();
require_once '../../base.php';
$display_price = "<p class='h3'>R$ $_GET[price]</p>";
$desconto = $_GET['desconto'];

require_once '../../infra/conexao.php';
$sql = "SELECT * FROM produtos where id = $_GET[id]";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $desconto = $row['desconto'];
    $quantidade_produto = $row['quantidade'];    
}
$disponibilidade = "<p class='text-success'>estoque disponivel</p>";
if($quantidade_produto <= 0){
    $quantidade = "";
    $disponibilidade = "<p class='text-danger'>estoque indisponivel</p>";
}else{
    $quantidade = "<select class='form-select' aria-label='Default select example' name='quantidade'>";
    for ($i = 1; $i <= $_GET['quantidade']; $i++) {
        $quantidade .= "<option value='$i'>$i</option>";
    }
    $quantidade .= "</select>";
}

if($desconto != "0"){
    $price = $_GET['price'] - $_GET['price'] * $_GET['desconto'] / 100;
    $display_price = "<p style='margin-bottom:0; text-decoration: line-through'>R$ $_GET[price]</p><p class='h3'>R$ $price <span class='h5' style='color:green'>$desconto% off</span></p>";
}

echo basePage(
    <<<EOF
    <div style="background-color:white;margin-top: 87px; margin-left:10vw; margin-right:10vw; padding:30px; border-radius:10px">
        <div class="row"  style="padding-bottom:10vh">
            <div class="col-5 d-flex justify-content-center" style="height:140vh">
                <img src="../$_GET[img]" alt="$_GET[nome]" style="position: sticky; top: 10;max-width: 100%;
    height: 50vh;">
            </div>
            <div class="col-4">
                <h1>$_GET[titulo]</h1>
                $display_price
                
                <p>Descrição</p>
            </div>
            <div class="col-3">
                <form action="" method="post" class="d-flex flex-column justify-content-center" style="border: 1px solid gray; padding:10px">
                    <input type="hidden" name="table" value="carrinho">
                    $disponibilidade
                    <p >quantidade: </p>
                    $quantidade
                    <div class="mb-3"><a class="btn btn-large btn-primary btn-block" href="$_GET[link]" style="width:80%">Comprar</a></div>
                    <button type="submit" name="add_to_cart" class="btn btn-large btn-primary btn-block" style="width:80%">Adicionar ao carrinho</button>
                </form>
            </div>
            <hr style="margin-top:30px">
        </div>
        <div class="d-flex justify-content-center" style="height:50vh;">
            <h1>perguntas e respostas</h1>
            <form action="" method="post">
                <input type="hidden" name="id_produto" value="$_GET[id]">
                <input type="hidden" name="id_usuario" value="$_SESSION[id]">
                <input type="hidden" name="table" value="pergunta_resposta">
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pergunta</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <div>
                
            </div>
        </div>
    </div>
        
EOF);

if($_POST){
    if(!isset($_SESSION['id'])){
        echo "<script>alert('faça login para enviar uma pergunta')</script>";
        return;
    }
    if ($_POST['table'] == "pergunta_resposta"){
         $sql = "INSERT INTO perguntas (id_produto, id_usuario, pergunta) VALUES ($_GET[id], $_SESSION[id], '$_POST[pergunta]')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('pergunta enviada')</script>";
        }
    }
    elseif ($_POST['table'] == 'carrinho'){
        $sql = "INSERT INTO carrinho (id_produto, id_user, quantidade) VALUES ($_GET[id], $_SESSION[id], $_POST[quantidade])";
        $sql_check = "SELECT * FROM carrinho WHERE id_produto = $_GET[id] AND id_user = $_SESSION[id]";
        $result_check = mysqli_query($conn, $sql_check);
        if(mysqli_num_rows($result_check) > 0){
            $sql = "UPDATE carrinho SET quantidade = quantidade + $_POST[quantidade] WHERE id_produto = $_GET[id] AND id_user = $_SESSION[id]";  
        }
        $result = mysqli_query($conn, $sql);
        if($result){
           $sql = "UPDATE produtos SET quantidade = quantidade - $_POST[quantidade] WHERE id = $_GET[id]";
           $result = mysqli_query($conn, $sql);
        }
    }
   
}
$conn->close();