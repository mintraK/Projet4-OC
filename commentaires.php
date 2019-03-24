<?php
session_start();
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link rel="icon" type="image/jpg" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <header>                
    
    <!-- <div id="logo"><img src="images/logo.jpg" alt="Logo" /></div> -->
               <!-- Le menu -->  <?php include("menu.php"); ?>
    </header>

        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 


<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
while ($donnees = $req->fetch())
{
?>
<p><strong><div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">
<?php echo htmlspecialchars($donnees['auteur']); ?></h3>
 </strong> le <?php echo $donnees['date_commentaire_fr']; ?>  <a href="#" style="color:red;" ><abbr title="Signaler"><span class="glyphicon glyphicon-exclamation-sign"></span></abbr></a></div></p> 
<p><div class="panel-body"><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></div></p></div>
<?php

} // Fin de la boucle des commentaires

?>
    <section class = "pied">

<?php include("footer.php"); ?>
</section>
</body>
</html>

