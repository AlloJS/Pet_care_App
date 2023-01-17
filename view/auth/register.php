<?php
require_once(ROOT . '/controller/registerController.php');
if($_GET['role'] === 'proprietario'){
    echo "
    <div class='register-container'>
        <form action='' method='post'>
            <div>
                <div>$message</div>
                <label for=''>Nome*</label>
                <input class='input-login' name='name' type='text'>
            </div>
            <div>
                <label for=''>Cognome*</label>
                <input class='input-login' name='lastname' type='text'>
            </div>
            <div>
                <label for=''>Data di nascita*</label>
                <input class='input-login' name='birthday' type='date'>
            </div>
            <div>
                <label for=''>Codice Fiscale*</label>
                <input class='input-login' name='fiscalcode' type='text'>
            </div>
            <div>
                <label for=''>Indirizzo*</label>
                <input class='input-login' name='address' type='text'>
            </div>
            <div>
                <label for=''>CAP*</label>
                <input class='input-login' name='cap' type='text'>
            </div>
            <div>
                <label for=''>Comune*</label>
                <input class='input-login' name='city' type='text'>
            </div>
            <div>
                <label for=''>Cellulare*</label>
                <input class='input-login' name='telephone' type='text'>
            </div>
            <div>
                <label for=''>Email*</label>
                <input class='input-login' name='email' type='text'>
            </div>
            <div>
                <label for=''>Password*</label>
                <input class='input-login' name='password' type='password'>
            </div>
            <div>
                <label for=''>Ridigita password*</label>
                <input class='input-login' name='checkpassword' type='password'>
            </div>
            <div>
                <div>
                <br>
                    <a class='input-submit-login' href='?page=chooseRole'> TORNA INDIETRO</a>
                    <button class='input-submit-login'>CONFERMA</button>
                </div>
            </div>
        
        </form>
    </div>
    
    ";
}

if($_GET['role'] === 'ambulatorio' || $_GET['role'] === 'specialista'){
    echo "
    <div class='register-container'>
        <form action='' method='post'>
            <div>$message</div>
            <div> 
                <label for=''>Specializzazione*</label>
                <select class='input-login' name='profession'>
                    <option value='Neurologo'>Neurologo</option>
                    <option value='Dermatologo'>Dermatologo</option>
                    <option value='Chirurgo'>Chirurgo</option>
                    <option value='Medico'>Medico</option>
                </select>
            </div>
            <div>
                <label for=''>Nome*</label>
                <input class='input-login' name='name' type='text'>
            </div>
            <div>
                <label for=''>Cognome*</label>
                <input class='input-login' name='lastname' type='text'>
            </div>
            <div>
                <label for=''>Codice Fiscale*</label>
                <input class='input-login' name='fiscalcode' type='text'>
            </div>
            <div>
            <label for=''>Partita Iva*</label>
                <input class='input-login' name='pi' type='text'>
            </div>
            <div>
                <label for=''>Cellulare*</label>
                <input class='input-login' name='telephone' type='text'>
            </div>
            <div>
                <label for=''>Email*</label>
                <input class='input-login' name='email' type='text'>
            </div>
            <div>
                <label for=''>Password*</label>
                <input class='input-login' name='password' type='password'>
            </div>
            <div>
                <label for=''>Ridigita password*</label>
                <input class='input-login' name='checkpassword' type='password'>
            </div>
            <div>
                <div>
                    <br>
                    <a class='input-submit-login' href='?page=chooseRole'> TORNA INDIETRO</a>
                    <button class='input-submit-login'>CONFERMA</button>
                </div>
            </div>
        
        </form>
    </div>
    
    ";
}

?>
