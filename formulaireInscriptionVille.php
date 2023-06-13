<?php

require_once('header.php');
require_once('bdd.php');

?>

<div class="containerFormulaireInscriptionNouvelleVille">
    <form action="recuperationNouvelleVille.php" method="POST">
        <label for="ville">Entrez le nom de votre ville</label>
        <input type="text" id="ville" name="ville">

        <label for="departement">Entrez le département de votre ville</label>
        <input id="departement" type="text" name="departement">

        <button type="submit">Ajoutez</button>
    </form>
</div>