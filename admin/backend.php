<?php

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
    //header("Location:modifierArticle.php");

}

