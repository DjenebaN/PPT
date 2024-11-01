<?php

$idEvent = $_GET['idEvent'];

include ('model/eventModel.php');
include('bdd/bdd.php');

$event = new Event ($bdd);
$detailEvent = $event->getEventById($idEvent);


?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Debut</th>
      <th scope="col">Fin</th>
      <th scope="col">Tarif</th>
      <th scope="col">Lieu</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $detailEvent['ID_Musee'];?></th>
      <td><?php echo $detailEvent['Nom'];?></td>
      <td><?php echo $detailEvent['DescriptionEvenement'];?></td>
      <td><?php echo $detailEvent['Debut'];?></td>
      <td><?php echo $detailEvent['Fin']; ?></td>
      <td><?php echo $detailEvent['Tarif']; ?></td>
      <td><?php echo $detailEvent['Lieu']; ?></td>
      <td>
     	<form action="controller/eventController.php" method="POST">
     		<input type="hidden" name="event" value="supprimer">
     		<input type="hidden" name="idEvent" value="<?php echo $detailEvent['ID_Musee'];?>">
     		<input type="submit" value="supprimer">
     	</form>
       <td><a href="index.php?page=Reservation&idEvent=<?php echo htmlspecialchars($detailEvent['ID_Musee']); ?>">Reserver</a></td>
    </tr>
  </tbody>
</table>