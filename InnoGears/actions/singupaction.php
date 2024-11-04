<?php

require('actions/Co_bdd.php');

if(isset($_POST['Submit'])) {

    if(!empty($pseudo) AND !empty($email) AND !empty($password)){

    }else {
        $errorMSG = "Merci de remplir tous les champs";
    }
}


