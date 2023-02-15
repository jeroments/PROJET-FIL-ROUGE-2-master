<?php

include_once('./connect.php');

if (empty($_GET['id'])) {
    die("Veuillez choisir un utilisateur valide à éditer");
}
$req = $db->prepare("SELECT * FROM utilisateurs WHERE utilisateur_id=:utilisateur_id;");
$req->bindParam(":utilisateur_id", $_GET['id']);
$req->execute();
$utilisateur = $req->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<fieldset>
    <legend>Update</legend>
    <form method="post" action="inscription.php">
        <input type="hidden" name="form_update" value="1">
        <input type="hidden" name="utilisateur_id" value="<?= $utilisateur['utilisateur_id'] ?>">
        <label>Nom:
            <input type="text" name="utilisateur_nom" value="<?= $utilisateur['utilisateur_nom'] ?>">
        </label>
        <br />
        <label>Prénom:
            <input type="text" name="utilisateur_prenom" value="<?= $utilisateur['utilisateur_prenom'] ?>">
        </label>
        <br />
        <label>E-mail:
            <input type="email" name="utilisateur_email" value="<?= $utilisateur['utilisateur_email'] ?>">
        </label>
        <br />
        <label>Mot de passe:
            <input type="password" name="utilisateur_mdp" value="">
        </label>
        <br />
        <input type="submit" value="Mettre à jour">
    </form>
</fieldset>
</body>
</html>
