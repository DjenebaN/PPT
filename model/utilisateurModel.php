<?php

//CRUD

class Membre 
{
    private $bdd; // Assurez-vous que la propriété est déclarée

    function __construct($bdd)
    {
        $this->bdd = $bdd; // Initialisation de la propriété
    }

	public function ajouterMembre($nom, $prenom, $email, $motpasse, $telephone)
{
    try {
        // Hachage du mot de passe pour la sécurité
        $motpasse_hache = password_hash($motpasse, PASSWORD_BCRYPT);

        // Préparation de la requête avec TypeUtilisateur fixé à 1
        $req = $this->bdd->prepare("INSERT INTO Membre (TypeUtilisateur, Nom, Prenom, Email, MotPasse, Tel) VALUES (1, :nom, :prenom, :email, :motpasse, :telephone)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':email', $email);
        $req->bindParam(':motpasse', $motpasse_hache); // Utilisation du mot de passe haché
        $req->bindParam(':telephone', $telephone);

        return $req->execute(); // Exécution de la requête
    } catch (Exception $e) {
        echo 'Erreur lors de ajout du membre : ' . $e->getMessage();
        return false;
    }
}



}


?>