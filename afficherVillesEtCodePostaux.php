<?php

require_once('header.php');
require_once('bdd.php');

$bdd=connexionBDD();

$resultatsPage=10;

// Vérifier la page actuelle
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$indiceDepart = (intval($page) - 1) * $resultatsPage;

$recupererVilleEtCodePostaux="SELECT ville_id,ville_nom,ville_code_postal FROM villes_france_free LIMIT $resultatsPage OFFSET $indiceDepart";
$requete=$bdd->prepare($recupererVilleEtCodePostaux);
$requete->execute();

$nombreResultats=$requete->rowCount();
// $nomreTotalDePages=ceil($nombreResultats/$resultatsPage)

?>
<div class="recupererVilleEtCodePostaux">
<p class='global'>Pour Revenir au Menu Principal: <a class='globalLien' href="index.php">Cliquez ici</a></p>

<table>
        <thead>
            <th>Villes</th>
            <th>Code postal</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
<?php
while ($villeEtCodePostauxRecupere = $requete->fetch(PDO::FETCH_ASSOC)) {
    ?>
   
    
                <tr>
                    <td><?=$villeEtCodePostauxRecupere['ville_nom']?></td>
                    <td><?=$villeEtCodePostauxRecupere['ville_code_postal']?></td>
                    <td><a href="modifierFormulaire.php?id=<?=$villeEtCodePostauxRecupere['ville_id']?>">Modifier</a></td>
                    <td><a class="supprimer" href="supprimer.php?id=<?=$villeEtCodePostauxRecupere['ville_id']?>">Supprimer</a></td>
                </tr>
<?php
            }
       
?>
              
            </tbody>
        </table>
       

        <div class="pagination">
            <?php
                for($pageNumber=1;$pageNumber<$nombreResultats;$pageNumber++){
                    $activeClass=($pageNumber==intval($page))?"active":'';
                ?>
                    <a href="afficherVillesEtCodePostaux.php?page=<?=$pageNumber ?>" class='<?=$activeClass?>'><?=$pageNumber?></a>
                <?php    
                }
            ?>
      </div>


    </div>

    <script>
        const elSupprimer=document.querySelectorAll(".supprimer");

        elSupprimer.forEach((element)=>{
            element.addEventListener('click',(e)=>{
               
                const confirmation=confirm("souhaitez vous supprimez cette ville?");

                if(confirmation===true){
                    window.location.href=element.getAttribute('href')
                }else{
                    e.preventDefault();
                }
            })
        })
    </script>
   
 

    
<?php
    require_once('footer.php');
?>


