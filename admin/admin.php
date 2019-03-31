<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
 require "BilletManager.php";
          
$billetManager = new BilletManager();

$billets = $billetManager->getList();  



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
            <?php include("menuAdmin.php"); ?>

            </header>
           
            <section class = "detail">
                <div class="row">
                    <?php include("menuverticale.php"); ?>
        
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                 
                    <table class="table table-bordered table-striped table-condensed">
                  <caption>
                      <h4>Les articles</h4>
                  </caption>
                  <thead>
                    <tr>
                      <th>Titres</th>
                      <th>Contenus</th>
                      <th>Lien</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while ($donnees = $billets->fetch()){ ?>
                     
                        <tr>
                            <td><?= htmlspecialchars($donnees['titre']); ?></td>
                            <td><?= nl2br($donnees['contenu'])?></td>
                            <td><a href="../commentaires.php?billet=<?= $donnees['id'] ?>">Lien</a></td>
                            <td><a href="modifierArticle.php?billet=<?= $donnees['id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil" style="color: green;"></span></a> </td>
                            <td><a href="supprime.php?billet=<?= $donnees['id'] ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a> </td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
               
                    </div>
                </div><!--div de row-->
           
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


            
            