<HTML>
<head>
</head>
<body>
<?PHP
include "../Entities/Rendezvous.php";
include "../Core/RendezvousC.php";
$RendezvousC=new RendezvousC();
if (isset($_GET['id'])){
    $result=$RendezvousC->recupererRendezvous($_GET['id']);
    foreach($result as $row){
        $id=$row['id'];
        $nom=$row['nom'];
        $mail=$row['mail'];
        $date=$row['date'];
        $telephone=$row['telephone'];
        //$date=$row['date'];
        ?>
        <form method="POST">
            <table>
                <caption>Modifier Produit</caption>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
                </tr>
                <tr>
                    <td>Num</td>
                    <td><input type="text" name="num" value="<?PHP echo $id ?>"></td>
                </tr>
                <tr>
                    <td>Prix</td>
                    <td><input type="text" name="prix" value="<?PHP echo $mail ?>"></td>
                </tr>
                <tr>
                    <td>Qte</td>
                    <td><input type="number" name="qte" value="<?PHP echo $telephone ?>"></td>
                </tr>
                <tr>
                    <td>Categorie</td>
                    <td><input type="text" name="cat" value="<?PHP echo $date ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="modifier" value="modifier"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="cin_ini" value="<?PHP echo $_GET['id'];?>"></td>
                </tr>
            </table>
        </form>
        <?PHP
    }
}

if (isset($_GET['id'])){
    //echo $_GET['id'];
    //var_dump($_GET['nom'],$_GET['mail'],$_GET['sujet'],$_GET['msg']);
    $Rendezvous=new Rendezvous($_GET['nom'],$_GET['mail'],$_GET['date'],$_GET['telephone']);
    //var_dump($Reclamation);
    $RendezvousC->modifierRendezvous($Rendezvous,$_GET['id']);
    /*echo $_POST['nprod'];
    echo $_POST['nomprod'];
    echo $_POST['PrixProd'];
    echo $_POST['QteProd'];
    echo $_POST['DescProd'];
    echo $_POST['CatProd'];*/
  header('Location: ../BackAdmin/rendezvous.php');
}
else { echo "erreur55 ";
}
?>
</body>
</HTMl>


