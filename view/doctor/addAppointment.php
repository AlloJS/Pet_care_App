<?php require_once(ROOT . '/controller/appointmentController.php') ?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/clock.png'?> width="40px" alt="">
        <div>Aggiungi</div>
    </div>
    <div class="text-center">
        <?php if(isset($_SESSION['modifyMessage'])){ echo $_SESSION['modifyMessage'];}?>
    </div>
    <form class="form-add " action="" method="post">
        <div>
            <label for=''>Data*</label>
            <br>
            <input name='data' class='input-login' type='date' value=''>
        </div>
        <div>
            <label for=''>Nome paziente*</label>
            <br>
            <select class='input-login' name="patient" id="">
                <?php
                    foreach($patients as $patient){
                        echo "
                            <option value='$patient[id]'>$patient[nome]</option>
                            
                        ";
                    }
                ?>
            </select>
        </div>
        <div>
            <label for=''>Descrizione*</label>
            <br>
            <textarea name="descrizione" id="" cols="50" rows="10"></textarea>
        </div>
        <div>
            <br>
            <a href='?page=appointments' class='input-submit-login '>INDIETRO</a>
            <button name='modify' class='input-submit-login'>MODIFICA</button>
        </div>
        <div>
            <?= $_SESSION['addAppointment'] ?>
        </div>
    </form>
</main>