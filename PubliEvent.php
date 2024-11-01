<div class="center">
    <h1>Reservation</h1>
    <form action="controller/eventController.php" method="POST">

        <div>
            Titre : <input type="text" name="titre" required>
        </div>

        <div>
            Lieu : <input type="text" name="lieu" required>
        </div>

        <div>
            Description : <input type="text" name="description" required>
        </div>

        <div>
            Tarifs : <input type="text" name="tarif" required>
        </div>

        <div>
            Capacité : <input type="text" name="capacite" required>
        </div>

        <div>
            Date de début : <input type="date" name="dateD" required>
        </div>
 
        <div>
            Date de fin : <input type="date" name="dateF" required>
        </div>

        <input type="hidden" name="event" value="ajouter">
        <input type="submit" value="valider">
    </form>
</div>
