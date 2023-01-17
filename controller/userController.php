<?php
use App\DB\DB;

    $getUser = new DB();
    $query = "SELECT * FROM user WHERE id = '$_GET[id]'";
    $user = $getUser->getQuery($query);
    $queryVeterinary = "SELECT * FROM veterinary WHERE id = '$_GET[id]'";
    $veterinary = $getUser->getQuery($queryVeterinary);

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $fiscal_code = filter_var($_POST['fiscal_code'], FILTER_SANITIZE_STRING);
        $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
        
        if($_SESSION['role'] != 'utente'){
            $pi = filter_var($_POST['pi'], FILTER_SANITIZE_STRING);
            $specializzazione = filter_var($_POST['specializzazione'], FILTER_SANITIZE_STRING);
            $data = [
                $name,
                $lastname,
                $email,
                $fiscal_code,
                $pi,
                $specializzazione,
                $telephone
            ];
            if(in_array("",$data)){
                return $_SESSION['modifyUser'] = "<h3 class='text-danger'>Riempi tutti i campi</h3>";
            } else {
                $modify = "UPDATE veterinary SET nome = '$name', cognome = '$lastname', email = '$email',codice_fiscale = '$fiscal_code',partita_iva = '$pi', specializzazione = '$specializzazione' , telefono = '$telephone' WHERE id = '$_GET[id]'";
                $getUser->getQuery($modify);
                header('Location: ?page=userProfile&id=' . $_SESSION['id']);
                $_SESSION['modifyUser'] = "<h3 class='text-success'>Modifiche avvenute con successo</h3>";
            }
            
        } else {
            $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
            $cap = filter_var($_POST['cap'], FILTER_SANITIZE_STRING);
            $birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
            $data = [
                $name,
                $lastname,
                $email,
                $fiscal_code,
                $address,
                $city,
                $cap,
                $birthday,
                $telephone
            ];
            if(in_array("",$data)){
                return $_SESSION['modifyUser'] = "<h3 class='text-danger'>Riempi tutti i campi</h3>";
            } else {
                $modify = "UPDATE user SET nome = '$name', cognome = '$lastname', email = '$email',codice_fiscale = '$fiscal_code',indirizzo = '$address',città = '$city',codice_postale = '$cap',data_di_nascita = '$birthday', telefono = '$telephone' WHERE id = '$_GET[id]'";
                $getUser->getQuery($modify);
                header('Location: ?page=userProfile&id=' . $_SESSION['id']);
                $_SESSION['modifyUser'] = "<h3 class='text-success'>Modifiche avvenute con successo</h3>";
            }
        }
        
        
    }