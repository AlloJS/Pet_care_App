<?php
    require_once('../common/common.php'); 
    require_once(ROOT .'/controller/dashboardController.php') 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?= PATH . 'public/css/style.css'?>>
</head>
<body>
    <header>
        <?php include_once(ROOT . '/view/templates/navbar.php') ?>
    </header>
    <?php if(!isset($_GET['page'])): ?>
        <main class="dashboard-container">
            <a href=<?= PATH . 'view/dashboard.php?page=appointments'?> class="section">
                <img src=<?= PATH . 'public/img/icons/clock.png'?> width="100px" alt="">
                <h3>APPUNTAMENTI</h3>
            </a>
            <a href=<?= PATH . 'view/dashboard.php?page=animals'?> class="section">
                <img src=<?= PATH . 'public/img/icons/elephant.png'?> width="100px" alt="">
                <h3>I MIEI ANIMALI</h3>
            </a>
            <a href=<?= PATH . 'view/dashboard.php?page=documentUpload'?> class="section">
                <img src=<?= PATH . 'public/img/icons/agreement.png'?> width="100px" alt="">
                <h3>DOCUMENTI DA VISIONARE</h3>
            </a>
            <a href=<?= PATH . 'view/dashboard.php?page=userProfile&id=' . $_SESSION['id']?> class="section">
                <img src=<?= PATH . 'public/img/icons/man.png'?> width="100px" alt="">
                <h3>PROFILO</h3>
            </a>
            <a href=<?= PATH . 'view/auth/logout.php'?> class="section">
            <img src=<?= PATH . 'public/img/icons/turn-off.png'?> width="100px" alt="">
                <h3>ESCI</h3>
            </a>
            <a href="?page=guida" class="section">
            <img src=<?= PATH . 'public/img/icons/info.png'?> width="100px" alt="">
                <h3>GUIDA</h3>
            </a>
        </main>
        <?php elseif($_GET['page'] == 'animals'): ?>
        <?php require_once(ROOT .'/view/animals.php') ?>
        <?php elseif($_GET['page'] == 'setAnimals'): ?>
        <?php require_once(ROOT .'/view/setAnimals.php') ?>
        <?php elseif($_GET['page'] == 'animalDetails'): ?>
        <?php require_once(ROOT .'/view/animalDetails.php') ?>
        <?php elseif($_GET['page'] == 'modifyAnimal'): ?>
        <?php require_once(ROOT .'/view/modifyAnimal.php') ?>
        <?php elseif($_GET['page'] == 'userProfile'): ?>
        <?php require_once(ROOT .'/view/userProfile.php') ?>
        <?php elseif($_GET['page'] == 'appointments'): ?>
        <?php require_once(ROOT .'/view/appointments.php') ?>
        <?php elseif($_GET['page'] == 'documentUpload'): ?>
        <?php require_once(ROOT .'/view/documentUpload.php') ?>
        <?php elseif($_GET['page'] == 'documentView'): ?>
        <?php require_once(ROOT .'/view/documentView.php') ?>
        <?php elseif($_GET['page'] == 'guida'): ?>
        <?php require_once(ROOT .'/view/guida.php') ?>
        <?php endif; ?>
    <script src=<?= PATH . 'public/js/script.js?ts=<?=time()?>&quot'?>></script>
</body>
</html>