<?php
session_start();

if(isset($_POST['titre'])){
  if(!empty($_POST['titre'])){
      $titre =  $_POST['titre'];
    $contenu =   $_POST['contenu'];

    // Ajout contenu avec Image
    //ajouter une photo
    if (isset($_FILES['mon_fichier']) && $_FILES['mon_fichier']['error'] === UPLOAD_ERR_OK) {

      $fileTmpPath = $_FILES['mon_fichier']['tmp_name'];
      $fileName = $_FILES['mon_fichier']['name'];
      $fileSize = $_FILES['mon_fichier']['size'];
      $fileType = $_FILES['mon_fichier']['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      $ExtensionsAutorise = array('jpg', 'png');
      if (in_array($fileExtension, $ExtensionsAutorise)) {
          $newFileName = $fileName;
          $uploadFileDir = '../public/images/';
          $dest_path = $uploadFileDir . $newFileName;
          
          if(move_uploaded_file($fileTmpPath, $dest_path))
          {
            $postManager = new PostManager();
            $post = new Billet([
              'titre' => $titre,
              'photo' => 'public/images/'.$newFileName,
              'contenu' => $contenu
            ]);
            $isadd = $postManager->addArticle($post);
            if($isadd = 0)
            {
              throw new Exception("Impossible d'ajouter un articles");
            }
        
          }
        } 
      }
    else 
      { 
        // Ajout Contenu Sans imgae 
        $postManager = new PostManager();
        $post = new Billet([
          'titre' => $titre,
          'contenu' => $contenu
        ]);
        $isadd =  $postManager->addArticle($post);
        if($isadd == 0)
        {
          throw new Exception("Impossible d'ajouter un articles");
        }

      }
      header("Location:index.php");
  }
  else{
      throw new Exception("Pas de titre!");
  }
    
}

