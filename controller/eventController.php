<?php
include('../model/eventModel.php');
include('../bdd/bdd.php');

if (isset($_POST['event'])) {
    $eventController = new EventController($bdd);

    switch ($_POST['event']) {
        case 'ajouter':
            $eventController->create();
            break;
        
        case 'supprimer':
            $eventController->delete();
            break;

        default:
            echo "Action non reconnue.";
            break;
    }
}

class EventController 
{
    private $event;

    function __construct($bdd)
    {
        $this->event = new Event($bdd);
    }

    public function create()
    {
        // Vérification de l'existence des valeurs dans $_POST avant de les utiliser
        if (isset($_POST['titre'], $_POST['lieu'], $_POST['description'], $_POST['tarif'], $_POST['capacite'], $_POST['dateD'], $_POST['dateF'])) {
            
            // Récupérer les valeurs des dates
            $dateD = $_POST['dateD'];
            $dateF = $_POST['dateF'];

            // Validation des dates
            if (!$this->validateDate($dateD) || !$this->validateDate($dateF)) {
                echo "Format de date invalide.";
                return;
            }

            // Appel à la méthode d'ajout d'événement
            $result = $this->event->ajouterEvent($_POST['titre'], $_POST['lieu'], $_POST['description'], $_POST['tarif'], $_POST['capacite'], $dateD, $dateF);
            
            if ($result) {
                echo "Événement ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'événement.";
            }
        } else {
            echo "Données manquantes pour l'ajout de l'événement.";
        }
    }

    // Fonction de validation des dates
    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public function delete()
    {
        if (isset($_POST['idEvent'])) {
            $this->event->supprimerEvent($_POST['idEvent']);
        } else {
            echo "Erreur lors de l'ajout de l'événement.";
        }

        // Redirection après suppression
        header('Location: http://127.0.0.1/PPT/index.php');
        exit();
    }

}
?>
