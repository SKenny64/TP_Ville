<?php
 
    $id=$_GET["id"];

    require_once 'bd.php';
    $query = "DELETE FROM villes_france_free WHERE ville_id=$id";
        
    $bdd->exec($query);

    echo "Ville supprimer<br>"."<a href='index.php'>Retour à l'acceuil</a>";

?>