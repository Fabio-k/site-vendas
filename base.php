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
		<footer class="bg-dark text-light py-2" style="margin-top:auto">
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
                <div class="dropdown d-flex align-items-center">
                   <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" type="button">
                        <span class="text-white">
                        $_SESSION[username]
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="perfil.php">conta</a></li>
                        <li><a class="dropdown-item" href="compra.php">compras</a></li>
                        <li><a class="dropdown-item" href="/view/index.php?logout=true">Logout</a></li>
                    </ul>
                </div>
            EOT;
        }
        else{
            $login = <<<EOT
                    <a class="nav-link text-white" aria-current="page" href="/view/login.php"
                        >Login</a
                    >
            EOT;
        }
        
        return <<<EOT
        <header class="container-fluid navbar navbar-expand navbar-dark bg-dark py-2">
            <div class="row">
                <div class="col-12" style="width:100vw">
                    <div style="width:100%">
                        <a href="/view/index.php">
                            <img width="300px" src="/assets/logo.png" alt="logo"/>
                        </a>
                    </div>
                </div>
                <nav class=" col-9 d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="QuemSomos.html">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Ondecomprar.html">Onde Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Faleconosco.php">Fale Conosco</a>
                        </li>
                    </ul>
                    
                </nav>
                <div class="col-3">
                    <div class="d-flex ">
                            $login
                            <a class="nav-link" href="/view/carrinho/">
                                <span><img height="30px" src="/assets/shopping-cart.png" alt="shopping-cart"/></span>
                            </a>
                        </div>
                </div>
                    
                </div>
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
        <body style="background-color: #dddbdb; display:flex; flex-direction:column; min-height:100vh"> 
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

    if(isset($_GET['logout'])){
        session_start();
        session_destroy();
        header("Location: index.php");
    }