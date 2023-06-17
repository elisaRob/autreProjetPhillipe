<?php

require_once('bdd.php');
require_once('header.php');

$bdd=connexionBDD();

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$selectionnerVille='SELECT ville_nom,ville_id,ville_code_postal FROM villes_france_free WHERE ville_id=:id';

$requete=$bdd->prepare($selectionnerVille);
$requete->bindvalue(':id',$id);
$requete->execute();

$ville=$requete->fetch(PDO::FETCH_ASSOC);

if($ville){
    ?>
    <div class="containerMofifierVille">
        <h2>Modifier la ville</h2>

        <form action="traitementModificationDeLaVille.php" method="post">
            <input type="hidden" name='id' value=<?=$ville['ville_id']?>>

            <label for="nomVille">Nom de la ville</label>
            <input id="nomVille" value="<?=$ville['ville_nom']?>"  name="nomVille" type="text">

            <label for="codePostalVille">Code postal de la ville</label>
            <input type="text" value="<?=$ville['ville_code_postal']?>" name="codePostalVille" id="codePostalVille">

            <button type="submit">Validez</button>
            <p class='global'>Pour Revenir au Menu Principal: <a class='globalLien' href="index.php">Cliquez ici</a></p>
        </form>
    </div>
<?php
}