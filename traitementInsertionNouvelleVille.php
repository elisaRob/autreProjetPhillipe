<?php

require_once('bdd.php');
require_once('header.php');

$bdd=connexionBDD();

if (isset($_POST["ville"])) {
    $ville = $_POST['ville'];
}

if(isset($_POST['departement'])){
    $departement=$_POST['departement'];
}

$requeteSqlInsertion="INSERT INTO villes_france_free(ville_nom,ville_departement) VALUES (:ville,:departement)";
$requete=$bdd->prepare($requeteSqlInsertion);
$requete->bindvalue(':ville',$ville);
$requete->bindvalue(':departement',$departement);
$requete->execute();

?>

<div class="containerAjoutNouvelleVille">
    <p>Bonjour vous avez bien rajoutés votre ville</p>
    <p class='global'>Pour Revenir au Menu Principal: <a href="index.php">Cliquez ici</a></p>
</div>