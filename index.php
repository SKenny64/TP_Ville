
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>Document</title>
</head>
<body>
  <h1><a href="formInscr.php" title="ajout ville">Ajouter une ville</a></h1>
  <hr>
  <main>
    <table>
      <thead>
        <th><h2>Ville</h2></th>
        <th><h2>Département</h2></th>
        <th></th>
        <th></th>
      </thead>
      <tbody> 
        <?php
          require_once 'bd.php';
          // Nombre d'éléments à afficher par page
          $elementsParPage = 25;

          // Page actuelle (par défaut 1)
          $page = isset($_GET['page']) ? $_GET['page'] : 1;

          // Calcul de l'offset pour la requête SQL
          $offset = ($page - 1) * $elementsParPage;

          $query= "SELECT * FROM villes_france_free ORDER BY ville_departement LIMIT $elementsParPage OFFSET $offset";
          $results= $bdd->query($query);

          foreach ($results as $key) {
              echo "<table >
                <tr>
                  <td scope='row'>$key[ville_nom_reel]</td>
                  <td>$key[ville_departement]</td>
                  <td><a href='formUpdate.php?ville_id=".$key['ville_id']."' title='modification'>Modifier</a>
                  <td><a href='delete.php?id=".$key['ville_id']."' title='suppression'>Supprimer</a>
                </tr>";
          };

        ?>
      </tbody>
    </table>

    
    <?php
      // Pagination
      $queryCount = "SELECT COUNT(*) FROM villes_france_free";
      $totalElements = $bdd->query($queryCount)->fetchColumn();
      $totalPages = ceil($totalElements / $elementsParPage);

      for ($i = 1; $i <= $totalPages; $i++) {
        if($totalPages > 1) {
          echo ' |';
            for ($i=1; $i<=$totalPages; $i++)
            {
            if($i==1 || (($page-5)<$i && $i<($page+5)) || $i==$totalPages)
            {
              if($i==$totalPages && $page<($totalPages-5)) { echo '...|'; }
              if ($i == $page) { echo ' <b>page '.$i.'</b> |'; }
              else { echo ' <a href="index.php?page='.$i.'" title="page '.$i.'">'.$i.'</a> |'; }
              if($i==1 && $page>6) { echo '...'; }
            }
            }
          }
      }
    ?>
  </main>
</body>
</html>


