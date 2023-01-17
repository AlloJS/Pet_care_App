<?php
use App\Permission\Permission;
    require_once(ROOT . '/controller/userController.php');
    Permission::isNotId($_GET['id'], $_SESSION['id'], PATH . 'view/dashboard.php');  
?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/doctor.png'?> width="40px" alt="">
        <div>Il tuo account</div>
    </div>
    <div class="text-center">
        <?php if(isset($_SESSION['modifyUser'])){ echo $_SESSION['modifyUser'];}?>
    </div>
    <form class="form-set" action="" method="post">
        <?php 
             foreach($veterinary as $data){
                echo "
                <div>
                <label for=''>Nome*</label>
                <br>
                <input name='name' class='input-login' type='text' value ='$data[nome]'>
                </div>
                <div>
                    <label for=''>Cognome*</label>
                    <br>
                    <input name='lastname' class='input-login' type='text' value ='$data[cognome]'>
                </div>
                <div>
                    <label for=''>Email*</label>
                    <br>
                    <input name='email' class='input-login' type='email' value ='$data[email]'>
                </div>
                <div>
                    <label for=''>P.I.*</label>
                    <br>
                    <input name='pi' class='input-login' type='email' value ='$data[email]'>
                </div>
                <div>
                <label for=''>Specializzazione*</label>
                    <br>
                    <input name='specializzazione' class='input-login' type='email' value ='$data[email]'>
                </div>
                <div>
                    <label for=''>Codice fiscale*</label>
                    <br>
                    <input name='fiscal_code' class='input-login' type='text' value ='$data[codice_fiscale]'>
                </div>
                <div>
                    <label for=''>Cellulare*</label>
                    <br>
                    <input name='telephone' class='input-login' type='tel' value ='$data[telefono]'>
                </div>
                <div>
                    <br>
                    <a href='dashboard.php' class='input-submit-login '>INDIETRO</a>
                    <button type='submit' class='input-submit-login'>MODIFICA</button>
                </div>
                
        
                ";
             }
        
        ?>
        
    </form>
</main>