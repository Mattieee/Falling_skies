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
   header("Location: profil.php?id=".$_SESSION['id']);
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
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />


  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">


    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">
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

            <li><a href="index-2.php" class="page-scroll">ACCUEIL</a></li>
            <li><a href="#tf-saison" class="page-scroll">4 SAISONS</a></li>
            <li><a href="personnages.php" class="page-scroll">PERSONNAGES</a></li>
            <li><a href="#tf-contact" class="page-scroll">CONTACT</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>



    <!-- Home Page
    ==========================================-->
    <div id="tf-saison" class="text-center img-responsive">

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
          <a href="Inscription.php" class="inscription">Inscription</a>

          <?php
          if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
          }
          ?>
        </div>
      </div>
    </div>





    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center img-responsive">
      <div class="container">

        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <div class="section-title center">
              <h2><strong>Contact</strong></h2>
              <div class="line">
                <hr>
              </div>
              <div class="clearfix"></div>
              <p><em>Un projet en tête, une idée, une question ? Envoyez moi un email ici !</em></p>            
            </div>


            <form action="http://Quentingionneau.com/send_form.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input required type="name" name="name" class="form-control" id="inputname" placeholder="Nom et Prénom*" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input required type="email" name="email" class="form-control" id="inputemail" placeholder="Adresse e-mail*" value="">
                  </div>
                </div>

              </div>
              <div class="form-group">
                <textarea style="resize: none;" required name="message" class="form-control" id="inputmessage" placeholder="Votre message*" rows="5" value=""></textarea>
              </div>
              <div class="checkbox hidden-xs hidden-sm hidden-md hidden-lg">
                <label for="checkspam">
                  <input type="checkbox" name="antispam" id="checkspam">Ne pas cliquer, anti spam !
                </label>
              </div>
              <button type='submit' class="btn tf-btn btn-default">Envoyer</button>
            </form>

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
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <script src="js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>
  </body>


  </html>














    <!-- Team Page
    ==========================================-->
    <div id="tf-team" class="text-center img-responsive">
    	<div class="overlay">
    		<div class="container">
    			<div class="section-title center">
    				<h2><strong>Histoire de FALLING SKIES </strong></h2>
    				<div class="line">
    					<hr>
    				</div>
    				<div class="clearfix"></div>
    				<p><em>Falling Skies est une série américaine de science-fiction créée par Robert Rodat et produite par Steven Spielberg. Elle compte 52 épisodes répartis en cinq saisons diffusées entre 2011 et 2015 aux États-Unis sur la chaîne du câble TNT.</em> </p>

    				<p><em>Quelques mois après que la Terre ait subi une invasion extraterrestre de grande ampleur, un système de résistance qui fait tout son possible pour nuire aux envahisseurs et assurer la survie de l'espèce humaine est mis en place. En son sein se trouve Tom Mason, un ancien professeur d'histoire de l'université de Boston. Tom qui est bientôt chargé de codiriger un groupe de résistants avec le capitaine Weaver est à la recherche de son fils, Ben, qui a disparu depuis l'attaque éclair des extraterrestres... </em></p>
    			</div>
    			<div class="space"></div>

    			<div id="tf-network">

    				<div class="social-network social-circle service text-center">

    					<div class="service">

    						<div class="row">


    						</div>

    					</div>
    				</div> 
    			</div>
    		</div>
    	</div>
    </div>


