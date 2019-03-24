<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
$conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
if(isset($_POST['titre'])){

  $titre =  $_POST['titre'];
$textes =   $_POST['textes'];

$req = $conn->prepare('INSERT INTO billets( titre, contenu, date_creation) VALUES(:titre, :textes, NOW())');
$req->execute(array(
    'titre' => $titre,
    'textes' => $textes));
}



if($_SESSION['pseudo']== "admin"){
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="icon" type="image/jpg" href="../images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
        <!-- <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet">  -->
        <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
	<!-- <link href="style.css" rel="stylesheet" />  -->
    <style type="text/css">
    .page{
        overflow:hidden;
    }
      [class*="col"] { margin-bottom: 20px; }
      img { width: 100%; }
       body { margin-top: 10px; }
       .fa {
  
            
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
}
 /* .fa-facebook {
 color:white;
  color: white;

}   */

    </style>
     </head>


    <body>
        <div class="page">
       
        <header>  
        <?php include("menuAdmin.php"); ?>

    <!-- </header>se trove dans menuAdmin  -->
  
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
        <section  id = "detail">
       

        <form class="form-horizontal" method="post" action="ajouteArticle.php">
<fieldset>

<!-- Form Name -->
<legend>Ajouter un article</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titre</label>  
  <div class="col-md-4">
  <input id="textinput" name="titre" type="text" placeholder="Titre" class="form-control input-md">
  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Text</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="textes"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">publier</button>
  </div>
</div>

</fieldset>
</form>




        </section>
    </div>
    </div><!--div de row dans menuAdmin -->

<section class = "pied">

<?php include("../footer.php"); ?>
</section>
</div>
</body>
<?php }
else{
  header("Location:../index.php");
} ?>
</html>
