<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');
try {
// ADMIN
   if($_SESSION['pseudo'] == "admin"){
        if ($_GET['action'] == 'dashBord'){          
                dashBord(); 
        }  
   

   }
   

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } 
        elseif ($_GET['action'] == 'logout') {
            if(isset($_SESSION['pseudo'])){
                logoutUser();
            }

        }
        elseif ($_GET['action'] == 'login') {
            if(!(isset($_SESSION['pseudo']))){
                loginUser();
            }

        } 
        elseif ($_GET['action'] == 'register') {
                register();

        }
    }
    else {
       
        listPost();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

