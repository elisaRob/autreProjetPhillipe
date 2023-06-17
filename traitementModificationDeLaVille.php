<?php

require_once('bdd.php');
require_once('header.php');

$bdd=connexionBdd();

if(isset($_POST['id'])){
    $id=htmlspecialchars($_POST['id']);
    $nomVille=htmlspecialchars($_POST['nomVille']);
    $codePostal=htmlspecialchars($_POST['codePostalVille']);
}

$requete='UPDATE villes_france_free SET ville_nom=:nom , ville_code_postal=:codePostal WHERE ville_id=:id';
$recuperationDonnee=$bdd->prepare($requete);
$recuperationDonnee->bindvalue(':id',$id);
$recuperationDonnee->bindvalue(':nom',$nomVille);
$recuperationDonnee->bindvalue(':codePostal',$codePostal);

$recuperationDonnee->execute();

?>

<div class="containerTraitementModifier">
    <p>Votre modification a bien été enregistrée</p>
    <p class='global'>Pour Revenir au Menu Principal: <a class='globalLien' href="index.php">Cliquez ici</a></p>
</div>
