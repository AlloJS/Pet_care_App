<?php require_once(ROOT . '/controller/documentUploadController.php') ?>
<?php

if (strpos( PATH . 'public/filesUpload/' . $document[0]['url'], 'pdf') !== false) {
    header("Content-type: application/pdf");
    readfile( PATH . 'public/filesUpload/' . $document[0]['url']); 
  }
?>

<div class="file-container">
    <img src=<?= PATH . 'public/filesUpload/' . $document[0]['url']?> alt="">
    <a href='?page=documentUpload' class='input-submit-login text-center'>INDIETRO</a>
</div>