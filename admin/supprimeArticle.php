<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
try
 {
     $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
 }
 catch(Exception $e)
 {
         die('Erreur : '.$e->getMessage());
 }
 
 // On récupère les 5 derniers billets
 $req = $bdd->query('SELECT id, titre,contenu  FROM billets ');
 




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
        <!-- </header> se trove dans menuAdmin -->
   
  <br/>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <table class="table table-bordered table-striped table-condensed">
    <caption>
            <h4>Les articles</h4>
    </caption>
    <thead>
    <tr>
      <th>titres</th>
      <th>contenus</th>
      <th>supprimer</th>
    </tr>
  </thead>
    <tbody>
    
    
    <?php while ($donnees = $req->fetch())
 {  echo "<tr>";
     echo "<td>";
    echo nl2br(htmlspecialchars($donnees['titre']));
    echo "</td>";
    echo "<td>";
    echo nl2br(htmlspecialchars($donnees['contenu']));
    echo "</td>";
    echo "<td>";
    ?><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a> <?php
    echo "</td>";
    echo "</tr>";
 }
  ?>
  </tbody></table>
  </div>
    </div><!--div de row dans menuAdmin -->
    

<section class = "pied">

<?php include("footer.php"); ?>
</section>
</div>
</body>
<?php }
else{
  header("Location:../index.php");
} ?>
</html>
