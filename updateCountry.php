<?php
require_once('updateCoun.php');
require_once("inc/connect-db.php");


// à faire sur chaque donnée reçue
$Name = $_GET['Name'];
$Population = $_GET['Population'];
$Capital = $_GET['Capital'];
$Langue = $_GET['Langue'];


// on rédige la requête SQL
$sql = "UPDATE country set Name=:Name,Population=:Population where id=:id";
$sql2 = "UPDATE city set Name=:Name where idcountry=:id";
try {
//on prépare la requête avec les données reçues
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->bindParam(':Name', $Name, PDO::PARAM_STR);
$statement->bindParam(':Population', $Population, PDO::PARAM_STR);
$stat = $pdo->prepare($sql2);
$stat->bindParam(':id', $id, PDO::PARAM_INT);
$stat->bindParam(':Name', $Capital, PDO::PARAM_STR);

$statement->execute();
$stat->execute();
//On renvoie vers la liste des salaries
 header("Location:index.php");
}
catch(PDOException $e){
 echo 'Erreur : '.$e->getMessage();
}
?>
<br>
<a href="index.php" >liste</a>
