<?php use App\Permission\Permission;  ?>
<nav>
    <a href=<?= PATH .'view/dashboard.php'?>>
        <img src=<?= PATH . 'public/img/logo.png'?> width="80px" alt="">
    </a>
    <div class="menu-list">
        <a href='?page=appointments'>Appuntamenti</a>
        <?php Permission::getLinkIsDoctor("<a href='?page=myPatient''>I miei Pazienti</a>", "<a href='?page=animals'>I miei Animali</a>") ?>
        <div><a href='?page=documentUpload'>Da visionare</a></div>
    </div>
    <div id="menu-user">
       ^ <?= $_SESSION['email'] ?>
        <?php if($_SESSION['role'] == 'utente'): ?>
            <img src=<?= PATH . 'public/img/icons/man.png'?> width="30px" alt="">
            <?php else:?>
                <img src=<?= PATH . 'public/img/icons/doctor.png'?> width="30px" alt="">
        <?php endif; ?>
    </div>
</nav>
<div id="user-list" class="user-list">
    <a href='?page=userProfile&id=<?=$_SESSION['id']?>'>IL MIO PROFILO</a>            
   <br>
   <br>
   <a href="">GUIDA</a>
   <br>
   <br>
   <hr>
   <a href=<?= PATH . 'view/auth/logout.php'?>>ESCI</a>
</div>

