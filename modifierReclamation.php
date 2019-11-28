<HTML>
<head>
</head>
<body>
<?PHP
include "../Entities/Reclamation.php";
include "../Core/ReclamationC.php";
$ReclamationC=new ReclamationC();
if (isset($_GET['id'])){
    $result=$ReclamationC->recupererReclamation($_GET['id']);
    foreach($result as $row){
        $id=$row['id'];
        $nom=$row['nom'];
        $mail=$row['mail'];
        $sujet=$row['sujet'];
        $msg=$row['msg'];
        $date=$row['date'];
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
                    <td><input type="number" name="qte" value="<?PHP echo $sujet ?>"></td>
                </tr>
                <tr>
                    <td>Descrition</td>
                    <td><input type="text" name="descr" value="<?PHP echo $msg ?>"></td>
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
    $Reclamation=new Reclamation($_GET['nom'],$_GET['mail'],$_GET['sujet'],$_GET['msg']);
    //var_dump($Reclamation);
    $ReclamationC->modifier_produit($Reclamation,$_GET['id']);
    /*echo $_POST['nprod'];
    echo $_POST['nomprod'];
    echo $_POST['PrixProd'];
    echo $_POST['QteProd'];
    echo $_POST['DescProd'];
    echo $_POST['CatProd'];*/
    header('Location: ../BackAdmin/tables.php');
}
else { echo "erreur55 ";
}
?>
</body>
</HTMl>
