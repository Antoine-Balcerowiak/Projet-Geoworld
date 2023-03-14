
                
               
<?php
require_once('updateUti.php');
require_once("inc/connect-db.php");
 if($_SESSION['role']=='admin'): ?>
<?php
// à faire sur chaque donnée reçue
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$login = $_GET['login'];
$password = $_GET['password'];
$role = $_GET['role'];

// on rédige la requête SQL
$sql = "UPDATE utilisateur set
nom=:nom,prenom=:prenom,login=:login,password=:password,role=:role
where id=:id";
try {
//on prépare la requête avec les données reçues
$statement = $pdo->prepare($sql);
$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
$statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$statement->bindParam(':login', $login, PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);
$statement->bindParam(':role', $role, PDO::PARAM_STR);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
//On renvoie vers la liste des salaries
 header("Location:listeuti.php");
}
catch(PDOException $e){
 echo 'Erreur : '.$e->getMessage();
}
?>
<br>
<a href="listeuti.php" >liste</a>
 <?php endif; ?>