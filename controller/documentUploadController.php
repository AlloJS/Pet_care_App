<?php
require_once(ROOT . '/model/fileManagement.php');
  use App\DB\DB;
  use App\FileManagement\File;

    $filetodb = new DB();

    if($_SERVER["REQUEST_METHOD"] === 'POST'){
      $newFile = new File();
      $stringaRandom = $newFile->getRandoomString();
      $stringaRandom = $newFile->stringaRandom;
      $target_dir = $newFile->getTarget_dir();

      if(isset($_FILES["fileToUpload"]["name"])){
        $target_file = $newFile-> getTarget_file();
        $uploadOk = $newFile->getUploadOk ();
        $imageFileType = $newFile->getImageFileType();
        $newFile->checkSize();
        $newFile->checkTipeFile($imageFileType);

      if ($uploadOk == 0) {
          return $_SESSION['fileMessage'] = "<h3 class='text-danger'>Il tuo file non è stato caricato.</h3>";
        } else {
          if($_SESSION['role'] == 'utente'){
            $newFile->saveFile();
          } else {
            $newFile->saveDoctorFile();
          }
        } 
      }
  }

  if($_GET['page'] == 'documentView'){
    $query = "SELECT * FROM documents WHERE id = '$_GET[documentId]'";
    $document = $filetodb->getQuery($query);
  }
    if($_SESSION['role'] == 'utente'){
      $query = "SELECT * FROM documents WHERE user_id = '$_SESSION[id]'";
      $documents = $filetodb->getQuery($query);
    }
    if($_SESSION['role'] != 'utente'){
      $query = "SELECT documents.id,documents.url,user.nome,user.cognome FROM documents JOIN user ON documents.user_id = user.id";
      $documents = $filetodb->getQuery($query);
      $queryUser = "SELECT nome,cognome,id,codice_fiscale FROM user";
      $users = $filetodb->getQuery($queryUser);
    }
    
    if($_GET['page'] != 'documentUpload'){
      $_SESSION['fileMessage'] = "";
    }

