<?php
session_start();
require('backend.php');
try {
// ADMIN
   if($_SESSION['pseudo'] == "admin"){
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'editArticle') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    editArticle($_GET['id']);
                }
                 
            }
            else if ($_GET['action'] == 'addArticle') {
                    addArticle();
            }  
            else if ($_GET['action'] == 'reportComment') {
                    reportComment();
            }
            else if ($_GET['action'] == 'deleteComment') {
                    deleteComment();
            }
            else if ($_GET['action'] == 'ignoreComment') {
                    ignoreComment();
        }      
        }
        else {
            dashBord();  
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

  
            