<?PHP
include "../Core/ReclamationC.php";
$reclamationC=new ReclamationC();
if (isset($_POST["num"])){
    $reclamationC->supprimerReclamation($_POST["num"]);
    //echo "succes";
    header('Location: ../BackAdmin/tables.php');
}
?>
