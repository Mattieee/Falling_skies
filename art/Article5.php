<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');

if(isset($_POST['formconnexion'])) {
	$mailconnect = htmlspecialchars($_POST['pseudoconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect)) 
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1) {
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: ../profil.php?id=".$_SESSION['id']);
		} else {
			$erreur = "Mauvais Pseudo ou mot de passe !";
		}
	} 

	else 
	{
		$erreur = "Tous les champs doivent être complétés !";
	}
}
?>

<!DOCTYPE html>
<html lang="fr">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Falling skies</title>
	<meta name="author" content="Matthieu Royer">
	
	

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">


    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css" />
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="../css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="../css/owl.theme.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

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

    				<li><a href="../index-2.php" class="page-scroll">ACCUEIL</a></li>
    				<li><a href="../4-saisons.php" class="page-scroll">4 SAISONS</a></li>
    				<li><a href="../personnages.php" class="page-scroll">PERSONNAGES</a></li>
    				<li><a href="#tf-contact" class="page-scroll">CONTACT</a></li>
    			</ul>
    		</div><!-- /.navbar-collapse -->




    	</div><!-- /.container-fluid -->
    </nav>



    <!-- Home Page
    ==========================================-->
    <div id="tf-Article5" class="text-center img-responsive">

    	<div class="overlay">

    		<div class="content">

    			<h2 class="lead"><strong></strong></h2>    
    			<!--  ?  -->
    		</div>

    		<!--barres de connexion-->
    		<div align="center" class="box">

    			<h2>Connexion</h2>
    			<br>
    			
    			<form method="POST" action="" class="form_demo">
    				<input type="text" name="pseudoconnect" placeholder="pseudo" class="inputbasic user" />
    				
    				<input type="password" name="mdpconnect" placeholder="Mot de passe" class="inputbasic password"/>

    				<input type="submit" name="formconnexion" value="Se connecter !" />

    				<div style="font-size: 28px;">
    					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    				</div>

    				<div style="font-size: 28px;">
    					<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
    				</div>
    				
    			</form>
    			<a href="../Inscription.php" class="inscription">Inscription</a>

    			<?php
    			if(isset($erreur)) {
    				echo '<font color="red">'.$erreur."</font>";
    			}
    			?>
    		</div>

    	</div>


    </div>


    <!-- About Us Page
    ==========================================-->
    <div id="tf-about" class="img-responsive">

    	<div class="container" id="1">
    		<div class="section-title center">
               <a href="Article4.php#1" class="glyphicon glyphicon-chevron-left" style="font-size: 50px; left:15%; top:60px;" ></a>
               <a href="Article6.php#1" class="glyphicon glyphicon-chevron-right" style="font-size: 50px; left:110%; margin-left:-37.5%; top:58px;" ></a>
               <h2 class="text-center"><strong>Karen Nadler</strong></h2>
               <h3 class="text-center"><strong>(Jessy Schram)</strong></h3>
               <div class="line">  <!-- barre orange-->
                <br>
                <br>

            </div>

            <div class="jumbotron" style="height: 800px;">
                <img class="scarlett" src="../img/perso/profil/karen2.png" style="width: 25%; float: left;">
                <p>Karen est la petite amie de Hal Mason et fait partie de la 2de division. Avant l'attaque, elle était lycéenne. Elle est enlevée au cours de la première saison et implantée. Elle deviendra le porte-parole des Espheni puis, à la mort du commandant Espheni de la région, elle prendra le commandement des troupes Espheni contre les habitants de Charleston, totalement dévouée à ses ravisseurs.</p>
                <img class="scarlett" src="../img/perso/profil/karen.jpg" style="width: 28%; margin-left:70%; float: left;">



            </div>
        </div>

    </div>


</div>

</div>


</div>









<nav id="footer">
	<div class="container">
		<div class="text-center fnav ">
			<p>&copy; 2017 Matthieu Royer - Tous droits réservés 
			</p>
		</div>
	</div>
</nav>




<script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/SmoothScroll.js"></script>
<script type="text/javascript" src="../js/jquery.isotope.js"></script>

<script src="../js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="../js/main.js"></script>
</body>


</html>