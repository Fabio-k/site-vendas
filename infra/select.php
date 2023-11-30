<?php 
require_once "../base.php";
echo myHeader();
?>
<body>
    <div  style="display:flex;height:100vh;width:100vw;align-items:center;justify-content:center">
        <table class="table" style="width: 50vw">
            <tr>
                <?php
                    if($_POST["tipo"] == "usuario"){
                        echo <<<EOF
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                        EOF;
                    }elseif($_POST['tipo'] == "produto"){
                        echo <<<EOF
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                        EOF;
                    }
                ?>
            </tr>
            <tbody>
                <?php
                    require_once "conexao.php";
                    if($_POST){
                        if($_POST["tipo"] == "usuario"){
                            
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo <<<EOF
                                        <tr>
                                            <td>{$row["id"]}</td>
                                            <td>{$row["nome"]}</td>
                                            <td>{$row["email"]}</td>
                                        </tr>
                                    EOF;
                                }
                            
                        }elseif($_POST['tipo'] == "produto"){
                            if(!$_POST["id"] == ""){
                                $id = $_POST["id"];
                                $sql = "SELECT * FROM produtos WHERE id = $id";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo <<<EOF
                                        <tr>
                                            <td>{$row["id"]}</td>
                                            <td>{$row["nome"]}</td>
                                            <td>{$row["preco"]}</td>
                                            <td>{$row["descricao"]}</td>
                                        </tr>
                                    EOF;
                                }
                            }else{
                                $sql = "SELECT * FROM produtos";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo <<<EOF
                                        <tr>
                                            <td>{$row["id"]}</td>
                                            <td>{$row["nome"]}</td>
                                            <td>{$row["preco"]}</td>
                                            <td>{$row["descricao"]}</td>
                                        </tr>
                                    EOF;
                                }
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <a href="../painel_adm/index.html" class="btn btn-success">voltar</a>
</body>