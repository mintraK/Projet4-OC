<?php
// On démarre la session AVANT d'écrire du code HTML
 session_start();
 $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
// if(isset($_POST['titre'])){


$req = $conn->prepare('SELECT titre, contenu,id  FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();



if(isset($_POST['titre'])){
   
    $titre =  $_POST['titre'];
$contenu =   $_POST['contenu'];

    $req = $conn->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation= NOW() WHERE id = :id ');
$req->execute(array(
    'titre' => $titre,
    'contenu' => $contenu,
    'id' => $_GET['billet']));
    header("Location:admin.php");
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
        <script src='tinymce/js/tinymce/tinymce.min.js' type='text/javascript'></script>
        <script>
        tinymce.init({
            selector: 'textarea',
            themes: 'modern',
            height: 200,
            language: 'fr_FR' ,
            menubar:false,
            plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | bold italic underline| alignleft aligncenter alignright alignjustify |cut copy paste|image | removeformat | help',
        
        });
        </script>
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
            <?php include("menuverticale.php");
             ?>
 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
      
                <h1>Modifier le billet</h1>
                <form method="post" action="modifierArticle.php?billet=<?php echo $donnees['id']; ?>" >
                  <input type="text" name = "titre" placeholder ="Saisisez le titre" value = "<?php echo $donnees['titre']; ?>"/><br />
               
                  <textarea id="mytextarea" name="contenu" ><?php echo $donnees['contenu']; ?></textarea>
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