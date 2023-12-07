<?php
session_start();
include_once '../../base.php';
if(isset($_SESSION['adm-user'])){
  header('Location: ../../painel_adm');
}
echo simpleBase(<<<EOF
<main style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;background-color:white">
<div style="width:30vw; border: 1px, solid, black">
<h1>Login</h1>
<form class="mx-auto" action="" method="post" style="align-items: center">
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
</div>
</main>
EOF);

if ($_POST){
    require_once '../../infra/conexao.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM adm WHERE username = '$username'";
    
    $result = $conn->query($query);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['adm-row'] = $row['cargo'];
            $_SESSION['adm-id'] = $row['id'];
            header("Location: ../../painel_adm");

        } else {
            echo "Senha incorreta";
        }
    } 
    else {
        echo "Usuário não encontrado";
    }
}
$conn->close();
?>
