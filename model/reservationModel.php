<?php

//CRUD

class Reservation
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterReservation($idMembre, $idEvenement)
    {
        try {
            $req = $this->bdd->prepare("INSERT INTO Reservation (ID_MembreRes, ID_EvenRes) VALUES (:idMembre, :idEvenement)");
            $req->bindParam(':idMembre', $idMembre);
            $req->bindParam(':idEvenement', $idEvenement);
            return $req->execute();
        } catch (Exception $e) {
            error_log('Erreur lors de la réservation : ' . $e->getMessage());
            return false;
        }
    }
}


?>