<?php
include_once('./connect.php');

if (isset($_POST['utilisateur_email'])){
  $utilisateur_email = stripslashes($_REQUEST['utilisateur_email']);
  $utilisateur_email = mysqli_real_escape_string($conn, $utilisateur_email);
  $password = stripslashes($_REQUEST['utilisateur_mdp']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `utilisateurs` WHERE username='$utilisateur_email' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['utilisateur_email'] = $utilisateur_email;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./views/inscription.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
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
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="email" name="utilisateur_email" placeholder="mail...">
<input type="password" name="utilisateur_mdp" placeholder="ecrivez votre mot de pass...">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="./inscription.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>

</section>
</body>
</html>