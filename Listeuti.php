<?php  require_once 'header.php'; ?>

<link rel="stylesheet" href="css/listeUti.css" />
<?php
 require_once('inc/manager-db.php');
 $listeUti = getAllUti();
 
?>
<?php
 require_once('inc/manager-db.php');
 // On récupère la session

 // On teste pour voir si nos variables de session ont bien été enregistrées
 if (isset($_SESSION['nom']) && isset($_SESSION['role'])) {
  echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."(".$_SESSION['role'].")";
  echo '<br><a href="./logout.php">Deconnexion</a>';
 }
 else
 header ('location: authentification.php');
?>
<?php if($_SESSION['role']=='admin'): ?>
<h1>Liste utilisateurs</h1> 
<table border=2>
  <tr>
    <th>id</th>
    <th>nom</th>
    <th>prenom</th>
    <th>login</th>
    <th>password</th>
    <th>role</th> 
    <th>update</th>
    <th>delete</th>
    

    
</tr>

 <?php foreach ($listeUti as $utilisateur ) :?>
<tr>
    <td><?php echo $utilisateur->id; ?></td>
    <td><?php echo $utilisateur->nom; ?></td>
    <td><?php echo $utilisateur->prenom; ?></td>
    <td><?php echo $utilisateur->login; ?></td>
    <td><?php echo $utilisateur->password; ?></td>
    <td><?php echo $utilisateur->role; ?></td>
    <td> <a href="updateUti.php?id=<?php echo $utilisateur->id; ?>" >update</a></td>
    <td> <a href="delete.php?id=<?php echo $utilisateur->id; ?>" >delete</a></td>
</tr>
<?php endforeach; ?>
<?php
require_once 'javascripts.php';

?>
<?php endif; ?>