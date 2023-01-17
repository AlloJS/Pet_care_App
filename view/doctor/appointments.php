<?php require_once(ROOT . '/controller/appointmentController.php') ?>
<div class="search">
    <img src=<?= PATH .'public/img/icons/clock.png'?> width="40px" alt="">      
    <div>
        <a href="?page=addAppointment">
            + NUOVO
        </a>
    </div>
</div>

<main>
<?php 
        foreach($appuntamenti as $appuntament){
            $timestamp = strtotime($appuntament['data']); 
            $data = date('d/m/Y',  $timestamp); 
            $img = PATH . 'public/img/icons/dog.png';
            $img_clock = PATH . 'public/img/icons/clock.png';
            echo "
            <div class='card'>
                <div class='card-header '>
                    <div><img src=' $img' width='60px'/></div>
                    <div>  
                        <div>$appuntament[descrizione]</div>
                        <div>Paziente: $appuntament[animalsName]</div>
                    </div>
                </div>
                <div class='card-body'>
                    <div><img src='$img_clock' width='20px'/> $data</div>
                    <a href='?page=setAppointment&id=$appuntament[id]' class='input-submit-login text-center'>MODIFICA</a>
                </div>
            </div>
            ";
        }
    
    ?>
</main>