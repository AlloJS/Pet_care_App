<?php require_once(ROOT.'/controller/animalsController.php') ?>
<div class="search">
    <div>
        <a href="?page=setAnimals">
            + NUOVO
        </a>
    </div>
</div>

<main>
    <?php 
        foreach ($myAnimals as $myAnimal){
            $path_img = PATH . 'public/' . $myAnimal['img_profilo'];
        echo "
            <div class='card'>
                <div class='card-header '>
                    <div><img src='$path_img' width='60px'/></div>
                    <div>  
                        <div>$myAnimal[nome]</div>
                        <div>$myAnimal[razza]</div>
                    </div>
                </div>
                <div class='card-body'>
                    <a href='?page=animalDetails&animalId= $myAnimal[animalId]' class='input-submit-login text-center'>DETTAGLI</a>
                </div>
            </div>
        ";
        }
    ?>
    
</main>