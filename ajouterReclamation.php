<?php
include "../Entities/Reclamation.php";
include "../Core/ReclamationC.php";

if (isset($_POST['Nom'], $_POST['mail_to'], $_POST['mail_sub'], $_POST['mail_msg'])) {
    $reclamation1 = new Reclamation(
        $_POST['Nom'],$_POST['mail_to'], $_POST['mail_sub'], $_POST['mail_msg']
    );
    $Reclamation1C = new ReclamationC();
    $Reclamation1C->AjouterReclamation($reclamation1);
    $Reclamation1C->sendmail($_POST['mail_to']);
    header('Location: ../contact.html');
} else
    {
    echo $_POST['Nom'];
    echo $_POST['mail_to'];
    echo $_POST['mail_sub'];
    echo $_POST['mail_msg'];
    echo "vérifier les champs";
}
?>