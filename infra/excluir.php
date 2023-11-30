<?php
require_once "conexao.php";
require_once "../base.php";
$id = $_GET["id"];
$tabela = $_GET["tabela"];
echo myHeader();
?>
<div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content: center; flex-direction:column">
    <?php 
        if ($tabela == "usuario"){
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);
            $data = mysqli_fetch_assoc($result);
            echo <<<EOF
                <h1>Excluir usuario</h1>
                <form action="delete.php" class="form">
                    <div class="mb-3">
                        <input type="text" class="form-control" value="$data[nome]" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" value="$data[email]" disabled>
                    </div>
                     <input type="hidden" name="id" value="$id">
                     <input type="hidden" name="id" value="$tabela">
            
            EOF;
        }
        elseif ($tabela == "produto"){
            $sql = "SELECT * FROM produtos WHERE id = $id";
            $result = $conn->query($sql);
            $data = mysqli_fetch_assoc($result);
            echo <<<EOF
                <h1>Excluir produto</h1>
                <form action="delete.php" class="form">
                    <div class="mb-3">
                        <img src="$data[path_image]" alt="imagem do produto" style="width: 10vw;border-radius:10px">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" value="$data[nome]" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" value="$data[preco]" disabled>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" value="$data[descricao]" disabled>
                    </div>
                     <input type="hidden" name="id" value="$id">
                     <input type="hidden" name="id" value="$tabela">
                    
            EOF;
        }
      $conn->close();
    ?>
        <p>Tem certeza que deseja excuir esse Registro?</p>
        <input class="btn btn-danger" type="submit" value="excluir">
        <a href="../painel_adm/index.html" class="btn btn-success">voltar</a>
    </form>
</div>