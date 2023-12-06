<?php
require_once '../../base.php';
$display_price = "<p class='h3'>R$ $_GET[price]</p>";
$desconto = $_GET['desconto'];

if($desconto != "0"){
    $price = $_GET['price'] - $_GET['price'] * $_GET['desconto'] / 100;
    $display_price = "<p style='margin-bottom:0; text-decoration: line-through'>R$ $_GET[price]</p><p class='h3'>R$ $price <span class='h5' style='color:green'>$desconto% off</span></p>";
}
echo basePage(
    <<<EOF
    <div style="background-color:white;margin-top: 87px; margin-left:10vw; margin-right:10vw; padding:30px; border-radius:10px">
        <div class="row"  style="padding-bottom:10vh">
            <div class="col-5 d-flex justify-content-center" style="height:140vh">
                <img src="../$_GET[img]" alt="$_GET[nome]" style="position: sticky; top: 10;max-width: 100%;
    height: 50vh;">
            </div>
            <div class="col-4">
                <h1>$_GET[titulo]</h1>
                $display_price
                
                <p>Descrição</p>
            </div>
            <div class="col-3">
                <div class="d-flex flex-column justify-content-center" style="border: 1px solid gray; padding:10px">
                    <p style="font-weight:bold">estoque disponível</p>
                    <p >quantidade: $_GET[quantidade]</p>
                    <div class="mb-3"><a class="btn btn-large btn-primary btn-block" href="$_GET[link]" style="width:80%">Comprar</a></div>
                    <a class="btn btn-large btn-primary btn-block" href="$_GET[link]" style="width:80%">Adicionar ao carrinho</a>
                </div>
            </div>
            <hr style="margin-top:30px">
        </div>
        <div class="d-flex justify-content-center" style="height:50vh;">
            <h1>comentarios</h1>
        </div>
    </div>
        
EOF);
