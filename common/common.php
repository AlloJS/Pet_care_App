<?php

    define("ROOT" , $_SERVER["DOCUMENT_ROOT"]);
    define("PATH" , 'http://localhost:8888/');
    require_once( ROOT . '/model/DB.php');
    require_once( ROOT . '/model/Permission.php');
    session_start();
   