<?php
use App\DB\DB;

$message = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $register = new DB;
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $fiscalCode = filter_var($_POST['fiscalcode'], FILTER_SANITIZE_STRING);
        $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $hashpassword = password_hash($password, PASSWORD_BCRYPT);
        $checkpassword = filter_var($_POST['checkpassword'], FILTER_SANITIZE_STRING);

        if($_GET['role'] === 'proprietario'){
            $birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
            $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
            $cap = filter_var($_POST['cap'], FILTER_SANITIZE_STRING);
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $data = [
                $name,
                $lastname,
                $email,
                $hashpassword,
                $fiscalCode,
                $address,
                $city,
                $cap,
                $birthday,
                $telephone
            ];
            if(in_array("",$data)){
                return $message = "<h3 class='text-danger'>Devi compilare tutti i campi richiesti</h3>";
            } else {
                if($password === $checkpassword){
                    $query = "INSERT INTO user (nome,cognome,email,password,codice_fiscale,indirizzo,città,codice_postale,data_di_nascita,telefono) VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $register->getQuery($query, $data);
                    $message = "<h3 class='text-success'>Registrazione avvenuta con successo";
                } else {
                    $message = "<h3 class='text-danger'>e password non corrispondono</h3>";
                }
                
            }
            
        } else {
            $pi = filter_var($_POST['pi'], FILTER_SANITIZE_STRING);
            $specializzazione = filter_var($_POST['profession'], FILTER_SANITIZE_STRING);
            $data = [
                $specializzazione,
                $name,
                $lastname,
                $email,
                $hashpassword,
                $fiscalCode,
                $pi,
                $telephone
            ];
            if(in_array("",$data)){
                return $message = "<h3 class='text-danger'>Devi compilare tutti i campi richiesti</h3>";
            } else {
                if ($password === $checkpassword) {
                    $query = "INSERT INTO veterinary (specializzazione,nome,cognome,email,password,codice_fiscale,partita_iva,telefono) VALUES (?,?,?,?,?,?,?,?)";
                    $register->getQuery($query, $data);
                } else {
                    $message = "<h3 class='text-danger'>e password non corrispondono</h3>";
                }
            }
        }
    }
