<?php require_once('common/common.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My pet care</title>
    <link rel="stylesheet" href=<?= PATH . 'public/css/style.css?ts=<?=time()?>&quot' ?>>
</head>
<body class="body">
    <div  class="title">
        <img src=<?= PATH . 'public/img/logo.png'?> width="200px" alt="">
        <div>
            <div class="text-title">La soluzione per</div>
            <div class="text-blue">la salute del tuo animale.</hdiv4>
        </div>
    </div>
    <?php
        if(!isset($_GET['page'])){
            include_once(ROOT . '/view/auth/login.php');
        } else if ($_GET['page'] === 'chooseRole'){
            include_once(ROOT . '/view/auth/chooseRole.php');
        } else if ($_GET['page'] === 'register'){
            include_once(ROOT . '/view/auth/register.php');
        }
    ?>
</body>
</html>