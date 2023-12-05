<?php
function productTemplate($img='', $title, $price,$desconto, $id){
    return <<<EOF
    
        <div class="col-4">
            
            <div class="card" style="width: 18rem">
                <a href="produto/index.php?id=$id" style="text-decoration:none">
                    <img
                    class="card-img-top"
                    src="$img"
                    alt="Imagem de capa do card"
                    />
                    <div class="card-body">
                        <h5 class="card-title">$title</h5>
                        <p class="card-text" style="margin-bottom:0">
                            $desconto
                        </p>
                        <p class="card-text">
                            R$ $price
                        </p>
                    </div>
               </a>
            </div>
        </div>
    
    EOF;
}    