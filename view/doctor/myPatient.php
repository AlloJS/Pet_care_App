<?php
    require_once(ROOT . '/controller/doctorController/myPatientController.php');
    $_SESSION['messagePathology'] = ""; 
?>

<main>
    <?php 
        foreach ($myPatients as $myPatient){
           
        echo "
            <div class='card'>
                <div class='card-header '>
                    <div><img src='' width='60px'/></div>
                    <div>  
                        <div>$myPatient[animalsName]</div>
                        <div> </div>
                    </div>
                </div>
                <div class='card-body'>
                    <a href='?page=addPathology&animalId=$myPatient[id]&name=$myPatient[animalsName]  ' class='input-submit-login text-center'>+ PATOLOGIA</a>
                    <a href='?page=patientDetails&animalId=$myPatient[id] ' class='input-submit-login text-center'>DETTAGLI</a>
                </div>
            </div>
        ";
        }
    ?>
    
</main>