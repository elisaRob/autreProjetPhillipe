<?php

require_once('header.php');

$bdd=connexionBDD();

$recupererVilleEtCodePostaux="SELECT ville_nom,ville_code_postal FROM villes_france_free LIMIT 10";
$requete=$bdd->prepare($recupererVilleEtCodePostaux);
$requete->execute();

?>
<div class="recupererVilleEtCodePostaux">

<table>
        <thead>
            <th>Villes</th>
            <th>Code postal</th>
        </thead>
        <tbody>
<?php
while ($villeEtCodePostauxRecupere = $requete->fetch(PDO::FETCH_ASSOC)) {
    ?>
   
    
                <tr>
                    <td><?=$villeEtCodePostauxRecupere['ville_nom']?></td>
                    <td><?=$villeEtCodePostauxRecupere['ville_code_postal']?></td>
                </tr>
<?php
            }
?>
              
            </tbody>
        </table>

    </div>

    
    <?php
    require_once('footer.php');
   
