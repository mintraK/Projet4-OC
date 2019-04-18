<?php

if($_SESSION['pseudo']== "admin"){
  
    require_once('model/PostManager.php');
    require_once('model/CommentManager.php');

    function  dashBord(){
        
        $postManager = new PostManager(); 
        $posts = $postManager->getListPosts(); 
        require('view/indexAdminView.php');
    }
    function editArticle($postId){

        $postManager = new PostManager();
        $post = $postManager->getPost($postId);  
        require('view/editArticleView.php');
        if($_GET['id'] == $post->id()){
            if(isset($_POST['titre'])){
                $post->setTitre(strip_tags($_POST['titre']));
                $post->setContenu($_POST['contenu']);
                $isEdit = $postManager->editArticle($post);
            
                if ($isEdit == 1)
                {
                    header("Location:index.php");
                }
                else 
                {
                    throw new Exception('Impossible de éditer le billet!');
                }
            }
        }
        else 
        {
            header("Location:index.php");
        }
       
    }
    function addArticle(){
        if(isset($_POST['titre'])){
            if(!empty($_POST['titre'])){
              $titre =  strip_tags($_POST['titre']);
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
                  
        require('view/addArticleView.php'); 
    }
    function deleteArticle(){
        if(isset($_GET['id'])){
            $postManager = new PostManager();
            $isDelete = $postManager->deleteArticle($_GET['id']);
            if($isDelete==1){
                header("Location:index.php");
            }
            else{
                throw new Exception('Impossible de supprimer le billet!');
            }
        }
        else{
            throw new Exception('Aucun numéro de billet donné !');
        }
       
    }
    function reportComment(){
        $commentManager = new CommentManager();
        $comment = $commentManager->reportComment();  
        require('view/reportCommentView.php'); 
    }
    function deleteComment(){
       
        if(isset($_GET['commentId'])){
            $deleteComment = new CommentManager();
            $isDelete = $deleteComment->deleteComment($_GET['commentId']);
           
            if($isDelete==1){
                 header("Location:index.php?action=reportComment");
            }
            else{
                 throw new Exception('Impossible de supprimer !');
            }
        }      
    }
    function  ignoreComment(){
        if(isset($_GET['commentId'])){
            $commentManager = new CommentManager();
            $isIgnore = $commentManager->ignoreComment($_GET['commentId']);
            if($isIgnore==1){
                header("Location:index.php?action=reportComment");
            }
            else{
                throw new Exception('Pas de IdCommentaire !');
            } 
        } 
    }
}
else 
{
    header("Location:../index.php");
}