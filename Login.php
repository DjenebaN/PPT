<div class="center">
    <h1>Inscription</h1>
    <form action="controller/utilisateurController.php" method="POST">

        <div>
            Nom : <input type="text" name="nom" required>
        </div>

        <div>
            Prénom : <input type="text" name="prenom" required>
        </div>

        <div>
            Email : <input type="email" name="email" required>
        </div>

        <div>
            Mot de Passe : <input type="password" name="motpasse" required>
        </div>

        <div>
            Télephone : <input type="text" name="telephone" required>
        </div>

        <input type="hidden" name="action" value="ajouter">
        <input type="submit" value="valider">
    </form>
</div>
