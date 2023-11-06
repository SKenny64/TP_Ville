
<?php
    require_once 'bd.php';
    $id=$_GET['id'];
    $query = "UPDATE villes_france_free SET ville_code_postal = :cp
        WHERE ville_id=$id";
     $stmt = $bdd->prepare($query);
     $stmt->bindParam(':cp',$_GET["cp"], PDO::PARAM_STR);
     $stmt->execute();

    echo "Modification effectuée.<br><a href='index.php'>Retour à l'acceuil</a>";
?>
