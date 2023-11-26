<!DOCTYPE html>
<html lang="pt-br">
  <?php require_once 'base.php';
  echo myHeader();?>
  <body
    style="
      background-size: cover;
      background-repeat: no-repeat;
      background-image: url('https://img.freepik.com/free-vector/background-realistic-abstract-technology-particle_23-2148431735.jpg?w=1380&t=st=1694369832~exp=1694370432~hmac=37ae88cf7bdade0fefc949d4f8ad717a48c2cfb923dcf6e5c0c0269834e899a4');
    "
  >
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
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            class="d-block mx-auto mt-5 p-4 height-90"
            src="assets/Carrosselfone.png"
            alt="Primeiro Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block mx-auto mt-5 p-4 height-90"
            src="assets/Carrosselmouse.png"
            alt="Segundo Slide"
          />
        </div>
        <div class="carousel-item">
          <img
            class="d-block mx-auto mt-5 p-4 height-90"
            src="assets/Novatecnologia.png"
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
        <span class="sr-only">Anterior</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
    <br />
    <hr />
    <div class="container">
      <div class="mx-auto p-4" style="width: 800px">
        <h1 class="text-center text-light">
          <strong>Produtos em Destaque</strong>
        </h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/cardphone.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Check-out"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/cardmouse.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/cardminiprojetor.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/Luzvideos.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/cardminidrone.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img
              class="card-img-top"
              src="assets/cardcamera.png"
              alt="Imagem de capa do card"
            />
            <div class="card-body">
              <h5 class="card-title">Promoção</h5>
              <p class="card-text">
                Aproveite pois nossos estoques são limitados!
              </p>
              <button
                type="button"
                class="btn btn-lg btn-danger"
                data-bs-toggle="popover"
                data-bs-title="Popover title"
                data-bs-content="And here's some amazing content. It's very engaging. Right?"
              >
                Comprar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />

    <?php
		echo footer();
	?>
  </body>
</html>