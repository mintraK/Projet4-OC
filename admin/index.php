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

        }
        else {
            dashBord();  
        }
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

  
            