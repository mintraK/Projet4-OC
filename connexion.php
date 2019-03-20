<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
        <!-- <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="style.css" rel="stylesheet" />  -->
    <style type="text/css">
     .page{
        overflow:hidden;
    }
      [class*="col"] { margin-bottom: 20px; }
      img { width: 100%; }
      body { margin-top: 10px; }
    </style>
    </head>
        
    <body>
    <div class="page">
    <header>                
    
    <!-- <div id="logo"><img src="images/logo.jpg" alt="Logo" /></div> -->
               <!-- Le menu -->  <?php include("menu.php"); ?>
    </header>

    <br/> <br/> <br/> 
    <form class="form-horizontal" method="post" action="connexion.php">
<fieldset>

<!-- Form Name -->
<legend  class="text-center">Se connecter au compte</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Pseudo</label>  
  <div class="col-md-4">
  <input id="textinput" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md">
  <span class="help-block">help</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
  <div class="col-md-4">
    <input id="passwordinput" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
    <span class="help-block">help</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Se connecter</button>
  </div>
</div>

</fieldset>
</form>
<?php  
  if(isset($_POST['pseudo']) && isset($_POST['pwd'])){
    $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    $pseudo = $_POST['pseudo'];

    //  Récupération de l'utilisateur et de son pass hashé
    $req = $conn->prepare('SELECT id, pwd FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo));
    $resultat = $req->fetch();
    
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pwd'], $resultat['pwd']);
    
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
           
            // echo 'Vous êtes connecté !';
            header("Location:index.php");
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }


  }
  else{

  }


?>
     <br/> <br/>
    <section class = "pied">

<?php include("footer.php"); ?>
</section>



</div>
</body>
</html>