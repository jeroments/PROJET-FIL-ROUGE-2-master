<?php 
include('../models/connect.php');
include('../models/_classes.php');
   
if(!empty($_POST['form_inscription'])) {
    $utilisateur->insert($_POST['form_nom'], $_POST['form_prenom'], $_POST['form_email'], $_POST['form_mdp'], $_POST['form_role']);
    header("Location: ../index.php");
}

?>