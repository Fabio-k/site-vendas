<?php
function productTemplate($img, $title, $price,$desconto, $id){
    $display_price = "<p class='h3 text-dark'>R$ $price</p>";
    if($desconto != "0"){
        $discounted_price = $price - $price * $desconto / 100;
        $display_price = "<p style='margin-bottom:0; text-decoration: line-through; color:gray'>R$ $price</p><p class='h3 text-dark'>R$ $discounted_price <span class='h5 text-success'>$desconto% off</span></p>";
    }
    return <<<EOF
    
        <div class="col-4 d-flex justify-content-center" style="padding: 10px">
            <div class="card" style="width: 18rem">
                <a href="produto/index.php?id=$id&titulo=$title&img=$img&price=$price&desconto=$desconto" style="text-decoration:none">
                    <img
                    class="card-img-top"
                    src="$img"
                    alt="Imagem de capa do card"
                    />
                    <div class="card-body">
                        <h5 class="card-title text-dark">$title</h5>
                        $display_price
                    </div>
               </a>
            </div>
        </div>
    
    EOF;
}    