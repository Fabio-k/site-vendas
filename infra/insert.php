<?php
if($_POST){
    require_once "conexao.php";
    
    if($_POST["tipo"] == "usuario"){
        $username = $_POST['nome'];
        $password = $_POST['senha'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $status = "";
        $erro = "<span style='color:red'>Erro:</span>";
        $sql_insert = "INSERT INTO users (nome, password_hash, email) VALUES ('$username', '$hashed_password', '$email')";
        
        $status .= verify_password();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status .=  "$erro email inválido";
        }

        if($status == ""){
            if (isEmail_Or_User_InUse($conn)){
                $status .= "$erro usuario ou email já cadastrado";
            }else{
                if($conn->query($sql_insert) === TRUE){
                    $status =  "usuario criado com sucesso";
                }
                else{
                    $status = "$erro: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        echo <<<EOF
           <div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content; center; flex-direction:column">
                <h1>dados recebidos:</h1>
                <h2>nome: $username</h2>
                <h2>email: $email</h2>
                <h2>senha: $password</h2>
                <h1>Status da requisição:<br> $status</h1>
           <a href="../painel_adm/index.html">Voltar</a>
           </div>
        EOF;
    }
    if ($_POST["tipo"] == "produto"){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $status = "";
        $erro = "<span style='color:red'>Erro:</span>";
        $sql_insert = "INSERT INTO produtos (nome, preco, descricao) VALUES ('$nome', '$preco', '$descricao')";
        
        if($conn->query($sql_insert) === TRUE){
            $status =  "produto criado com sucesso";
        }
        else{
            $status = "$erro: " . $sql . "<br>" . $conn->error;
        }

        echo <<<EOF
           <div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content; center; flex-direction:column">
                <h1>dados recebidos:</h1>
                <h2>nome: $nome</h2>
                <h2>preco: $preco</h2>
                <h2>descricao: $descricao</h2>
                <h1>Status da requisição:<br> $status</h1>
           <a href="../painel_adm/index.html">Voltar</a>
           </div>
        EOF;
    }
    $conn->close();
}

function verify_password(){
    $password = $_POST['senha'];
    $status = "";
    if(strlen($password) < 8) {
        $status .= "<span style='color:red'>Erro:</span> a senha precisa ter no minimo 8 caracteres<br>";
    }

    if(!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $status .= "<span style='color:red'>Erro:</span> a senha precisa ter letras e numeros<br>";
    }
    return $status;
}

function isEmail_Or_User_InUse($conn){
    $username = $_POST['nome'];
    $email = $_POST['email'];
    $sql_verify = "SELECT * FROM users WHERE nome = '$username'";
    $sql_verify_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql_verify);
    $result_email = $conn->query($sql_verify_email);
    if($result->num_rows > 0){
        return true;
    }
    if($result_email->num_rows > 0){
        return true;
    }
    return false;
}

