<?php

namespace App\FileManagement;
use App\DB\DB;

class File {
    public $stringaRandom;
    public $target_dir;
    public $uploadOk;
    public $target_file;
    public $imageFileType;
    public function getTarget_dir(){
        return $this->target_dir = ROOT . "/public/filesUpload/";
    }
    public function getTarget_file(){
        return $this->target_file = $this->target_dir . basename($this->stringaRandom . $_FILES["fileToUpload"]["name"]);
    }

    public function getImageFileType(){
        return $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
    }
    public function getUploadOk (){
        return $this->uploadOk = 1;
    }
    public function getRandoomString()
    {
        $caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stringaRandom = '';
        for ($i = 0; $i < 10; $i++) {
            $stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
        }
        return $this->stringaRandom;
    }

    public function checkSize ()
    {
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $this->uploadOk = 0;
            return $_SESSION['fileMessage'] = "<h3 class='text-danger'>Il file è troppo grane</h3>";
        }
    }
    public function checkTipeFile($imageFileType)
    {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" ) {
            $this->uploadOk = 0;
            return $_SESSION['fileMessage'] = "<h3 class='text-danger'>Accettiamo solo JPG, JPEG, PNG & PDF.</h3>";
        }
    }

    public function saveFile()
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->target_file)) {
            $query = "INSERT INTO documents (titolo,url,user_id) VALUES (?,?,?)";
            $array = [
              $this->target_file,
              basename($this->stringaRandom . $_FILES["fileToUpload"]["name"]),
              $_SESSION['id']
            ];
            $filetodb = new DB();
            $filetodb->getQuery($query,$array);
            $_SESSION['fileMessage'] = "<h3 class='text-success'>Il file è stato caricato con successo.</h3>";
            return header('Location: ' . PATH . 'view/dashboard.php?page=documentUpload');
        } else {
            return $_SESSION['fileMessage'] = "<h3 class='text-danger'>C'è stato un errore inaspettato. Ci dispiace per il disagio.</h3>";
        }
    }

    public function saveDoctorFile()
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->target_file)) {
            $query = "INSERT INTO documents (titolo,url,user_id) VALUES (?,?,?)";
            $array = [
              $this->target_file,
              basename($this->stringaRandom . $_FILES["fileToUpload"]["name"]),
              $_POST['user']
            ];
            $filetodb = new DB();
            $filetodb->getQuery($query,$array);
            $_SESSION['fileMessage'] = "<h3 class='text-success'>Il file è stato caricato con successo.</h3>";
            return header('Location: ' . PATH . 'view/doctor/dashboard.php?page=documentUpload');
        } else {
            return $_SESSION['fileMessage'] = "<h3 class='text-danger'>C'è stato un errore inaspettato. Ci dispiace per il disagio.</h3>";
        }
    }


}