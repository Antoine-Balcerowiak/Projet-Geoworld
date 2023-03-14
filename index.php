<link rel="stylesheet" href="css/index.css" />
<?php 
require_once 'header.php';
require_once('inc/manager-db.php');
?>

<?php
// On teste pour voir si nos variables de session ont bien été enregistrées
if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
  echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
  echo '<br><a href="./logout.php">Deconnexion</a>';
} else {
  header ('location: authentification.php');
  exit();
}

if (isset($_GET['continent']) && !empty($_GET['continent'])) {
  $continent = $_GET['continent'];
} else {
  $continent = 'Africa';
}

$desPays = getCountriesByContinent($continent);

?>
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 onclick="info(this)">Les pays en <?php echo"$continent"; ?> </h1>
    <div>
      <table class="table">
        <tr>
          <th>Nom</th>
          <th>Population</th>
          <th>Capital</th>
          <th>Langue parlées</th>
          <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='prof' ): ?>
          <th>Update</th>
          <?php endif; ?>
        </tr>
        <?php foreach ($desPays as $pays ) :?>
          <tr>
            <td> <?php echo $pays->Name; ?></td>
            <td> <?php echo $pays->Population; ?></td>
            <?php 
              $capital = $pays->Capital;
              $cap = getCapital($capital);?>
            
                <?php if(empty($cap)): ?>
                  <td> <?php echo "vide"; ?></td>
                <?php else:?>
                  <td> <?php echo $cap[0]->Name; ?></td>
                <?php endif; ?>  

          
            <td>  
              <?php $nompays=$pays->Name;
              $language=getLanguage($nompays);
              foreach ($language as $langue) :?>
                  <a> <?php echo $langue->Name; ?> </a>  
                  <a> <?php echo "-"; ?> </a>  
              <?php endforeach; ?>
              <?php if(empty($language)):?>
                  <a> <?php echo"vide"; ?> </a> 
              <?php endif; ?>

            </td>
            <?php if($_SESSION['role']=='admin' || $_SESSION['role']=='prof' ): ?>
            <td> <a href="updateCoun.php?id=<?php echo $pays->id; ?>" >Update</a></td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <p>
      <code>
        <?php
          // la variable $desPays contient tous les pays d'un continent
          // elle est de type tableau
          // chaque élément est un objet (de type Country)
          // les propriétés de l'objet sont les noms des colonnes de la table Country
        ?>
      </code>
    </p>
  </div>
</main>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>