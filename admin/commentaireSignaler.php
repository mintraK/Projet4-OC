<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

  require "../CommentaireManager.php";

 
 // On récupère les commentaires signalés
 //$req = $bdd->query('SELECT id, auteur, commentaire  FROM commentaires WHERE signaler = 1 ');
 
 $commentaire = new CommentaireManager();
 $commentaireSignaler= $commentaire->getSignaler();




if($_SESSION['pseudo']== "admin"){

  //supprimer les commentaires signaler
  if(isset($_GET['comsupprimer'])){
$supprimerCom = new CommentaireManager();
$supprimerCom->supprimerCommentaire($_GET['comsupprimer']);
header("Location:commentaireSignaler.php");
  }
  if(isset($_GET['comignorer'])){
    $commentaireignorer = new CommentaireManager();
    $commentaireignorer->Commentaireignorer($_GET['comignorer']);
    header("Location:commentaireSignaler.php");
      }
    
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
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

          </header>
         
          <section class = "detail" >
            <div class="row">
                <?php include("menuverticale.php"); ?>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                  <table class="table table-bordered table-striped table-condensed">
                    <caption>
                            <h4>Tous les commentaires</h4>
                    </caption>
                    <thead>
                      <tr>
                        <th>titres</th>
                        <th>contenus</th>
                        <th>supprimer</th>
                        <th>ignorer</th>
                      </tr>
                    </thead>
                    <tbody>                
                      <?php while ($donnees = $commentaireSignaler->fetch())
                        {  echo "<tr>";
                            echo "<td>";
                            echo nl2br(htmlspecialchars($donnees['auteur']));
                            echo "</td>";
                            echo "<td>";
                            echo nl2br(htmlspecialchars($donnees['commentaire']));
                            echo "</td>";
                            echo "<td>";
                      ?><form method= "post" action = "commentaireSignaler.php?comsupprimer=<?=$donnees['id'];?>">
                         <button type = "submit" ><span class="glyphicon glyphicon-trash" style="color: red;"></span>
                        <!-- <a href="supprimerCommentaire.php?commentaire=<?php //echo $donnees['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a> -->
                        </form>
                      <?php
                            echo "</td>";
                            echo "<td>";
                            ?> 
                            <form method= "post" action = "commentaireSignaler.php?comignorer=<?=$donnees['id'];?>">
                            <button type = "submit" ><span class="glyphicon glyphicon-ok" style="color: green;"></span>
                            <!-- <a href="ignorerCommentaire.php?commentaire=<?php echo $donnees['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-ok" style="color: green;"></span></a> -->
                            </form>
                      <?php 
                            echo "</td>";
                            echo "</tr>";
                        }
                      ?>
                    </tbody>
                  </table>

              </div>
            </div> <!--div de row -->
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
