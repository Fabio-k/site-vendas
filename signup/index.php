<?php
require_once "../base.php";
$path = $_SERVER['PHP_SELF'];
echo simpleBase(<<<EOF
        <main class="" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100vw; height: 100vh;">
        <h1>Sign Up</h1>
            <form action="$path" method="post">
                <div class="mb-3" ><input type="text" class="form-control" placeholder="digite nome de usuario" name="username" required></div>
                <div class="mb-4"><input type="password" class="form-control" placeholder="digite a senha" name="password" required></div>
                <input type="submit" class="btn btn-primary" value="sign in">
            </form>
        </main>
    EOF);
require "../infra/insert.php";
?>
