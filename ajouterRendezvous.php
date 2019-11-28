<?php
include "../Entities/Rendezvous.php";
include "../Core/RendezvousC.php";
if (isset($_POST['Nom'], $_POST['Email'], $_POST['telephone'], $_POST['date'])) {
    $Rendezvous1 = new Rendezvous($_POST['Nom'],$_POST['Email'], $_POST['telephone'], $_POST['date']);
    var_dump($Rendezvous1);
    $Rendezvous1C = new RendezvousC();
    $Rendezvous1C->AjouterRendezvous($Rendezvous1);
    echo "1";
    header('Location: ../rendez_vous.html');
}
else
    {
    echo $_POST['Nom'];
    echo $_POST['Email'];
    echo $_POST['telephone'];
    echo $_POST['date'];
    echo "vérifier les champs";
}
?>