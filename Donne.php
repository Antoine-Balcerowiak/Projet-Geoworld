<doctype html>
<header>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width, initial-scale=">
<title>Nouveau Salarié</title>
</header>
<body>


<?php


echo 'nom : ' .$_GET['nom']. '<br>';
echo 'prénom : ' .$_GET['prenom']. '<br>';
echo 'login : ' .$_GET['login']. '<br>';
echo 'password : ' .$_GET['password']. '<br>';
echo 'role : ' .$_GET['role']. '<br>';
?>
<a href="listeuti.php" >Liste utilisateur</a>



<?php

     require_once("inc/connect-db.php");

     
     $nom =$_GET['nom'];
     $prenom =$_GET['prenom'];
     $login =$_GET['login'];
     $password =$_GET['password'];
     $role =$_GET['role'];
     

    

     $sql="INSERT INTO utilisateur ( nom, prenom,login,password,role)VALUES ( :nom, :prenom,  :login, :password, :role)";
     try {
     $query= $pdo -> prepare($sql);
     $query->bindParam(':nom' ,$nom,PDO::PARAM_STR);
     $query->bindParam(':prenom' ,$prenom,PDO::PARAM_STR);
     $query->bindParam(':login' ,$login,PDO::PARAM_STR);
     $query->bindParam(':password' ,$password,PDO::PARAM_STR);
     $query->bindParam(':role' ,$role,PDO::PARAM_STR);
    $query->execute();

    header ("location:listeuti.php");
}
catch (PDOException $e){
    echo 'erreur : '.$e->getMessage();
}
?>