<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

require "admin/BilletManager.php";
$billetManager = new BilletManager();

$billets = $billetManager->getList();  

           
            
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="icon" type="image/jpg" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                <!-- Le menu --> 
                <?php include("menu.php"); ?>
            </header>
    
    <section id="panneau">
    <img src="image.php" /></section>
    
        <h2>Tous les billets du blog :</h2>
   
 
            <?php
            
            while ($donnees = $billets->fetch())
            {
            ?>
            <div class="row">
                <div class="news">
                    
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><img src= "<?= $donnees['photo'] ?>" />
                    </div>
                    
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $donnees['titre']; ?></h3>
                                <em>le <?= $donnees['date_creation_fr']; ?></em>
                            </div>
                            <div class="panel-body"><p>
                                <?= substr($donnees['contenu'],0,500);?>
                                <br />
                                <em><a href="commentaires.php?billet=<?= $donnees['id']; ?>">Lire la suite</a></em>
                                </p>
                            </div>
                        </div>
                    </div>
            
 
                </div>
            </div><!--  fin div row -->
            <?php
            } // Fin de la boucle des billets
            $req->closeCursor();
            ?>
            <br/>

            <section class = "pied">

            <?php include("footer.php"); ?>
            </section>
        </div>
    </body>
</html>