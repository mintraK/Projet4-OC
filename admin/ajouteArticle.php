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
            <?php include("menuverticale.php"); ?>
 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
      
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
      
            </div>
          </div><!--div de row -->
        </section>


        <div class="row"> 
          <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-md-offset-3"> 
            <form  method="post" action="ajouteArticle.php">
              <input type="button" value="G" style="font-weight: bold;" onclick="commande('bold');" />
              <input type="button" value="I" style="font-style: italic;" onclick="commande('italic');" />
              <input type="button" value="S" style="text-decoration: underline;" onclick="commande('underline');" />
              <input type="button" value="Lien" onclick="commande('createLink');" />
              <input type="button" value="Image" onclick="commande('insertImage');" />
              <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
                <option value="">Titre</option>
                <option value="h1">Titre 1</option>
                <option value="h2">Titre 2</option>
                <option value="h3">Titre 3</option>
                <option value="h4">Titre 4</option>
                <option value="h5">Titre 5</option>
                <option value="h6">Titre 6</option>
              </select>
              <div id="editeur" contentEditable></div>
              <input type="button" onclick="resultat();" value="Obtenir le HTML" />
              <br />
              <textarea id="resultat" name="resultat"></textarea>
              <button id="button" name="button" class="btn btn-primary">publier</button>
                    
            </form>
      </div>
          </div>


        <section class = "pied">

        <?php include("../footer.php"); ?>
        </section>
      </div>

      <script>
          function commande(nom, argument) {
              
              if (typeof argument === 'undefined') {
                argument = '';
              }
              switch (nom) {
                case "createLink":
                  argument = prompt("Quelle est l'adresse du lien ?");
                break;
                case "insertImage":
                  argument = prompt("Quelle est l'adresse de l'image ?");
                break;
            }
          // Exécuter la commande
            document.execCommand(nom, false, argument);
          }

          function resultat() {
            document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
          }

      </script>

    </body>
    <?php }
    else{
      header("Location:../index.php");
    } ?>
</html>
