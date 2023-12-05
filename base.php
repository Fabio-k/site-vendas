<?php
	function myHeader($css = "assets/css/base.css"){
		return <<<EOF
		    <head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="description" content="Site" />
			<meta name="author" content="Rubens Garcia Junior" />
			<title>Apresentação de Site</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>          <link rel="stylesheet" type="text/css" href="$css">
		</head>
		EOF;
	}
	function footer(){
		return <<<EOF
		<footer class="bg-dark text-light py-2">
			<div class="container">
			<div class="row">
			<div class="col-4 text-right">
			<p>Siga-nos nas redes sociais:</p>
			</div>
			<div class="col-3">
			<img src="assets/redessociais.png" width="100" />
			</div>
			<div class="col-5">
			<p>
				&copy; 2023 Rubens Garcia e Fábio Kazuhiro. Todos os direitos reservados.
			</p>
			</div>
			</div>
			</div>
		</footer>
	EOF;
	}
    function navbar(){
        session_start();
        $login = "";
        if(isset($_SESSION['username'])){
            $login = <<<EOT
                <div class="dropdown">
                   <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" type="button">
                        $_SESSION[username]
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="perfil.php">conta</a></li>
                        <li><a class="dropdown-item" href="compra.php">compras</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            EOT;
        }
        else{
            $login = <<<EOT
                    <a class="nav-link text-white" aria-current="page" href="login.php"
                        >Login</a
                    >
            EOT;
        }
        
        return <<<EOT
            <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-2">
                <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                    <a class="nav-link active" href="QuemSomos.html">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="Ondecomprar.html"
                        >Onde Comprar</a
                    >
                    </li>
                    <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="Faleconosco.php"
                        >Fale Conosco</a
                    >
                    </li>
                </ul>
                <div class="d-flex">
                    $login
                    <a class="nav-link text-white" aria-current="page" href="carrinho.php">
                        <span><img src="assets/carrinho.png"></span>
                    </a>
                </div>
            </nav>
            </header>
        EOT;
    }
    function basePage($content){
        $header = myHeader();
        $footer = footer();
        $nav = navbar();
        return <<<EOT
        $header
        <html lang='pt-br'>
        <body> 
        $nav
        $content
        $footer
        </body>
        </html>
        EOT;
    }
    function simpleBase($content){
        $header = myHeader();
        return <<<EOT
        <html lang='pt-br'>
        $header
        <body> 
        $content
        </body>
        </html>
        EOT;
    }
