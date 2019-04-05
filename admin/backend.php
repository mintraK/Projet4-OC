<?php

if($_SESSION['pseudo']== "admin"){
    // Chargement des classes
    require_once('model/PostManager.php');
    require_once('model/CommentManager.php');


    function  dashBord(){
        
        $postManager = new PostManager(); // Création d'un objet
        $posts = $postManager->getListPosts(); // Appel d'une fonction de cet objet
        require('view/indexAdminView.php');

    }
    function editArticle($postId){

        $postManager = new PostManager();
        $post = $postManager->getPost($postId);  
        require('view/editArticleView.php');
    
        if(isset($_POST['titre'])){
            $post->setTitre($_POST['titre']);
            $post->setContenu($_POST['contenu']);
            $postManager->editArticle($post);
            header("Location:index.php");
        }

    }
    function addArticle(){
        require('model/modelAddArticle.php');
        require('view/addArticleView.php'); 
    }
    function reportComment(){
        //require('model/modelReportComment.php');
        $commentManager = new CommentManager();
        $comment = $commentManager->reportComment();  
        require('view/reportCommentView.php'); 
    }
    function deleteComment(){
       
        if(isset($_GET['commentId'])){
            $deleteComment = new CommentManager();
            $deleteComment->deleteComment($_GET['commentId']);
            header("Location:index.php?action=reportComment");
        }
        else{
            throw new Exception('Pas de IdCommentaire !');
        }      
    }
    function  ignoreComment(){
        if(isset($_GET['commentId'])){
            $commentManager = new CommentManager();
            $commentManager->ignoreComment($_GET['commentId']);
            header("Location:index.php?action=reportComment");
        }
        else{
            throw new Exception('Pas de IdCommentaire !');
        } 
    }
}
else 
{

    header("Location:../index.php");
}