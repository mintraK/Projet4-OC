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
    
        if(isset($_POST['titre'])){
            $post->setTitre($_POST['titre']);
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
    function addArticle(){
        require('model/modelAddArticle.php');
        require('view/addArticleView.php'); 
    }
    function deleteArticle(){
        if(isset($_GET['id'])){
            $postManager = new PostManager();
            $isDelete = $postManager->deleteArticle($_GET['id']);
            $commentManager = new CommentManager();
            $isDelete2 = $commentManager->deleteCommentOfArticle($_GET['id']);
                if($isDelete==1 && $isDelete2==1){
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