<?php
require_once '../../base.php';
require_once '../../infra/conexao.php';
session_start();
if(isset($_SESSION['id'])){
    $sql = "SELECT * FROM carrinho WHERE id_user = $_SESSION[id]";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $total = 0;
    $carrinho = "";
    $button = '<a href="../checkout/" class="btn btn-primary">finalizar compra</a>';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $sql = "SELECT * FROM produtos WHERE id = $row[id_produto]";
            $result2 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row2 = mysqli_fetch_assoc($result2);
            $total += $row2['preco'] * $row['quantidade'];
            $carrinho .= "<div class='d-flex justify-content-between'><p>$row2[nome]</p><p>$row[quantidade]</p><p>R$ $row2[preco]</p></div>";
        }
        $carrinho .= "<div class='d-flex justify-content-between'><p>total</p><p></p><p>R$ $total</p></div>";
    }else{
        $carrinho = "<p>seu carrinho está vazio</p>";
        $button = '<a href="../checkout/" class="btn btn-primary disabled">finalizar compra</a>';
    }
}else{
    $carrinho = "<p>faça o logina para acessar o carrinho</p><a href='../login/'>login</a>";
    $button = "";
}
$conn->close();
echo basePage(
    <<<EOF
    <div class="container">
        <div class="d-flex flex-column justify-content-between">
            <h1>Carrinho</h1>
        </div>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column">
                $carrinho
            </div>
            <div>
                $button
            </div>
        </div>
    </div>
EOF
);