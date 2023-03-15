<link rel="stylesheet" href="css/updateCoun.css" />

<?php

 require_once('inc/manager-db.php');
 // On récupère la session
 session_start ();
 // On teste pour voir si nos variables de session ont bien été enregistrées
 if (isset($_SESSION['nom']) && isset($_SESSION['role']) && $_SESSION['identifiant']) {
 echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
 echo '<br><a href="./logout.php">Deconnexion</a></p>';
 }
 else
 header ('location: authentification.php');
 
                
    
?>
<?php if($_SESSION['role']=='admin' || $_SESSION['role']=='prof' ): ?>

        <?php
 
    require_once("inc/connect-db.php");
    

    //on récupère et on vérifie que l'id figure dans l'URL
    
    $id = $_GET['id'] ;
    $pays = getpays($id);

    $capital = $pays->Capital;
    $cap = getCapital($capital);

    $nompays=$pays->Name;
    $language=getLanguage($nompays);?>

   
    <form action="updateCountry.php" method="get" >
    <fieldset>
    <legend> <i>Pays</i></legend>
    Nom :
    <input type="text" name="Name" required value="<?php echo $pays->Name; ?>" /> <br />
    Population :
    <input type="text" name="Population" required value="<?php echo $pays->Population; ?>" /> <br />
    Capitale :
    <input type="text" name="Capital" required value="<?php echo $cap[0]->Name; ?>" /> <br />

    <input type="hidden" name="id" value="<?php echo $pays->id ?> ">

    <fieldset>
    <input type="submit" value="mettre à jour" />
    <input type="reset" value="Effacer" />
    </form>
    

<?php endif; ?>

