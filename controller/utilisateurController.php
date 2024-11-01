<?php
include('../model/utilisateurModel.php');
include('../bdd/bdd.php');

if (isset($_POST['action'])) {
    $membreController = new MembreController($bdd);

    switch ($_POST['action']) {
        case 'ajouter':
            $membreController->create();
            break;
        default:
            echo "Action non reconnue.";
            break;
    }
}

class MembreController 
{
    private $membre;

    function __construct($bdd)
    {
        $this->membre = new Membre($bdd);
    }

    public function create()
    {
        // Vérification de l'existence des valeurs dans $_POST avant de les utiliser
        if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['motpasse'], $_POST['telephone'])) {
            $result = $this->membre->ajouterMembre($_POST['nom'], $_POST['prenom'], $_POST['email'],  $_POST['motpasse'],  $_POST['telephone']);
            
            if ($result) {
                echo "Membre ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du membre.";
            }
        } else {
            echo "Données manquantes pour l'ajout du membre.";
        }
    }
}
?>
