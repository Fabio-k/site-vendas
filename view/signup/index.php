<?php
require_once "../../base.php";
$path = $_SERVER['PHP_SELF'];
echo simpleBase(<<<EOF
        <main class="" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;">
        <h1>Cadastrar</h1>
            <form action="$path" method="post">
                <div class="mb-3" ><input type="text" class="form-control" placeholder="digite nome de usuario" name="username" required></div>
                <div class="mb-4"><input type="password" class="form-control" placeholder="digite a senha" name="password" required></div>
                <div class="mb-4" ><input type="text" class="form-control" placeholder="digite nome de email" name="email" required></div>
                <input type="submit" class="btn btn-primary" value="cadastrar">
            </form>
        </main>
    EOF);
if($_POST){
    require_once "../../infra/conexao.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql_insert = "INSERT INTO users (nome, password_hash, email) VALUES ('$username', '$hashed_password', '$email')";
    if($conn->query($sql_insert) === TRUE){
        session_start();
        $_SESSION['username'] = $row['nome'];
        $_SESSION['id'] = $row['id'];
        header("Location: ../index.php");
    }
    else{
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}$conn->close();
?>
