<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root', '');
$requete = $bdd->query('SELECT * FROM membres');





$requete->closeCursor();



if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
 if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
  $confirme = (int) $_GET['confirme'];
  $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
  $req->execute(array($confirme));
}
if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
  $supprime = (int) $_GET['supprime'];
  $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
  $req->execute(array($supprime));
}
} elseif(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {
 if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
  $approuve = (int) $_GET['approuve'];
  $req = $bdd->prepare('UPDATE commentaires SET approuve = 1 WHERE id = ?');
  $req->execute(array($approuve));
}
if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
  $supprime = (int) $_GET['supprime'];
  $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
  $req->execute(array($supprime));
}
}

$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
$commentaires = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 0,5');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espace admin | Tableau de bord</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">AdminStrap</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Dashboard</a></li>
          <li><a href="pages.php">Pages</a></li>
          <li><a href="posts.php">posts</a></li>
          <li><a href="users.php">users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">welcome, Matt</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Espace admin <small>Fallingskies.com</small></h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Create Content
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
              <li><a type="" href="#">Add Post</a></li>
              <li><a type="" href="#">Add User</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="index.php" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="pages.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Pages <span class="badge">12</span></a>
            <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts</span>  Pages <span class="badge">33</span></a>
            <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</span>  Pages <span class="badge">203</span></a>
          </div>

          <div class="well">
            <h4>Disk Spae Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                40%
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Site Web Overview</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                    

                  </h2>
                  <h4>Users</h4>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                  <h4>Pages</h4>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                  <h4>posts</h4>
                </div> 
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                  <h4>visitors</h4>
                </div> 
              </div>
            </div>
          </div>


          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Latest Users</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Pseudo</th>
                  <th>Email</th>
                  <th>Joined</th>
                </tr>
                <tr>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==1){
                        echo $data['pseudo'];
                      }
                    }
                    ?>
                  </td>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==1){
                        echo $data['mail'];
                      }
                    }
                    ?>
                  </td>
                  <td>Mai 09, 2017</td>
                </tr>
                <tr>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==2){
                        echo $data['pseudo'];
                      }
                    }
                    ?>

                  </td>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==2){
                        echo $data['mail'];
                      }
                    }
                    ?>
                  </td>
                  <td>Mai 09, 2017</td>
                </tr>
                <tr>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==3){
                        echo $data['pseudo'];
                      }
                    }
                    ?>

                  </td>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==3){
                        echo $data['mail'];
                      }
                    }
                    ?>
                  </td>
                  <td>Mai 09, 2017</td>
                </tr>
                <tr>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==4){
                        echo $data['pseudo'];
                      }
                    }
                    ?>

                  </td>
                  <td>
                    <?php 
                    $requete = $bdd->query('SELECT * FROM membres');
                    while($data = $requete->fetch()){
                      if ($data['id']==4){
                        echo $data['mail'];
                      }
                    }
                    ?>
                  </td>
                  <td>Mai 09, 2017</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<footer id="footer">
  <p>Copyright by Matthieu Royer, &copy;2017</p>
</footer>
<!-- Modals-->

<!--Add Page-->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Page</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Page Title</label>
            <input type="text" class="form-control" placeholder="Page Title">
          </div>
          <div class="form-group">
            <label>Page Body </label>
            <textarea name="editor1" class="form-control" placeholder="Page Title"></textarea>
          </div>
          <div class="checkbox"> 
            <label>
              <input type="checkbox"> Published
            </label>
          </div>
          <div class="form-group">
            <label>Meta Tags</label>
            <input type="text" class="form-control" placeholder="Add Some Tags...">
          </div>
          <div class="form-group">
            <label>Meta Description</label>
            <input type="text" class="form-control" placeholder="Add Meta Description...">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  CKEDITOR.replace( 'editor1' );
</script>


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>