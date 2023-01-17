<?php
    use App\DB\DB;

    $animals = new DB();
    $query = "SELECT id FROM animals WHERE user_id = '$_SESSION[id]'";
    $allAnimals = $animals->getQuery($query);
    foreach($allAnimals as $myAnimal){
        $allMyAnimals[] = $myAnimal['id'];
    }

    if($_GET['page'] == 'animalDetails'){
        $query = "SELECT animals.id AS animalId,animals.nome,animals.data_di_nascita,animals.razza,animals.img_profilo,animals.peso,animals.sesso,animals.specie,animals.ultimo_vaccino,animals.ultime_analisi,animals.user_id,pathology.denominazione,pathology.descrizione  FROM animals LEFT JOIN pathology_for_animal ON pathology_for_animal.animal_id = animals.id LEFT JOIN pathology ON pathology.id = pathology_for_animal.pathology_id  WHERE animals.user_id = '$_SESSION[id]' AND  animals.id = '$_GET[animalId]'";
        $myAnimalDetail = $animals->getQuery($query);
       
    }
  
    if($_GET['page'] == 'animals'){
        $query = "SELECT nome,razza,img_profilo, id AS animalId FROM animals WHERE user_id = '$_SESSION[id]'";
        $myAnimals = $animals->getQuery($query);
    } else {
        
    }
    

    if(isset($_POST['set'])){
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $specie = filter_var($_POST['specie'], FILTER_SANITIZE_STRING);
        $razza = filter_var($_POST['razza'], FILTER_SANITIZE_STRING);
        $birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
        $vaccino = filter_var($_POST['vaccino'], FILTER_SANITIZE_STRING);
        $analisi = filter_var($_POST['analisi'], FILTER_SANITIZE_STRING);
        $peso = $_POST['peso'];
        $sesso = $_POST['sesso'];

        $data = [
            $name,
            $specie,
            $razza,
            $birthday,
            $vaccino,
            $analisi,
            $peso,
            $sesso
        ];
        if (in_array("",$data)){
            return $_SESSION['setMessage'] = "<h3 class='text-danger'>Riempi tutti i campi</h3>";
        } else {
            $data[] = $_SESSION['id'];
            $insertQuery = "INSERT INTO animals (nome,specie,razza,data_di_nascita,ultimo_vaccino,ultime_analisi,peso,sesso,user_id) VALUES (?,?,?,?,?,?,?,?,?)";
            $animals->getQuery($insertQuery,$data);
            $selectNewtId = "SELECT max(id) AS id FROM animals";
            $lastId = $animals->getQuery($selectNewtId);
            $newId = (int)$lastId[0]['id'];
            $pathologyDefoult = "INSERT INTO pathology_for_animal (pathology_id,animal_id) VALUES (?,?)";
            $pathologyDate = [
                0,
                $newId
            ];
            $animals->getQuery($pathologyDefoult,$pathologyDate);

            return $_SESSION['setMessage'] = "<h3 class='text-success'>Animale inserito correttamente</h3>";
        }

    }
    if(isset($_GET['id'])){
        $query = "SELECT * FROM animals WHERE id = '$_GET[id]'";
        $mySingleAnimal = $animals->getQuery($query);
    }
   
    if(isset($_GET['page'])){
        if($_GET['page'] == 'animals'){
            $_SESSION['modifyMessage'] = "";
            $_SESSION['setMessage'] = "";
        }
        
    }
    if(isset($_POST['modify'])){
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $specie = filter_var($_POST['specie'], FILTER_SANITIZE_STRING);
        $razza = filter_var($_POST['razza'], FILTER_SANITIZE_STRING);
        $birthday = filter_var($_POST['birthday'], FILTER_SANITIZE_STRING);
        $vaccino = filter_var($_POST['vaccino'], FILTER_SANITIZE_STRING);
        $analisi = filter_var($_POST['analisi'], FILTER_SANITIZE_STRING);
        $peso = $_POST['peso'];
        $sesso = $_POST['sesso'];
        $data = [
            $name,
            $specie,
            $razza,
            $birthday,
            $vaccino,
            $analisi,
            $peso,
            $sesso
        ];
    
        if (in_array("",$data)){
            return  $_SESSION['modifyMessage'] = "<h3 class='text-danger'>Riempi tutti i campi</h3>";
        } else {

            $updateQuery = "UPDATE animals SET nome = '$name', specie = '$specie', razza = '$razza', data_di_nascita = '$birthday', ultimo_vaccino = '$vaccino', ultime_analisi = '$analisi', peso = '$peso', sesso = '$sesso'  WHERE id = '$_GET[id]'";
            $animals->getQuery($updateQuery);
            $_SESSION['modifyMessage'] =  "<h3 class='text-success'>Modifiche avvenute con successo</h3>";
            if($_SESSION['role'] == 'utente'){
                header('Location: ?page=modifyAnimal&id=' .$_GET['id'] );
            } else {
                header('Location: ?page=setPatient&id=' .$_GET['id'] );
            }
            
        }
    }

