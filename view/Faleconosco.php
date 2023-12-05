<!DOCTYPE html>
<?php 
require_once '../base.php';
echo basePage(
  <<<EOF
  <div class="container mt-5 text-light text-center">
      <h1><strong>Fale conosco</strong></h1>
    </div>

    <div class="container mt-5">
      <form>
        <div class="form-group text-light">
          <label for="exampleFormControlInput1">Nome</label>
          <input
            type="name"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="Nome"
          />
        </div>
        <div class="form-group text-light">
          <label for="exampleFormControlInput1">Endereço de email</label>
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="nome@exemplo.com"
          />
        </div>

        <div class="form-group text-light">
          <label for="exampleFormControlTextarea1">Digite seu comentário</label>
          <textarea
            class="form-control"
            id="exampleFormControlTextarea1"
            placeholder="Comentários"
            rows="3"
          ></textarea>
        </div>
      </form>
      <br />
      <a class="btn btn-primary" href="" role="button" aria-expanded="false"
        >Enviar</a>
    </div>
EOF
);
?>