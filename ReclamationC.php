<?php

include_once "../config.php";
include_once "../Entities/Reclamation.php";

class ReclamationC
{

    /**
     * ReclamationC constructor.
     */
    public function __construct()
    {
    }

    function AjouterReclamation($Reclamation)
    {
        $sql = "insert into Reclamation (nom,mail,sujet,msg) values (:nom,:mail,:sujet,:msg)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $Nom = $Reclamation->getNom();
            $mail = $Reclamation->getMail();
            $sujet = $Reclamation->getSujet();
            $msg = $Reclamation->getMsg();
            $req->bindValue(':nom', $Nom);
            $req->bindValue(':mail', $mail);
            $req->bindValue(':sujet', $sujet);
            $req->bindValue(':msg', $msg);
            $req->execute();
            echo "Reclamation Ajoute";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            echo "Reclamation non Ajoute";
        }
    }

    function AfficherReclamation()
    {
        $sql = "SElECT * From Reclamation ORDER By date";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerReclamation($num)
    {
        $sql = "DELETE FROM Reclamation where id= :num";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':num', $num);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifier_produit($Reclamation, $id)
    {
        $sql = "UPDATE Reclamation SET nom=:nom,mail=:mail,sujet=:sujet,msg=:msg  WHERE id=:id";
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try {

            $req = $db->prepare($sql);
            $nom = $Reclamation->getNom();
            $mail = $Reclamation->getMail();
            $sujet = $Reclamation->getSujet();
            $msg = $Reclamation->getMsg();
            //$statut = $Reclamation->getStatut();
            $datas = array(':nom' => $nom, ':id' => $id, ':mail' => $mail, ':sujet' => $sujet, ':msg' => $msg);
            print_r($datas);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':id', $id);
            $req->bindValue(':mail', $mail);
            $req->bindValue(':sujet', $sujet);
            $req->bindValue(':msg', $msg);
            $s = $req->execute();
            echo "update sucess";
            // header('Location: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }
    }

    function recupererReclamation($id)
    {
        //$id = 3;
        $db = config::getConnexion();
        $sql = "SELECT * from Reclamation where id=$id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


}


?>
