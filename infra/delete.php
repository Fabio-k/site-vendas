<?php
require_once "conexao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = (int) $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Registro excluido com sucesso";
} else {
    echo "Erro ao excluir registro: " . $conn->error;
}$conn->close();
?>
<a href="../painel_adm/index.html" class="btn btn-success">voltar</a>