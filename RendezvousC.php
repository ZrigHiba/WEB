<?php

include_once "../config.php";
include_once "../Entities/Rendezvous.php";


class RendezvousC{
    /**
     * RendezvousC constructor.
     */
    public function __construct()
    {
    }
    function AjouterRendezvous($Rendezvous)
    {
        $sql = "insert into Rendezvous (nom,mail,telephone,date) values (:nom,:mail,:telephone,:date)"; // requete SQL
        $db = config::getConnexion(); //connexion a la  base de données
        try {
            $req = $db->prepare($sql);
            $Nom = $Rendezvous->getNom();
            $mail = $Rendezvous->getMail();
            $telephone = $Rendezvous->getTelephone();
            $date = $Rendezvous->getDate();
            $req->bindValue(':nom', $Nom); //Bindvalue pour eviter les injections SQL
            $req->bindValue(':mail', $mail);
            $req->bindValue(':telephone', $telephone);
            $req->bindValue(':date', $date);
            $req->execute();
            echo "Rendez_vous Ajoute";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            echo "Rendez_vous non Ajoute";
        }
    }
    function AfficherRendezvous()
    {
        $sql = "SElECT * From Rendezvous ORDER By date";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerRendezvous($num)
    {
        $sql = "DELETE FROM Rendezvous where id= :num";
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
    function modifierRendezvous($Rendezvous, $id)
    {
        $sql = "UPDATE Rendezvous SET nom=:nom,mail=:mail,telephone=:telephone,date=:date  WHERE id=:id";
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try {

            $req = $db->prepare($sql);
            $nom = $Rendezvous->getNom();
            $mail = $Rendezvous->getMail();
            $date = $Rendezvous->getDate();
            $telephone = $Rendezvous->getTelephone();
            //$statut = $Reclamation->getStatut();
            $datas = array(':nom' => $nom, ':id' => $id, ':mail' => $mail, ':date' => $date, ':telephone' => $telephone);
            print_r($datas);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':id', $id);
            $req->bindValue(':mail', $mail);
            $req->bindValue(':date', $date);
            $req->bindValue(':telephone', $telephone);
            $s = $req->execute();
            echo "update sucess";
            // header('Location: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }
    }

    function recupererRendezvous($id)
    {
        //$id = 3;
        $db = config::getConnexion();
        $sql = "SELECT * from Rendezvous where id=$id";
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
