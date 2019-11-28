<?php
include "../Entities/Reclamation.php";
include "../Core/ReclamationC.php";

if (isset($_POST['Nom'], $_POST['Email'], $_POST['Sujet'], $_POST['Msg'])) {
    $reclamation1 = new Reclamation(
        $_POST['Nom'],$_POST['Email'], $_POST['Sujet'], $_POST['Msg']
    );
    $Reclamation1C = new ReclamationC();
    $Reclamation1C->AjouterReclamation($reclamation1);
    header('Location: ../contact.html');
} else {
    echo $_POST['Nom'];
    echo $_POST['Email'];
    echo $_POST['Sujet'];
    echo $_POST['Msg'];
    echo "vérifier les champs";
}?>