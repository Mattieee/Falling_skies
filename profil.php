<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
	?>
  
}



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
        <script type="text/javascript" src="js/modernizr.custom.js"></script>


    </head>
    <body>
    <!-- Navigation
        ==========================================-->
        <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top img-responsive">  <!-- barre de menu-->
           <div class="container">




              <div class="navbar-header"> <!--barre de menu pour mobile-->
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand thinking" href="../index-2.html"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav navbar-right">

                <li><a href="#tf-home" class="page-scroll">ACCUEIL</a></li>
                <li><a href="4-saisons" class="page-scroll">4 SAISONS</a></li>
                <li><a href="personnages-1.php" class="page-scroll">PERSONNAGES</a></li>
                <li><a href="#tf-contact" class="page-scroll">CONTACT</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



    <!-- Home Page
        ==========================================-->
        <div id="tf-home" class="text-center img-responsive">

           <p>§</p>

           <div class="overlay">

              <div class="content">

                 <h2 class="lead"><strong></strong></h2>                 <!--  ?  -->
             </div>

             <div align="center" class="box2">
                <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
                <br /><br />
                Pseudo = <?php echo $userinfo['pseudo']; ?>
                <br />
                Mail = <?php echo $userinfo['mail']; ?>
                <br />
                <?php
                if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
                    ?>
                    <br />
                    <a href="editionprofil.php">Editer mon profil</a>
                    <a href="index-2">Se déconnecter</a>
                    <?php
                }
                ?>
            </div>


        </div>


    </div>

    <!-- About Us Page
        ==========================================-->
        <div id="tf-about" class="img-responsive">
           <div class="container">
              <div class="section-title center">
                 <h2 class="text-center"><strong>Nouveauté</strong></h2>
                 <div class="line">
                    <hr>
                </div>
            </div>

        </div>
    </div>

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


    <!-- image Section
        ==========================================-->
        <div id="tf-works">
           <div class="container"> <!-- Container -->
              <div class="section-title text-center center">
                 <h2><strong></strong></h2>
                 <div class="line">
                    <hr>
                </div>

            </div>
            <div class="space"></div>



            <div id="lightbox" class="row">

             <div class="col-sm-6 col-md-3 col-lg-3 web">
                <div class="portfolio-item">
                   <div class="hover-bg">
                      <a data-toggle="modal" data-target="#maModal1">
                         <div class="hover-text">
                            <div class="clearfix"></div>
                            <i class="fa fa-plus"></i>
                        </div>
                        <img src="img/portfolio/portfolio-frozend.jpg" class="img-responsive" alt="...">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Testimonials Section
        ==========================================-->
        <div id="tf-testimonials" class="text-center">
           <div class="overlay">
              <div class="container">
                 <div class="section-title center">
                    <h2><strong>AVIS SUR LE SITE :</strong></h2>
                    <div class="line">
                       <hr>
                   </div>
               </div>
               <div class="row">
                <div class="col-md-8 col-md-offset-2">
                   <div id="testimonial" class="owl-carousel owl-theme">
                      <div class="item">
                         <i class="fa fa-quote-left" aria-hidden="true"></i>
                         <h5>"Excellent travail"</h5><p>Avis reçu du bg Mattié</p>
                         <p><strong>Matthieu Royer</strong>, Développeur Web.</p>
                     </div>

                     <div class="item">
                         <i class="fa fa-quote-left" aria-hidden="true"></i>
                         <h5>""</h5><p>Avis reçu durant l'année 2017</p>
                         <p><strong>?</strong>,</p>
                     </div>

                 </div>
             </div>
         </div>
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


<script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.js"></script> <!--menu-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script> <!-- smooth scroll -->

<script src="js/owl.carousel.js"></script>

    <!-- Javascripts
        ================================================== -->
        <script type="text/javascript" src="js/main.js"></script> <!-- menu qui se met en orange qd on clique dessus-->

    </body>


    </html>