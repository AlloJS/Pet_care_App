<?php require_once(ROOT . '/controller/animalsController.php');?>
<main class="main-details">
    <?php 
        foreach($myAnimalDetail as $myAnimal){
            
            $path_img = PATH . 'public/' . $myAnimal['img_profilo'];
            $timestamp = strtotime($myAnimal['data_di_nascita']); 
            $birthday = date('d/m/Y',  $timestamp);
            $years = date('Y') - date('Y',  $timestamp);
            $denominazione = $myAnimal['denominazione'];
            $descrizione = $myAnimal['descrizione'];
            if($myAnimal['descrizione'] == "" || $myAnimal['descrizione'] === NULL){
                $descrizione = "Nessuna descrizione";
            }
            if($myAnimal['denominazione'] == "" || $myAnimal['denominazione'] === NULL){
                $denominazione = "Nessuna patologia";
            }
            echo "
                <div class='container-details'>
                    <div id='section-1'>
                        <div class='card-detail-header'>
                            <div><img src='$path_img' width='60px'/></div>
                            <div>$myAnimal[nome]</div>
                        </div>
                        <div class='card-detail-body'>
                            <div>
                                <h3 class='text-lightblue'>Sesso</h3>
                                <div>$myAnimal[sesso]</div>
                            </div>
                            <div>
                                <h3 class='text-lightblue'>Peso</h3>
                                <div>$myAnimal[peso] Kg</div>
                            </div>
                            <div>
                                <h3 class='text-lightblue'>Anni</h3>
                                <div>$years</div>
                            </div>
                            <div>
                                <h3 class='text-lightblue'>Data di nascita</h3>
                                <div> $birthday</div>
                            </div>
                        </div>
                    </div>
                <div id='section-2'>
                    <div class='card-detail-header'>
                        <div>
                            <div>$denominazione</div>
                        </div>
                    </div>
                    <div class='card-detail-header'>
                        <div class='text-dark'>$denominazione: $descrizione</div>
                    </div>
                </div>
                <div id='section-3'>
                    <div class='card-detail-header'>
                        VETERINARIO REFERENTE
                    </div>
                </div>
                <div class='absolute-bottom-right'>
                    <a href='?page=animals' class='input-submit-login '>INDIETRO</a>
                    <a href='?page=modifyAnimal&id=$myAnimal[animalId]' class='input-submit-login '>MODIFICA</a>
                </div>
            </div>
            
            ";
        }

    ?>
    
    

</main>