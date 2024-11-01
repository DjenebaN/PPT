<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
</head>
<body>
<?php

$idEvent = $_GET['idEvent'];


include('model/eventModel.php');
include('model/reservationModel.php'); // Inclure le modèle de réservation
include('bdd/bdd.php');

$event = new Event($bdd);
$detailEvent = $event->getEventById($idEvent);


?>