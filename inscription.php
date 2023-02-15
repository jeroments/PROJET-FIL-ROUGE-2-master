<?php

include_once('./connect.php');

$DB_NAME = "bobunteabdd";
$DB_USER = "root";
$DB_PASS = "";
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=' . $DB_NAME, $DB_USER, $DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   
$color = "transparent; display: none;";
$message = "";

if (!empty($_POST['form_insert'])) {
    $sql = 'INSERT INTO utilisateurs(utilisateur_nom, utilisateur_prenom, utilisateur_email, utilisateur_mdp) 
            VALUES(:utilisateur_nom, :utilisateur_prenom, :utilisateur_email, :utilisateur_mdp);';
    $req = $db->prepare($sql);
    $req->bindParam(":utilisateur_nom", $_POST['utilisateur_nom']);
    $req->bindParam(":utilisateur_prenom", $_POST['utilisateur_prenom']);
    $req->bindParam(":utilisateur_email", $_POST['utilisateur_email']);
    $utilisateur_mdp = password_hash($_POST['utilisateur_mdp'], PASSWORD_BCRYPT);
    $req->bindParam(":utilisateur_mdp", $utilisateur_mdp);
    $req->execute();

    $color = "green;";
    $message = "Insertion effectuée";
} elseif (!empty($_POST['form_update'])) {
    $sql = 'UPDATE utilisateurs 
            SET utilisateur_nom=:utilisateur_nom, 
                utilisateur_prenom=:utilisateur_prenom, 
                utilisateur_email=:utilisateur_email ';
    if (!empty($_POST['utilisateur_mdp'])) {
        $sql .= ', utilisateur_mdp=:utilisateur_mdp ';
    }
    $sql .= ' WHERE utilisateur_id=:id_utilisateur;';
    $req = $db->prepare($sql);
    $req->bindParam(":utilisateur_nom", $_POST['utilisateur_nom']);
    $req->bindParam(":utilisateur_prenom", $_POST['utilisateur_prenom']);
    $req->bindParam(":utilisateur_email", $_POST['utilisateur_email']);
    if (!empty($_POST['utilisateur_mdp'])) {
        $utilisateur_mdp = password_hash($_POST['utilisateur_mdp'], PASSWORD_BCRYPT);
        $req->bindParam(":utilisateur_mdp", $utilisateur_mdp);
    }
    $req->bindParam(":id_utilisateur", $_POST['utilisateur_id']);
    $req->execute();

    $color = "orange;";
    $message = "Mise à jour effectuée";
} elseif (!empty($_POST['form_delete'])) {
    $sql = 'DELETE FROM utilisateurs WHERE utilisateur_id=:id_utilisateur;';
    $req = $db->prepare($sql);
    $req->bindParam(":id_utilisateur", $_POST['utilisateur_id']);
    $req->execute();

    $color = "red;";
    $message = "Suppression effectuée";
}

// $utilisateurs = $db->query('SELECT * FROM utilisateurs')->fetchAll();
?>

  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="./views/inscription.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
  </head>
  <body>
    <!--------------------------------------------------------------  Nav --------------------------------------------------------------------------------------------------->
    <header>
      <a href="index.php"><img class="logo" src="img/logo.jpg" /></a>
      <div class="bx bx-menu" id="menu-icon"></div>
      <nav>
        <ul class="navbar">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="#produits">Nos produits</a></li>
          <li><a href="#livraison">Livraison</a></li>
          <li><a href="#about">A propos de nous</a></li>
          <li><a href="form.html">Contactez nous</a></li>
          <li><a href="">Inscription</a></li>
        </ul>
      </nav>
    </header>
    <!-------------------------------------------------------------------Fin NAV ---------------------------------------------------------------------------------------------->
    <section class="formulaire">

    <form method="post">
        <h4>INSCRIPTION</h4>
        <hr />
        <input type="hidden" name="form_insert" value="1">
        <label>Nom
        <input type="text" name="utilisateur_nom" placeholder="nom..." >
        </label>
        <br/>
        <label>Prénom
        <input type="text" name="utilisateur_prenom" placeholder="prenom..." >
        </label>
        <br/>
        <label>Adresse Mail
        <input type="email" name="utilisateur_email" placeholder="mail...">
        </label>
        <br/>
        <label>Mot de passe
        <input type="password" name="utilisateur_mdp" placeholder="ecrivez votre mot de pass...">
        </label>
        <br/>
        <input type="submit" value="Enregistrer" />

      </form>

    </section>

    <footer>
      <section class="contact" id="contact">
        <div class="social">
          <a href="#"><i class="bx bxl-facebook"></i></a>
          <a href="#"><i class="bx bxl-twitter"></i></a>
          <a href="#"><i class="bx bxl-instagram"></i></a>
          <a href="#"><i class="bx bxl-youtube"></i></a>
        </div>
        <div class="links">
          <a href="#">Mentions légales</a>
          <a href="#">Conditions générales</a>
          <a href="#">Politique de confidentialité</a>
        </div>
      </section>
      <div class="btn">
        <!-- <img src="arrow-up-solid.svg" class="icone"> -->
      </div>
    </footer>
  </body>
</html>
