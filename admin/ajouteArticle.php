<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

require "BilletManager.php";

if(isset($_POST['titre'])){

  
  $titre =  $_POST['titre'];
  $contenu =   $_POST['contenu'];


  // Ajout contenu avec Imge
//ajouter une photo
if (isset($_FILES['mon_fichier']) && $_FILES['mon_fichier']['error'] === UPLOAD_ERR_OK) {
  // get details of the uploaded file
  $fileTmpPath = $_FILES['mon_fichier']['tmp_name'];
  $fileName = $_FILES['mon_fichier']['name'];
  $fileSize = $_FILES['mon_fichier']['size'];
  $fileType = $_FILES['mon_fichier']['type'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));



  $ExtensionsAutorise = array('jpg', 'png');
  if (in_array($fileExtension, $ExtensionsAutorise)) {
      $newFileName = $fileName;
      $uploadFileDir = '../images/';
      $dest_path = $uploadFileDir . $newFileName;
      
      if(move_uploaded_file($fileTmpPath, $dest_path))
      {
        // Metre ds sql
       
        $billetManager = new BilletManager();
        $billet = new Billet([
          'titre' => $titre,
          'photo' => 'images/'.$newFileName,
          'contenu' => $contenu
        ]);
        $billetManager->add($billet);
        
    
      }
    } 
  }
else 
  {
    // Ajout Contenue Sans imgae 
    $billetManager = new BilletManager();
    $billet = new Billet([
      'titre' => $titre,
      'contenu' => $contenu
    ]);
    $billetManager->add($billet);

  }
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
       
        <section class = "detail">
          <div class="row">
            <?php include("menuverticale.php");
            echo $_POST['test']; ?>
 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
      
                <h1>Ajouter un billet</h1>
                <form method="post" action="AjouteArticle.php" enctype="multipart/form-data">
                  <input type="text" name = "titre" placeholder ="Saisisez le titre"/><br />

                  <label for="mon_fichier">Photo (tous formats | max. 1 Mo) :</label><br />
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  <input type="file"  name="mon_fichier" id="mon_fichier" /><br />
                  <textarea id="mytextarea" name="contenu"></textarea>
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
