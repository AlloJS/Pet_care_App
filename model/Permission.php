<?php

    namespace App\Permission;

    class Permission 
        {
            public static function isLogged(string $path)
            {
                if(isset($_SESSION['email'])){
                    header('Location: ' . $path);
                }
            }
            public static function isNotLogged(string $path)
            {
                if(!isset($_SESSION['email'])){
                    header('Location: ' . $path);
                }
            }
            public static function isNotId($get,$session,$path)
            {
                if($get != $session){
                    header('Location: ' . $path);
                }
            }
            public static function isDoctor($path)
            {
                if($_SESSION['role'] != 'utente'){
                    header('Location: ' . $path);
                }
            }
            public static function isNotDoctor($path)
            {
                if($_SESSION['role'] == 'utente'){
                    header('Location: ' . $path);
                }
            }
            public static function getLinkIsDoctor($string,$secondString ="")
            {
                if($_SESSION['role'] != 'utente'){
                    echo $string;
                } else {
                    echo $secondString;
                }
            }
           
        }