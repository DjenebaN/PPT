<?php

include('model/reservationModel.php');
include('bdd/bdd.php');


$reservation = new Reservation($bdd);
$allReservation = $reservation->allReservation();

?>