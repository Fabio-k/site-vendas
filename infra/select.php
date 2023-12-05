<?php 
require_once "../base.php";
echo myHeader();
?>
<body>
    <div  style="display:flex;height:100vh;width:100vw;align-items:center;justify-content:center;flex-direction:column">
        <table class="table" style="width: 50vw">
            <tr>
                <?php
                    if($_POST["tipo"] == "usuario"){
                        echo <<<EOF
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Endereço</th>
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
                            if($_POST["id"] == ""){
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo <<<EOF
                                        <tr>
                                            <td>{$row["id"]}</td>
                                            <td>{$row["nome"]}</td>
                                            <td>{$row["email"]}</td>
                                            <td>{$row["endereco"]}</td>
                                        </tr>
                                    EOF;
                                }
                            }else{
                                $id = $_POST["id"];
                                $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while($row = mysqli_fetch_assoc($result)){
                                    echo <<<EOF
                                        <tr>
                                            <td>{$row["id"]}</td>
                                            <td>{$row["nome"]}</td>
                                            <td>{$row["email"]}</td>
                                            <td>{$row["endereco"]}</td>
                                        </tr>
                                    EOF;
                                }
                            }
                        }elseif($_POST['tipo'] == "produto"){
                            if(!$_POST["id"] == ""){
                                $id = $_POST["id"];
                                $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();
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
        <a href="../painel_adm/" class="btn btn-success">voltar</a>
    </div>
    
</body>