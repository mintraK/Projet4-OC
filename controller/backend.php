<?php

// Chargement des classes
 require_once('model/frontend/PostManager.php');
 require_once('model/frontend/CommentManager.php');
function reportComment(){

    if(isset($_POST['idCommentaire'])){
        $CommentManager = new CommentManager();
        $CommentManager->addReportComment($_POST['idCommentaire']);
       
       
        header("Location:index.php?action=post&id=".$_GET['idPost']);
    //header("Location:index.php");
    }
}
function logoutUser()
{
    $_SESSION = array();
    session_destroy();
    // Suppression des cookies de connexion automatique
    setcookie('pseudo', '');
    setcookie('pass_hache', '');
    header("Location:index.php");
  
}
function loginUser(){
    require('model/backend/modelConnection.php');
    require('view/frontend/loginView.php');
  
}
function  register(){

     require('model/backend/modelRegister.php');
     require('view/frontend/registerView.php');

}
function  dashBord(){
    // require('admin/admin.php');
     header("Location: admin");
    // require('model/backend/modelDashbord.php');
    // require('view/frontend/dahBordView.php');

}


