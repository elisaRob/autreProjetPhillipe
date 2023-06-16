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

