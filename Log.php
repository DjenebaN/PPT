<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<form action="Login.php" method="POST">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    
    <label for="motdepasse">Mot de passe :</label>
    <input type="password" id="motdepasse" name="motdepasse" required>

    <button type="submit" name="connexion">Se connecter</button>
</form>

<?php
include('bdd/bdd.php');
if (isset($_POST['connexion'])) {
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Vérifiez les informations d'identification
    $stmt = $bdd->prepare("SELECT * FROM Membre WHERE Email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($motdepasse, $user['MotPasse'])) { // Assurez-vous que vous utilisez password_hash() pour le mot de passe
        session_start();
        $_SESSION['user_id'] = $user['ID_Membre']; // Stockez l'ID de l'utilisateur dans la session
        echo "Connexion réussie. Vous pouvez maintenant réserver un événement.";
        // Rediriger vers la page d'accueil ou vers l'événement
        header("Location: index.php?page=Accueil"); // Remplacez par la page que vous souhaitez
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>
</body>
</html>
