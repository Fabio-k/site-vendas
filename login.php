<?php
require_once 'base.php';
echo basePage(
    <<<EOF
    <main class="container-fluid" style="display: flexbox; flex-direction: row;">
    <h1 style="color: white">Login</h1>
    <form class="mx-auto" action="login.php" method="post">
        <div class="row mb-3">
        <div class="form-group col-6">
            <input
            class="form-control"
            type="text"
            name="usename"
            id=""
            placeholder="Digite o usuario"
            />
        </div>
        </div>
        <div class="row mb-4">
        <div class="form-group col-6">
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
    </main>
    EOF
);
?>
