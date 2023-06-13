<?php

require_once('bdd.php');

$bdd=connexionBDD();

$recupererVilleEtCodePostaux="SELECT ville_nom,ville_code_postal FROM villes_france_free ";
$requete=$bdd->prepare($recupererVilleEtCodePostaux);
$requete->execute();

// $villeEtCodePostauxRecupere=$requete->fetch(PDO::FETCH_ASSOC);

while ($villeEtCodePostauxRecupere = $requete->fetch(PDO::FETCH_ASSOC)) {
    echo $villeEtCodePostauxRecupere['ville_nom'] . ' - ' . $villeEtCodePostauxRecupere['ville_code_postal'] . '<br>';
}