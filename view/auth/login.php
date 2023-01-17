<?php require_once(ROOT .'/controller/loginController.php') ?>
<div class="login-container">
    <form action="" method="post">
        <div><h2>Accedi al tuo account</h2></div>
        <div><?= $message ?></div>
        <div class="d-flex-column ">
            <input class="input-login" name="email" type="text" placeholder="Email">
        </div>
        <div class="d-flex-column ">
            <input class="input-login" name="password" type="password" placeholder="Password">
        </div>
        <div class="d-flex-row ">
            Hai dimenticato la
            <a href="">password?</a>
            <button class="input-submit-login ">Login</button>
        </div>
        <div>
             Non hai un account? <a href="?page=chooseRole">Registrati</a>
        </div>
    </form>
</div>
