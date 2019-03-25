<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
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
            <br/> 
            <section class = "detail" style="margin-top:50px;">
                <div class="row">
                    <?php include("menuverticale.php"); ?>
        
        
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
                    
                        <p>Tableau de bord</p>
                
                    </div>
                </div>
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