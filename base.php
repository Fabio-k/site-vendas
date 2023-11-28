<?php
	function myHeader($type="full", $css = "assets/css/base.css"){
        if($type == "full"){
            $links = <<<EOF
                <script
                    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"
                ></script>
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                    crossorigin="anonymous"
                ></script>
                <script
                    src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                    crossorigin="anonymous"
                ></script>
                EOF;
        }
        else{
            $links = "";
        }
		return <<<EOF
		    <head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="description" content="Site" />
			<meta name="author" content="Rubens Garcia Junior" />
			<title>Apresentação de Site</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" type="text/css" href="$css">
			$links
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
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php"
                        >Login</a
                    >
                    </li>
                </ul>
                
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
