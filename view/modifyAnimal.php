<?php 
    require_once(ROOT . '/controller/animalsController.php');
    
    if(!in_array($_GET['id'],$allMyAnimals)){
        return header('Location: ' . PATH . 'view/dashboard.php');
    } 
    
?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/pawprint.png'?> width="40px" alt="">
        <div>Modifica</div>
    </div>
    <div class="text-center">
        <?php if(isset($_SESSION['modifyMessage'])){ echo $_SESSION['modifyMessage'];}?>
    </div>
    <form class="form-set" action="" method="post">
        <?php 
        foreach($mySingleAnimal as $single){
            echo "
            <div>
            <label for=''>Nome*</label>
            <br>
            <input name='name' class='input-login' type='text' value='$single[nome]'>
            </div>
            <div>
                <label for=''>Specie*</label>
                <br>
                <input name='specie' class='input-login' type='text' value='$single[specie]'>
            </div>
            <div>
                <label for=''>Razza*</label>
                <br>
                <input name='razza' class='input-login' type='text' value='$single[razza]'>
            </div>
            <div>
                <label for=''>Sesso*</label>
                <br>
                <select class='input-login' name='sesso'>
                    <option value='$single[sesso]' selected>$single[sesso]</option>
                    <option value='Maschio'>Maschio</option>
                    <option value='Femmina'>Femmina</option>
                </select>
            </div>
            <div>
                <label for=''>Peso*</label>
                <br>
                <input name='peso' class='input-login' type='number' min='0' value='$single[peso]'>
            </div>
            <div>
                <label for=''>Data di nascita*</label>
                <br>
                <input name='birthday' class='input-login' type='date' value='$single[data_di_nascita]'>
            </div>
            <div>
                <label for=''>Ultimo vaccino*</label>
                <br>
                <input name='vaccino' class='input-login' type='date' value='$single[ultimo_vaccino]'>
            </div>
            <div>
                <label for=''>Ultime Analisi*</label>
                <br>
                <input name='analisi' class='input-login' type='date' value='$single[ultime_analisi]'>
            </div>
            <div>
                <br>
                <a href='?page=animalDetails&animalId=$single[id]' class='input-submit-login '>INDIETRO</a>
                <button name='modify' class='input-submit-login'>MODIFICA</button>
            </div>
                
            ";


        }
        
            ?>
    </form>
</main>