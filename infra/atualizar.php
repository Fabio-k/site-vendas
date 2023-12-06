<?php
    require_once "../base.php";
    echo myHeader();
?>
<div style="width:100vw; height:100vh; display:flex; align-items:center; justify-content: center; flex-direction:column">
<div style="width:30vw">
    <form action="update.php" class="form" method="post" enctype="multipart/form-data">
<?php
if($_POST){
    require_once "conexao.php";
    $tipo = $_POST["tabela"];
    $id = $_POST["id"];
    if($tipo == "usuario"){
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo <<<EOF
                <div class="mb-3">
                    <input type="text" class="form-control" value="$row[nome]">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" value="$row[email]">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" value="$row[endereco]">
                </div>
            EOF;
        } else {
            echo "Nenhum resultado encontrado";
        }
    }
    else{
        $sql = "SELECT * FROM produtos WHERE id = $id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo <<<EOF
                <img src="$row[path_image]" alt="imagem do produto" id="preview" style="width: 10vw;border-radius:10px">
                <div class="mb-3">
                    <input type="text" class="form-control" name="nome" value="$row[nome]">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control "name="preco" value="$row[preco]">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control "name="quantidade" value="$row[quantidade]">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control "name="desconto" value="$row[desconto]">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descricao" value="$row[descricao]">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" id="image" name="image" value="$row[path_image]">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="path_image" value="$row[path_image]">
                </div>
                <script>document
                .getElementById('image')
                .addEventListener('change', (event) => {
                  const reader = new FileReader()
                  reader.onload = () => {
                    const preview = document.getElementById('preview')
                    preview.src = reader.result
                    preview.style.display = 'block'
                  }
                  reader.readAsDataURL(event.target.files[0])
                })</script>
            EOF;
        } else {
            echo "Nenhum resultado encontrado";
        }
    
    }
}

?>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="tipo" value="<?php echo $tipo ?>">
        <input type="submit" value="salvar alterações">
        
    </form>
</div>
</div>