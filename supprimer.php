<?php

require_once('bdd.php');
require_once('header.php');

$bdd=connexionBDD();

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$requete='DELETE FROM villes_france_free WHERE ville_id=:id';
$requete=$bdd->prepare($requete);
$requete->bindvalue(':id',$id);
$requete->execute();

?>

<div class=" containerTraitementSupprimer">
    <p>Votre modification a bien été enregistrée</p>
    <p class='global'>Pour Revenir au Menu Principal: <a class='globalLien' href="index.php">Cliquez ici</a></p>
</div>

