<?php
class Rendezvous{
    private $nom;
    private $date;
    private $mail;
    private $telephone;

    /**
     * Rendezvous constructor.
     * @param $nom
     * @param $date
     * @param $email
     * @param $telephone
     */
    public function __construct($nom, $mail, $telephone, $date)
    {
        $this->nom = $nom;
        $this->date = $date;
        $this->mail = $mail;
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getmail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $email
     */
    public function setmail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }




}