<?php
    include_once "../base.php";
    echo myHeader();
?>
<div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content: center; flex-direction:column">
<?php
if($_POST){
    require_once "conexao.php";
    if($_POST["tipo"] == "usuario"){
        $username = $_POST['nome'];
        $password = $_POST['senha'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $status = "";
        $erro = "<span style='color:red'>Erro:</span>";
        $sql_insert = "INSERT INTO users (nome, password_hash, email, endereco) VALUES ('$username', '$hashed_password', '$email', '$endereco')";
        
        $status .= verify_password();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status .=  "$erro email inválido";
        }

        if($status == ""){
            if (isEmail_InUse($conn)){
                $status .= "$erro email já cadastrado";
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
            <div style="width:50vw">
                <h3>Status do banco de dados: $bd_status</h1>
                <h3>Status da requisição: $status</h1>
                <h4>dados recebidos:</h1>
                <p>nome: $username</p>
                <p>email: $email</p>
                <p>senha: $password</p>
                <p>endereco: $endereco</p>
            </div>
        EOF;
    }
    else if ($_POST["tipo"] == "produto"){
        $nome = $_POST['nome'];
        $preco = $_POST['preço'];
        $descricao = $_POST['descricao'];
        $status = "";
        $erro = "<span style='color:red'>Erro:</span>";
        $path_image = null;
        
        if(isset($_FILES["image"])) {
            echo "image set";
            $target_dir = "../assets/uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $path_image = $target_file;
        }
}

        $sql_insert = "INSERT INTO produtos(nome, preco, descricao, path_image) VALUES ('$nome', '$preco', '$descricao', '$path_image')";
        if($conn->query($sql_insert) === TRUE){
            $status =  "produto criado com sucesso";
        }
        else{
            $status = "$erro: " . $sql_insert . "<br>" . $conn->error;
        }

        echo <<<EOF
           <div style="width:50vw">
                <h3>Status do banco de dados: $bd_status</h1>
                <h3>Status da requisição: $status</h1>
                <h4>dados recebidos:</h1>
                <p>nome: $nome</p>
                <p>preco: $preco</p>
                <p>descricao: $descricao</p>
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

function isEmail_InUse($conn){
    $email = $_POST['email'];
    $sql_verify_email = "SELECT * FROM users WHERE email = '$email'";
    $result_email = $conn->query($sql_verify_email);
    if($result_email->num_rows > 0){
        return true;
    }
    return false;
}

?>
<a href="../painel_adm/index.html" class="btn btn-success">Voltar</a>
</div>