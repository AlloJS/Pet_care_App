<?php require_once(ROOT . '/controller/appointmentController.php') ?>
<div class="sub-nav">
    <img src=<?= PATH .'public/img/icons/clock.png'?> width="40px" alt="">
    <div>Appuntamenti</div>
</div>

<main>
    <?php 
        foreach($appuntamenti as $appuntament){
            $timestamp = strtotime($appuntament['data']); 
            $data = date('d/m/Y',  $timestamp); 
            $img = PATH . 'public/img/icons/doctor.png';
            $img_clock = PATH . 'public/img/icons/clock.png';
            echo "
            <div class='card'>
                <div class='card-header '>
                    <div><img src=' $img' width='60px'/></div>
                    <div>  
                        <div>$appuntament[descrizione]</div>
                        <div>Dott. $appuntament[vaterinaryName] $appuntament[cognome]</div>
                    </div>
                </div>
                <div class='card-body'>
                    <div><img src='$img_clock' width='20px'/> $data</div>
                    <div class='confirm text-center'>CONFERMATO</div>
                </div>

            </div>
            ";
        }
    
    ?>
    
</main>