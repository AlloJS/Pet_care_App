<?php require_once(ROOT . '/controller/documentUploadController.php') ?>
<main>
    <div class="sub-nav">
        <img src=<?= PATH .'public/img/icons/agreement.png'?> width="40px" alt="">
        <div>Carica i tuoi file</div>
    </div>
    <form class='form-add' action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="user">Scegli intestatario</label>
            
            <select name="user" id="">
                <?php
                foreach ($users as $user)
                    echo "<option value='$user[id]'>$user[nome] $user[cognome] ($user[codice_fiscale])</option>";
                ?>
            </select>
        </div>
        <div>
            <input class="input-login" type="file" name="fileToUpload" id="fileToUpload">
            <input class="input-submit-login" type="submit" value="Upload file">
        </div>
        <?php if(isset($_SESSION['fileMessage'])){ echo $_SESSION['fileMessage'];} ?>
    </form>
    <?php 
        
        foreach($documents as $document){
        $img_file = PATH . 'public/img/icons/agreement.png';
            echo "
                <div class='card'>
                    <div class='card-header '>
                        <div><img src='$img_file' width='60px'/></div>
                        <div>  
                            <div> $document[url]</div>
                        </div>
                    </div>
                    <div class='card-body'>
                        <div>  
                            <div>Intestato a: $document[nome] $document[cognome]</div>
                        </div>
                        <a href='?page=documentView&documentId=$document[id]' class='input-submit-login text-center'>DETTAGLI</a>
                    </div>
                </div>
            ";
        }
    
    ?>
</main>
