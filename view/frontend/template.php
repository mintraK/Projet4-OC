<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
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
            #panneau{
                margin-top:-20px;
            }
            .contenu-page{
                margin-left:4%;
                margin-rigth:4%;

            }
            [class*="col"] { margin-bottom: 20px; }
            img { width: 100%; }
            /* body { margin-top: 10px; } */
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
        <?= $content ?>
       
    </body>
</html>

