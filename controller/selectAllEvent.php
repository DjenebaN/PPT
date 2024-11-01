<?php

include('model/eventModel.php');
include('bdd/bdd.php');


$event = new Event($bdd);
$allEvent = $event->allEvent();

?>