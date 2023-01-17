<?php
use App\DB\DB;

$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = new DB();
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if($email != ""){
        $query = "SELECT email,password,specializzazione,id FROM user  WHERE email = '$email' UNION SELECT email,password,specializzazione,id FROM veterinary WHERE email = '$email'";
        $user = $login->getQuery($query);
        if(!empty($user)){
            if($user[0]['email'] == $email){
                if (password_verify($password, $user[0]['password'])) {
                    $_SESSION = [
                        'email' => $email,
                        'role' => $user[0]['specializzazione'],
                        'id' =>    $user[0]['id']
                    ];
                    header('Location: ' . PATH . '/view/dashboard.php');
                } else {
                    $message = "<h3 class='text-danger'>Accesso non consentito";
                }
            } else {
                $message = "<h3 class='text-danger'>Accesso non consentito";
            } 
        }  else {
            $message = "<h3 class='text-danger'>Accesso non consentito";
        }
        
    } else {
        $message = "<h3 class='text-danger'>Accesso non consentito";
    }

    
}