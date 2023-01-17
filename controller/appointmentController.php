<?php
use App\DB\DB;
 
$getAppuntamenti = new DB();
$query = "SELECT appuntamenti.data, animals.nome AS animalsName, veterinary.nome AS vaterinaryName, veterinary.cognome, appuntamenti.descrizione FROM appuntamenti JOIN animals ON appuntamenti.animals_id = animals.id JOIN veterinary ON appuntamenti.veterinary_id = veterinary.id WHERE animals.user_id = '$_SESSION[id]' ORDER BY  appuntamenti.data ASC";
$appuntamenti = $getAppuntamenti->getQuery($query);

if($_GET['page'] == 'appointments' && $_SESSION['role'] != 'utente') {
    $query = "SELECT appuntamenti.data, animals.nome AS animalsName, veterinary.nome AS vaterinaryName, veterinary.cognome, appuntamenti.descrizione,appuntamenti.id FROM appuntamenti JOIN animals ON appuntamenti.animals_id = animals.id JOIN veterinary ON appuntamenti.veterinary_id = veterinary.id WHERE appuntamenti.veterinary_id = '$_SESSION[id]' ORDER BY  appuntamenti.data ASC";
    $appuntamenti = $getAppuntamenti->getQuery($query);
    $_SESSION['addAppointment'] = "";
}
if($_GET['page'] == 'addAppointment'){
    $query = "SELECT id,nome FROM animals";
    $patients = $getAppuntamenti->getQuery($query);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
        $descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_STRING);
        $patient =  filter_var($_POST['patient'], FILTER_SANITIZE_STRING);
        $descrizione = trim($descrizione);
        if(!empty($data) && !empty($descrizione)  && !empty($patient)){
            $query = "INSERT INTO appuntamenti (data,descrizione,veterinary_id,animals_id) VALUES (?,?,?,?)";
            $array = [
                $data,
                $descrizione,
                $_SESSION['id'],
                $patient
            ];
            $getAppuntamenti->getQuery($query,$array);
            return $_SESSION['addAppointment'] = "<h3 class='text-success'>Appuntamento aggiunto.</h3>";
        }
            return $_SESSION['addAppointment'] = "<h3 class='text-danger'>Appuntamento non aggiunto.</h3>";
    }
}
if($_GET['page'] == 'setAppointment'){
    $query = "SELECT * FROM appuntamenti WHERE id = $_GET[id]";
    $appuntamento = $getAppuntamenti->getQuery($query);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $newdate = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
        $timestamp = strtotime($newdate); 
        $newDate = date("Y/m/d", $timestamp );
        $description = filter_var($_POST['descrizione'], FILTER_SANITIZE_STRING);
        $description = trim($description);
        if($_POST['data'] != "" && !empty($description)){
            $query = "UPDATE appuntamenti SET data = '$newDate', descrizione = '$description' WHERE id = $_GET[id]";
            $getAppuntamenti->getQuery($query);
            $_SESSION['addAppointment'] = "<h3 class='text-success'>Appuntamento modificato.</h3>";
            header('Location: ' . '?page=setAppointment&id=' . $_GET['id']);
        } else {
            $_SESSION['addAppointment'] = "<h3 class='text-danger'>Appuntamento non modificato.</h3>";
        }
        

    }
}
