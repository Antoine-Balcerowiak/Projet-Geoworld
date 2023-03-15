<link rel="stylesheet" href="css/updateUti.css" />
<?php
require_once('inc/manager-db.php');
// On récupère la session
session_start();
// On teste pour voir si nos variables de session ont bien été enregistrées
if (isset($_SESSION['nom']) && isset($_SESSION['role']) && isset($_SESSION['identifiant'])) {
    echo "<p style='text-align:right;'>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
    echo '<br><a href="./logout.php">Deconnexion</a></p>';
} else {
    header('location: authentification.php');
    exit(); // Add exit() to stop the execution of the script
}
?>

    
    
<?php if($_SESSION['role'] == 'admin'): ?>
<?php
require_once("inc/connect-db.php");

//on récupère et on vérifie que l'id figure dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uti = getUti($id);
} else {
    // Redirect if id is not provided
    header('location: some_other_page.php');
    exit(); // Add exit() to stop the execution of the script
}
?>

<form action="update.php" method="get">
    <fieldset>
        <legend><i>Utilisateur</i></legend>
        Nom :
        <input type="text" name="nom" required value="<?php echo $uti->nom; ?>" /> <br />
        Prénom :
        <input type="text" name="prenom" required value="<?php echo $uti->prenom; ?>" /> <br />
        login :
        <input type="text" name="login" value="<?php echo $uti->login; ?>"/> <br />
        password :
        <input type="text" name="password" value="<?php echo $uti->password; ?>"/> <br />
        role :
        <select name="role">
            <option value="eleve" <?php if ($uti->role == 'eleve') {echo 'selected';} ?>>élève</option>
            <option value="prof" <?php if ($uti->role == 'prof') {echo 'selected';} ?>>prof</option>
            <option value="admin" <?php if ($uti->role == 'admin') {echo 'selected';} ?>>admin</option>
        </select>
        <input type="hidden" name="id" value="<?php echo $uti->id ?>" />
    </fieldset>
    <input type="submit" value="mettre à jour" />
    <input type="reset" value="Effacer" />
</form>
<?php endif; ?>

