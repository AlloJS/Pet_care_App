<?php require_once(ROOT.'/controller/animalsController.php') ?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/pawprint.png'?> width="40px" alt="">
        <div>Nuovo Paziente</div>
    </div>
    <div class="text-center">
        <?php if(isset($_SESSION['setMessage'])){ echo $_SESSION['setMessage'];}?>
    </div>
    <form class="form-set" action="" method="post">
        <div>
            <label for="">Nome*</label>
            <br>
            <input name="name" class="input-login" type="text">
        </div>
        <div>
            <label for="">Specie*</label>
            <br>
            <input name="specie" class="input-login" type="text">
        </div>
        <div>
            <label for="">Razza*</label>
            <br>
            <input name="razza" class="input-login" type="text">
        </div>
        <div>
            <label for="">Sesso*</label>
            <br>
            <select class="input-login" name="sesso">
                <option value="Maschio">Maschio</option>
                <option value="Femmina">Femmina</option>
            </select>
        </div>
        <div>
            <label for="">Peso*</label>
            <br>
            <input name="peso" class="input-login" type="number" min="0">
        </div>
        <div>
            <label for="">Data di nascita*</label>
            <br>
            <input name="birthday" class="input-login" type="date">
        </div>
        <div>
            <label for="">Ultimo vaccino*</label>
            <br>
            <input name="vaccino" class="input-login" type="date">
        </div>
        <div>
            <label for="">Ultime Analisi*</label>
            <br>
            <input name="analisi" class="input-login" type="date">
        </div>
        <div>
            <br>
            <a href='?page=animals' class='input-submit-login '>INDIETRO</a>
            <button name="set" class="input-submit-login">REGISTRA</button>
        </div>
    </form>
</main>