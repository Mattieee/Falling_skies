<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');


if(isset($_POST['forminscription'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail2 = htmlspecialchars($_POST['mail2']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
		$pseudolength = strlen($pseudo);
		if($pseudolength <= 255) {
			if($mail == $mail2) {
				if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
					$reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
					$reqmail->execute(array($mail));
					$mailexist = $reqmail->rowCount();
					if($mailexist == 0) {
						if($mdp == $mdp2) {
							$insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
							$insertmbr->execute(array($pseudo, $mail, $mdp));
							$erreur = "Votre compte a bien été créé ! <a href=\"../Site_falling_skies/index-2\">Me connecter</a>";
						} else {
							$erreur = "Vos mots de passes ne correspondent pas !";
						}
					} else {
						$erreur = "Adresse mail déjà utilisée !";
					}
				} else {
					$erreur = "Votre adresse mail n'est pas valide !";
				}
			} else {
				$erreur = "Vos adresses mail ne correspondent pas !";
			}
		} else {
			$erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
		}
	} else {
		$erreur = "Tous les champs doivent être complétés !";
	}
}
?>

<html lang="fr">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Espace membre</title>
	<meta name="author" content="Matthieu Royer">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style2.css" />


	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">


    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<!-- Navigation
	==========================================-->
	<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top img-responsive"> 

		<!-- barre de menu-->
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">

					<li><a href="index-2.php" class="page-scroll">ACCUEIL</a></li>
					<li><a href="4-saisons.php" class="page-scroll">4 SAISONS</a></li>
					<li><a href="personnages.php" class="page-scroll">PERSONNAGES</a></li>
					<li><a href="#tf-contact" class="page-scroll">CONTACT</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->

		</div><!-- /.container-fluid -->
	</nav>




	<div id="inscription"  class="text-center img-responsive"  >
		<div class="overlay">
			<div align="center">
				
				<br /><br />
				<div class="titre1">Inscription</div>
				<form class="box_inscription" method="POST" action="">
					
					<table>


						<tr>
							
							
							<td>
								<input class="inputbasic pseudo" type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
							</td>

						</tr>
						<tr>
							<!--<td>
								<label for="mail">Mail :</label>
							</td>-->
							<td>
								<input class="inputbasic mail" type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
							</td>
						</tr>
						<tr>
							<!--<td>
								<label for="mail2">Confirmation du mail :</label>
							</td>-->
							<td>
								<input class="inputbasic confirmer_mail" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
							</td>
						</tr>
						<tr>
							<!--<td align="right">
								<label for="mdp">Mot de passe :</label>
							</td>-->
							<td>
								<input class="inputbasic mdp" type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
							</td>
						</tr>
						<tr>
							<!--<td align="right">
								<label for="mdp2">Confirmation du mot de passe :</label>
							</td>-->
							<td>
								<input class="inputbasic confirmer_mdp" type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
							</td>
						</tr>
						<tr>
							<td></td>
							<td align="center">
								<br />
								<input type="submit" name="forminscription" value="Je m'inscris" />
							</td>
						</tr>
					</table>
				</form>
				<?php
				if(isset($erreur)) {
					echo '<font color="red">'.$erreur."</font>";
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
