<?php
session_start ();
 if($_SESSION['role']=='admin' || $_SESSION['role']=='prof' ): ?>
<?php
require_once('inc/connect-db.php');
//on récupère et on vérifie que l'id figure dans l'URL
if ( isset($_GET['id']) && !empty($_GET['id'])){
$id = $_GET['id'] ;
}
$query = "delete from utilisateur where id = :id ;";
try {
 $prep = $pdo->prepare($query);
 $prep->bindParam(':id', $id, PDO::PARAM_INT);
 $prep->execute();
 //On redirige vers la liste des utilisateurs
 header("Location:listeuti.php");
}
catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
}
?>
<?php endif ?>

