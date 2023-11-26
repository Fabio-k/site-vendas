<?php
require_once 'base.php';
echo simpleBase(
    <<<EOF
    <main style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;">
    <div style="width:30vw">
    <h1>Login</h1>
    <form class="mx-auto" action="login.php" method="post" style="align-items: center">
        <div class="mb-3">
        <div style="border">
            <input
            class="form-control"
            type="text"
            name="usename"
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
            name=""
            id=""
            placeholder="Digite a senha"
            />
        </div>
        </div>
        <input type="submit" value="login" class="btn btn-primary" />
    </form>
    <a class="btn btn-dark" href="github.php" style="color:white"><span><img src="assets/github_icon.png"></span>sign in with github</a>
    <a class="btn btn-light btn-outline-secondary" href=""><span><img src="assets/email_icon.png"></span>sign up with email</a>
    </div>
    </main>
    EOF
);
?>
