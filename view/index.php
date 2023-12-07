<!DOCTYPE html>
<html lang="pt-br">
  <?php
  require_once '../base.php';
  define('ASSETS', '../assets/');

  echo myHeader();?>
  <body style="background-color: #dddbdb">
    <?php echo navbar() ?>

    <div
      id="carouselExampleIndicators"
      class="carousel slide active"
      data-ride="carousel"
      
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img
            class="d-block" style="height: 60vh; width: 100vw;"
            src="<?php echo ASSETS . "Carrosselfone.png" ?>"
            alt="Primeiro Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block" style="height: 60vh; width: 100vw;"
            src="<?php echo ASSETS . "Carrosselmouse.png"?>"
            alt="Segundo Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block" style="height: 60vh; width: 100vw;"
            src="<?php echo ASSETS . "Novatecnologia.png" ?>"
            alt="Terceiro Slide"
          />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div>
    <br />
    <div class="container">
      <div class="mx-auto p-4" style="width: 800px">
        <h1 class="text-center">
          <strong>Produtos em Destaque</strong>
        </h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        
        <?php include '../produtos.php';
        require_once  '../infra/conexao.php';
        $sql = "SELECT * FROM produtos where id IN (SELECT id_produto FROM produto_destaque)";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo productTemplate($row['path_image'], $row['nome'], $row['preco'], $row['desconto'], $row['id'], $row['quantidade']);
        }
        ?>
      </div>
    </div>
  
    <?php
		echo footer();
	?>
  </body>
</html>
