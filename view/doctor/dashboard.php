<?php require_once('../../common/common.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?= PATH . 'public/css/style.css'?>>
</head>
<body >
    <header>
        <?php include_once(ROOT . '/view/templates/navbar.php') ?>
    </header>
    <?php if(!isset($_GET['page'])): ?>
        <main  class="dashboard-container">
            <a href=<?= PATH . 'view/doctor/dashboard.php?page=appointments'?> class="section">
                <img src=<?= PATH . 'public/img/icons/clock.png'?> width="100px" alt="">
                <h3>APPUNTAMENTI</h3>
            </a>
            <a href=<?= PATH . 'view/doctor/dashboard.php?page=myPatient'?> class="section">
                <img src=<?= PATH . 'public/img/icons/elephant.png'?> width="100px" alt="">
                <h3>I MIEI PAZIENTI</h3>
            </a>
            <a href='?page=documentUpload' class="section">
                <img src=<?= PATH . 'public/img/icons/agreement.png'?> width="100px" alt="">
                <h3>DOCUMENTI DA VISIONARE</h3>
            </a>
            <a href=<?= PATH . 'view/doctor/dashboard.php?page=userProfile&id=' . $_SESSION['id']?> class="section">
                <img src=<?= PATH . 'public/img/icons/doctor.png'?> width="100px" alt="">
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
        <?php elseif ($_GET['page'] == 'myPatient'): ?>
            <?php require_once(ROOT .'/view/doctor/myPatient.php') ?>
            <?php elseif ($_GET['page'] == 'patientDetails'): ?>
            <?php require_once(ROOT .'/view/doctor/patientDetails.php') ?>
            <?php elseif ($_GET['page'] == 'setPatient'): ?>
            <?php require_once(ROOT .'/view/doctor/setpatient.php') ?>
            <?php elseif ($_GET['page'] == 'addPathology'): ?>
            <?php require_once(ROOT .'/view/doctor/addPathology.php') ?>
            <?php elseif ($_GET['page'] == 'userProfile'): ?>
            <?php require_once(ROOT .'/view/doctor/UserProfile.php') ?>
            <?php elseif ($_GET['page'] == 'appointments'): ?>
            <?php require_once(ROOT .'/view/doctor/appointments.php') ?>
            <?php elseif ($_GET['page'] == 'addAppointment'): ?>
            <?php require_once(ROOT .'/view/doctor/addAppointment.php') ?>
            <?php elseif ($_GET['page'] == 'setAppointment'): ?>
            <?php require_once(ROOT .'/view/doctor/setAppointment.php') ?>
            <?php elseif ($_GET['page'] == 'documentUpload'): ?>
            <?php require_once(ROOT .'/view/doctor/documentUpload.php') ?>
            <?php elseif ($_GET['page'] == 'documentView'): ?>
            <?php require_once(ROOT .'/view/doctor/documentView.php') ?>
            <?php elseif ($_GET['page'] == 'guida'): ?>
            <?php require_once(ROOT .'/view/doctor/guida.php') ?>
        <?php endif; ?>
    <script src=<?= PATH . 'public/js/script.js?ts=<?=time()?>&quot'?>></script>
</body>
</html>
