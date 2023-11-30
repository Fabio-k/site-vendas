<?php
session_start();
require_once 'base.php';
if($_SESSION['username']){
    header("Location: /index.php");
}
echo simpleBase(
    <<<EOF
    <main style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;">
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
        </div>
        <input type="submit" value="login" class="btn btn-primary" />
    </form>
    <a class="btn btn-light btn-outline-secondary" href=""><span><img src="assets/email_icon.png"></span>sign up with email</a>
    </div>
    </main>
    EOF
);
require_once 'infra/conexao.php';
if ($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE nome = '$username'";
    
    $result = $conn->query($query);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password_hash'])) {
            
            var_dump($_SESSION);
            $_SESSION['username'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            header("Location: /index.php");

        } else {
            echo "Senha incorreta";
        }
    } 
    else {
        echo "Usuário não encontrado";
    }
}

?>
