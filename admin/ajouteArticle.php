<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
$conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
if(isset($_POST['titre'])){

  $titre =  $_POST['titre'];
$contenu =   $_POST['contenu'];

$req = $conn->prepare('INSERT INTO billets( titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
$req->execute(array(
    'titre' => $titre,
    'contenu' => $contenu));
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=v0f7pw8xvnajx4xwsnddsqks8qc4bshr9avi70ilks89lvf7"></script>
<script>
  tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  language_url : '../langs/fr_FR.js'  // site absolute URL
});
</script>
  <script>tinymce.init({ selector:'textarea' });</script>
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
#editeur, #resultat {
    width: 500px; 
    height: 200px; 
    border: 1px solid black;
    padding: 5px; 
    overflow: auto; 
}
    </style>
     </head>
    <body>
      <div class="page">
        <header>  
          <?php include("menuAdmin.php"); ?>
        </header>
        <br/> 
        <section class = "detail" style="margin-top:50px;">
          <div class="row">
            <?php include("menuverticale.php");
            echo $_POST['test']; ?>
 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
      
                <h1>Ajouter un billet</h1>
                <form method="post">
                  <input type="text" name = "titre" placeholder ="Saisisez le titre"/>
                  <textarea id="mytextarea" name="contenu"></textarea>
                  <button id="button" type="submit" name="button">publier</button>
                </form>
             

            </div> <!--div de col -->
          </div><!--div de row -->
        </section>


        
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
