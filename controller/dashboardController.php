<?php
    use App\Permission\Permission;
    Permission::isNotLogged(PATH.'index.php');
    Permission::isDoctor(PATH.'view/doctor/dashboard.php');

    if(!isset($_GET['id'])){
        $_SESSION['modifyUser'] = "";
    }
    if(isset($_GET['page'])){
        if($_GET['page'] != 'documentUpload'){
            $_SESSION['fileMessage'] = "";
        }
        
    }