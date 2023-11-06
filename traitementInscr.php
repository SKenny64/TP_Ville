<?php

    require_once 'bd.php';
   
    $query='INSERT INTO villes_france_free(ville_nom_reel , ville_departement) VALUES(:ville , :dep)';

    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':ville',$_GET["ville"], PDO::PARAM_STR);
    $stmt->bindParam(':dep',$_GET["dep"], PDO::PARAM_STR);
    $stmt->execute();

    echo "<a href='index.php'>Retour à l'acceuil</a>";
?>

    