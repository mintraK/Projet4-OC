<?php
session_start();
// Connexion à la base de données

  require "admin/BilletManager.php";
// try
// {
// 	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');

// }
// catch(Exception $e)
// {
//         die('Erreur : '.$e->getMessage());
// }

$billetManager = new BilletManager();

$billet = $billetManager->get($_GET['billet']);


// Récupération des commentaires
// $req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
// $req->execute(array($billet));

// if(isset($_POST['idCommentaire'])){
    
// $req2 = $bdd->prepare('UPDATE commentaires SET signaler =1 WHERE id = ?');
// $req2->execute(array($_POST['idCommentaire']));
// // $_POST['idCommentaire'] = NULL;
// // unset($_POST['idCommentaire']);
// }
// //pour ajouter un commentaire
// if(isset($_POST['texteCommentaire'])){

//     $auteur = $_SESSION['pseudo'];
//     $commentaire = $_POST['texteCommentaire'];
 
//     $req3 = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signaler, date_commentaire) VALUES (:id_billet, :auteur, :commentaire, :signaler, NOW())');
//     $req3->execute(array(
//         'id_billet' => $_GET['billet'],
//         'auteur' => $auteur,
//         'commentaire' => $commentaire,
//         'signaler' => 0));
        
//         header("Location:commentaires.php?billet=".$_GET['billet']);
    
//     }


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
        <div class = "page">
            <header>                
                <?php include("menu.php"); ?>
            </header>

            <p><a href="index.php">Retour à la liste des billets</a></p>
    
            <div class = "row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style = "margin:20px;"> 
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= htmlspecialchars($billet->titre());?> <em>le <?= $billet->dateCreation(); ?></em></h3>
                        </div>
                        <div class="panel-body"><p><?= nl2br($billet->contenu());?></p></div>
                    </div>        
                </div>
            </div>

            <div class = "row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                    <h2>Commentaires</h2>
                        <?php while ($donnees = $req->fetch()){ ?>
                            <p><strong>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <form method= "post" action = "commentaires.php?billet=<?=$_GET['billet'] ; ?>">
                                            <h3 class="panel-title"><?= htmlspecialchars($donnees['auteur']); ?></h3>
                                            <input type = "hidden" name = "idCommentaire" value =  "<?= $donnees['id']; ?>" />
                                            </strong> le <?= $donnees['date_commentaire_fr']; ?>  <button type = "submit" style="color:red;" ><abbr title="Signaler"><span class="glyphicon glyphicon-exclamation-sign"></span></abbr></a>
                                    </div></p> 
                                    <p><div class="panel-body"><?= nl2br(htmlspecialchars($donnees['commentaire'])); ?></div></p></div>
                        <?php } ?>
                </div>
            </div>
            
            <div class = "row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 "> </div>
                <div class="col-xs-6 col-sm-6 col-md-8  col-lg-8 "> 
                        <?php if(isset($_SESSION['pseudo'])){
                        ?>
                        <form class="form-group" method = "post" action = "commentaires.php?billet=<?php echo $_GET['billet'] ; ?>">
                            <fieldset>

                                <!-- Form Name -->
                                <legend class="text-center"> <h2>Ajouter un commentaires</h2></legend>


                                    <!-- Textarea -->
                                    <div class="form-horizontal form-group">
                                        <label class="col-md-4  control-label" for="textarea"><?php echo $_SESSION['pseudo'];?></label>
                                        <div class="col-md-6">                     
                                            <textarea class="form-control" id="textarea" name="texteCommentaire">Commentaire</textarea>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <div class="col-md-12 text-center" style = "margin-top:20px;margin-bottom:10px;">
                                            <button id="Envoyer" type = "submit" name="envoyerCommentaire" class="btn btn-primary">Button</button>
                                        </div>
                                    </div>

                            </fieldset>
                        </form>
                        <?php }?>
                    </div>
            </div>


            <section class = "pied">

                <?php include("footer.php"); ?>
            </section>
        </div>
    </body>
</html>

