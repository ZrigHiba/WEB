<?PHP
include "../Core/RendezvousC.php";
$rendezvousC=new RendezvousC();
if (isset($_POST["num"])){
    $rendezvousC->supprimerRendezvous($_POST["num"]);
    echo "succes";
    header('Location: ../BackAdmin/rendezvous.php');
}
?>
