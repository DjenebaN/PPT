<?php

//CRUD

class Event 
{
    private $bdd; // Assurez-vous que la propriété est déclarée

    function __construct($bdd)
    {
        $this->bdd = $bdd; // Initialisation de la propriété
    }

	public function ajouterEvent($titre, $lieu, $description, $tarif, $capacite, $dateD, $dateF)
{
    try {
        // Préparation de la requête d'insertion
        $req = $this->bdd->prepare("INSERT INTO Musee (Nom, Lieu, DescriptionEvenement, Tarif, Capacite, Debut, Fin) VALUES (:titre, :lieu, :description, :tarif, :capacite, :dateD, :dateF)");
        
        // Lien entre les variables et les paramètres de la requête
        $req->bindParam(':titre', $titre);
        $req->bindParam(':lieu', $lieu);
        $req->bindParam(':description', $description);
        $req->bindParam(':tarif', $tarif);
        $req->bindParam(':capacite', $capacite);
        $req->bindParam(':dateD', $dateD);
        $req->bindParam(':dateF', $dateF);

        // Exécution de la requête
        return $req->execute();
    } catch (Exception $e) {
        echo 'Erreur lors de l\'ajout de l\'événement : ' . $e->getMessage();
        return false;
    }
}

    public function allEvent()
        {
            $req = $this->bdd->prepare("SELECT * FROM Musee");
            $req->execute();
            return $req->fetchAll();
        }


    public function getEventById($id) {
        $stmt = $this->bdd->prepare('SELECT * FROM Musee WHERE ID_Musee = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function supprimerEvent($id)
	{

		$req = $this->bdd->prepare("DELETE FROM Musee WHERE ID_Musee = ?");
		return $req->execute([$id]);
	}

}


?>