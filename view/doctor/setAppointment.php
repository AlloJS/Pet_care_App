<?php require_once(ROOT . '/controller/appointmentController.php') ?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/clock.png'?> width="40px" alt="">
        <div>Modifica</div>
    </div>
    <div class="text-center">
        <?php if(isset($_SESSION['modifyMessage'])){ echo $_SESSION['modifyMessage'];}?>
    </div>
    <?php
        foreach ($appuntamento as $detail){
           
            echo "
                <form class='form-add ' action='' method='post'>
                    <div>
                        <label for=''>Scegli una nuova data*</label>
                        <br> 
                        <input name='data' class='input-login' type='date' value='$detail[data]'>
                    </div>
                    <div>
                        <label for=''>Descrizione*</label>
                        <br>
                        <textarea name='descrizione' id='' cols='50' rows='10'>
                            $detail[descrizione]
                        </textarea>
                    </div>
                    <div>
                        <br>
                        <a href='?page=appointments' class='input-submit-login '>INDIETRO</a>
                        <button class='input-submit-login'>MODIFICA</button>
                    </div>
                    <div>
                        $_SESSION[addAppointment]
                    </div>
                </form>
            
            ";
        } 
    ?>
   
</main>