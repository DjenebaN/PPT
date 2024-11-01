<?php 

include('controller/selectAllEvent.php');

?>

<div>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Debut</th>
                <th scope="col">Fin</th>
                <th scope="col">Lieu</th>
                <th scope="col">Tarif</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($allEvent as $index => $value) {  ?>
    <tr>
        <th scope="row"><?php echo $index + 1; ?></th> 
        <td><?php echo htmlspecialchars($value['Nom']); ?></td>
        <td><?php echo htmlspecialchars($value['DescriptionEvenement']); ?></td>
        <td><?php echo htmlspecialchars($value['Debut']); ?></td>
        <td><?php echo htmlspecialchars($value['Fin']); ?></td>
        <td><?php echo htmlspecialchars($value['Lieu']); ?></td>
        <td><?php echo htmlspecialchars($value['Tarif']); ?></td>
        <td><a href="index.php?page=EventDetail&idEvent=<?php echo htmlspecialchars($value['ID_Musee']); ?>">Détails</a></td>
    </tr>
    <?php } ?>
</tbody>

    </table>
</div>
