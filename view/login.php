<?php
session_start();
require_once '../base.php';
require_once '../infra/conexao.php';
if ($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE nome = '$username'";
    $message = "";
    $result = $conn->query($query);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($row['password_hash'] !== NULL & $password, $row['password_hash'])) {
            $_SESSION['username'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            header("Location: index.php");

        } else {
            $message =  "Usuário ou senha incorretos";
        }
    } 
    else {
        $message =  "Usuário ou senha incorretos";
    }
}$conn->close();
echo simpleBase(
    <<<EOF
    <main style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;background-color:white">
    <div style="width:30vw; border: 1px, solid, black">
    <h1>Login</h1>
    <form class="mx-auto" action="login.php" method="post" style="align-items: center">
        <div class="mb-3">
        <div style="border">
            <input
            class="form-control"
            type="text"
            name="username"
            id=""
            placeholder="Digite o usuario"
            />
        </div>
        <p style="color:red">$message</p>
        </div>
        <div class="mb-4">
        <div>
            <input
            class="form-control"
            type="password"
            name="password"
            id=""
            placeholder="Digite a senha"
            />
        </div>
        <p style="color:red">$message</p>
        </div>
        <input type="submit" value="login" class="btn btn-primary" />
    </form>
    <a class="btn btn-light btn-outline-secondary" href="signup/"><span><img src="../assets/email_icon.png"></span>cadastrar com email</a>
    <a class="btn btn-gray btn-outline-secondary" href="../github.php"><span><img src="../assets/github_icon.png"></span>entrar com o github</a>
    </div>
    </main>
    EOF
);


?>
