<?php
  session_start();
  if(!isset($_SESSION['adm-id'])){
    header('Location: ../view/login_adm');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/index.css" />
  </head>
  <body>
    <div class="position-fixed sidebar" id="menu">
      <h1 class="text-center">painel do adiministrador</h1>
      <ul class="nav nav-tabs flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#" style="margin-bottom: 0px" id="create"
            >criar novo registro</a
          >
        </li>
        <li class="nav-item">
          <a href="" class="nav-link" href="#" id="read">mostrar registros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="update" href="#" style="margin-bottom: 0px"
            >Atualizar registros</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" id="delete" href="#" style="margin-bottom: 0px"
            >Deletar registros</a
          >
        </li>
      </ul>
    </div>
    <main class="row" style="width: 80%; margin-left: 20%; height: 100vh">
      <div id="content"></div>
    </main>
    <script>
      function showForm() {
        document.getElementById('content').innerHTML = `<div class='card col-4'>
                <p class="card-header">inserir Registro</p>
                <form action="../infra/insert.php" method="post" class="card-body" enctype="multipart/form-data">
                    <select name="tipo" id="createTabela" class="form-control mb-3">
                        <option value="" selected>Selecione uma tabela</option>
                        <option value="usuario">usuario</option>
                        <option value="produto">produto</option>
                        <option value="adm">adm</option>
                        <option value="produto-destaque">produtos-destaque</option>
                    </select>
                    <div id="form-body"></div>
                    
                </form>
            </div>
        `
        document
          .getElementById('createTabela')
          .addEventListener('change', function () {
            var selectedOption = this.value
            var formBody = document.getElementById('form-body')

            if (selectedOption === 'usuario') {
              formBody.innerHTML = `
                 <div class="mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="digite o nome" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="digite a senha" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="digite o email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="endereco" placeholder="digite o endereço" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="criar">
              `
            } else if (selectedOption === 'produto') {
              formBody.innerHTML = `
                    <div class="mb-3" style="width:10vw; ">
                      <img id="preview" class="img-fluid" src="" alt="Image preview" style="display: none; border-radius:10px">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="digite o nome do produto"
                        required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="preço" name="preço" placeholder="digite a preço" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="digite a quantidade" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="desconto" name="desconto" placeholder="digite o desconto" required>
                    </div>
                    <div class="mb-3">
                      <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" placeholder="digite a descrição"></textarea>  
                    </div>
                    <div class="mb-3">
                      <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <input type="submit" class="btn btn-primary" value="criar">
              `
              document
                .getElementById('image')
                .addEventListener('change', (event) => {
                  const reader = new FileReader()
                  reader.onload = () => {
                    const preview = document.getElementById('preview')
                    preview.src = reader.result
                    preview.style.display = 'block'
                  }
                  reader.readAsDataURL(event.target.files[0])
                })
            } else if(selectedOption === 'produto-destaque'){
              formBody.innerHTML = `
                <div class="mb-3">
                    <input type="number" class="form-control" id="id" name="id" placeholder="digite o id do produto" required>
                </div>
                <input type="submit" class="btn btn-primary" value="criar">
              `
            } <?php 
            session_start();
            if ($_SESSION['adm-row'] == 'adm') {
              echo <<<EOF
              else if (selectedOption === 'adm') {
                formBody.innerHTML =`
                    <div class="mb-3">
                          <input type="text" class="form-control" id="nome" name="nome" placeholder="digite o nome" required>
                      </div>
                      <div class="mb-3">
                          <input type="password" class="form-control" id="senha" name="senha" placeholder="digite a senha" required>
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="cargo" placeholder="digite o cargo" required>
                      </div>
                      <input type="submit" class="btn btn-primary" value="criar">`
              }
            EOF;
            } ?>
            
          })
      }
      document.addEventListener('DOMContentLoaded', showForm)
      document.getElementById('create').addEventListener('click', function () {
        event.preventDefault()
        showForm()
      })

      document.getElementById('read').addEventListener('click', function () {
        event.preventDefault()
        document.getElementById('content').innerHTML = `<div class='card col-4'>
                <p class="card-header">Visualizar Registros</p>
                <form action="../infra/select.php" method="post" class="card-body">
                    <div class="mb-3">
                        <select name="tipo" id="tabela" class="form-control" required>
                            <option value="" selected>Selecione uma tabela</option>
                            <option value="usuario">usuario</option>
                            <option value="produto">produto</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="id" name="id" placeholder="digite o id">
                    </div>
                    <input type="submit" class="btn btn-primary" value="visualizar">
                </form>
            </div>
        `
      })
      document.getElementById('update').addEventListener('click', function () {
        event.preventDefault()
        document.getElementById('content').innerHTML = `<div class='card col-4'>
                <p class="card-header">Atualizar Registros</p>
                <form action="../infra/atualizar.php" method="post" class="card-body">
                    <div class="mb-3">
                        <select name="tabela" id="tabela" class="form-control" required>
                            <option value="" selected>Selecione uma tabela</option>
                            <option value="usuario">usuario</option>
                            <option value="produto">produto</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="id" name="id" placeholder="digite o id" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="alterar">
                </form>
            </div>
        `
      })

      document.getElementById('delete').addEventListener('click', function () {
        event.preventDefault()
        document.getElementById('content').innerHTML = `<div class='card col-4'>
                <div class="card-header d-flex justify-content-between align-tems-center">
                  <p class="">Deletar Registros</p>
                </div>
                <form action="../infra/excluir.php" method="get" class="card-body">
                    <div class="mb-3">
                        <select name="tabela" id="tabela" class="form-control" required>
                            <option value="" selected>Selecione uma tabela</option>
                            <option value="usuario">usuario</option>
                            <option value="produto">produto</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="id" placeholder="digite o id" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="deletar">
                </form>
            </div>
        `
      })
    </script>
  </body>
</html>
