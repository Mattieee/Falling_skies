<?php require 'inc/header.php'; ?>

<?php 

if(!empty($_POST)){

	$errors = array();

	if(empty($_POST['username']) || !preg_match('/^[a-z0-9_]+$/', $_POST['username'])){

		$errors['username'] = "Votre pseudo n'est pas valide (aplphanumérique)";

	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){



		$errors['email'] = "Votre email n'est pas valide";

	}

	if(empty($_POST['password']) || $_POST['password'] !=$_POST['password_confirm']){



		$errors['password'] = "Vous devez rentrer un mot de passe valide";

	}

	debug($errors);

}

?>

<h1>S'inscrire</h1>

<form action="" method="POST">

	<div cass="form-group">
		<label for="">Pseudo</label>
		<label type="text" name="username" class="form-control"/>
	</div>

	<div cass="form-group">
		<label for="">Email</label>
		<label type="text" name="email" class="form-control"/>
	</div>

	<div cass="form-group">
		<label for="">Mot de passe</label>
		<label type="text" name="password" class="form-control"/>
	</div>

	<div cass="form-group">
		<label for="">Confirmer votre mot de passe</label>
		<label type="text" name="password_confirm" class="form-control"/>
	</div>

	<button type="submit" class="btn btn-primary">M'inscrire</button>

</form>

<?php require 'inc/footer.php'; ?>
