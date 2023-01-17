<?php 
    require_once(ROOT . '/controller/doctorController/myPatientcontroller.php');

    if($_SESSION['role'] =='utente'){
        return header('Location: ' . PATH . 'view/dashboard.php');
    } 
?>
<form class="form-add" action="" method="post">
    <h3>Aggiungi patologia a <?= $_GET['name'] ?></h3>
    <div>
        <label for=''>Patologia</label>
        <br>
        <select class='input-login' name='pathology'>
            <option value='0' selected>Nessuna patologia</option>
            <option value='1'>Meningiomielite</option>
            <option value='2'>Dermatite</option>
            <option value='3'>Otite</option>
        </select>
    </div>
        <div>
        <br>
                
        <a href='?page=myPatient' class='input-submit-login '>INDIETRO</a>
        <button name='modify' class='input-submit-login'>MODIFICA</button>
    </div>
    <?= $_SESSION['messagePathology'] ?>
</form>