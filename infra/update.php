
<?php
require_once "conexao.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
if($_POST){
    if($_POST["tipo"] == "usuario"){
        $stmt = $conn->prepare("UPDATE users SET nome = ?, email = ?, endereco = ? WHERE id = ?");
        $stmt->bind_param("ssi", $_POST['nome'], $_POST['email'], $_POST['id'], $_POST['endereco']);

        if($stmt->execute()){
            echo "usuario atualizado com sucesso";
        }
    }elseif($_POST['tipo'] == "produto"){
        $path_image = $_POST['path_image'];
        
        if(isset($_FILES["image"])) {
            echo "image set";
            $target_dir = "../assets/uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $path_image = $target_file;
            }
        }
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ?, path_image= ?, quantidade= ?, desconto= ? WHERE id = ?");
        $stmt->bind_param("ssssiii", $_POST['nome'], $_POST['preco'], $_POST['descricao'], $path_image, $_POST['quantidade'], $_POST['desconto'], $_POST['id']);

        if($stmt->execute()){
            echo "produto atualizado com sucesso";
        }
    }
}

?>
<a href="../painel_adm/" class="btn btn-success">voltar</a>