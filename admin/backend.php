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
           $isedit = $postManager->editArticle($post);
           
            if ($isedit == 1)
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
    function reportComment(){
        //require('model/modelReportComment.php');
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