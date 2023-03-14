<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/inscription.css" />
</head>
<body>
	<h2 class="color-green">Inscription</h2>
	<div class="contact-form">
		<form action="Donne.php" method="get">
			<fieldset>
				<div class="row">
					<div class="form-group col-md-6 col-sm-6">
						<input type="text" class="form-control" name="nom" required placeholder="Nom" />
					</div>
					<div class="form-group col-md-6 col-sm-6">
						<input type="text" class="form-control" name="prenom" required placeholder="Prénom" />
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6 col-sm-6">
						<input type="text" class="form-control" name="login" required placeholder="login" />
					</div>
					<div class="form-group col-md-6 col-sm-6">
						<input type="text" class="form-control" name="password" required placeholder="password" />
					</div>
				</div>
				<input type="hidden" name="role" value="eleve">
				<div class="col-md-12 col-sm-12 text-center">
					<button type="submit" class="btn-contact">Terminer</button>
				</div>
				<a href="authentification.php" >Authentification</a><br> 
			</fieldset>
		</form>
	</div>
</body>
</html>
