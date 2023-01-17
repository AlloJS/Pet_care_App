<?php
use App\DB\DB;

    $getPatient = new DB();
    $query = "SELECT DISTINCT animals.id, animals.specie,animals.razza,animals.img_profilo,user.cognome, user.email,user.telefono, animals.nome AS animalsName, user.nome AS usersName  FROM appuntamenti JOIN animals ON appuntamenti.animals_id = animals.id  JOIN user ON user.id = animals.user_id WHERE appuntamenti.veterinary_id = '$_SESSION[id]'";
    $myPatients = $getPatient->getQuery($query);
    
    if($_GET['page'] == 'patientDetails'){
        $query = "SELECT animals.id AS animalId,animals.nome,animals.data_di_nascita,animals.razza,animals.img_profilo,animals.peso,animals.sesso,animals.specie,animals.ultimo_vaccino,animals.ultime_analisi,animals.user_id,pathology.denominazione,pathology.descrizione  FROM animals  JOIN pathology_for_animal ON pathology_for_animal.animal_id = animals.id JOIN pathology ON pathology.id = pathology_for_animal.pathology_id WHERE animals.id = '$_GET[animalId]'";
        $animal = $getPatient->getQuery($query);
    }

    if($_GET['page'] == 'addPathology'){
        $_SESSION['messagePathology'];
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $pathology = filter_var($_POST['pathology'], FILTER_SANITIZE_STRING);
            if($pathology != ""){
                $querySelect = "SELECT id FROM pathology_for_animal WHERE animal_id = $_GET[animalId]";
                $animalWIthPathology = $getPatient->getQuery($querySelect);

                if(empty($animalWIthPathology)){
                    $array = [ $pathology,$_GET['animalId']];
                    $query = "INSERT INTO pathology_for_animal (pathology_id,animal_id) VALUES (?,?)";
                    $getPatient->getQuery($query,$array);
                    $_SESSION['messagePathology'] = "<h3 class='text-success'>Aggiunta patologia</h3>'";
                } else {
                    $array = [$pathology,$_GET['animalId']];
                    $query = "UPDATE pathology_for_animal SET pathology_id = ' $pathology', animal_id = ' $_GET[animalId]' WHERE  animal_id = ' $_GET[animalId]'";
                    $getPatient->getQuery($query);
                    $_SESSION['messagePathology'] = "<h3 class='text-success'>Aggiunta patologia</h3>'";
                }
                
            }
        }
    }