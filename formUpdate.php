<?php

    require_once 'bd.php';
    $id=$_GET['ville_id'];

    $query= "SELECT * FROM villes_france_free WHERE ville_id=$id";
    $result= $bdd->query($query);

    $fetch= $result->fetch(PDO::FETCH_ASSOC);

    $cp=$fetch['ville_code_postal'];
?>

<html>
    <form action="update.php" method="GET">
        Code Postal : <input type="text" name="cp" value=<?php echo "$cp" ?>><br>
        <input type="HIDDEN" name="id" value="<?php echo "$id" ?>"><br>
        <input type="submit">
    </form>
</html>

