<?php
$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Registro excluido com sucesso";
} else {
    echo "Erro ao excluir registro: " . $conn->error;
}
?>
<a href="../painel_adm/index.html" class="btn btn-success">voltar</a>