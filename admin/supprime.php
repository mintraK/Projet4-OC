<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

require "BilletManager.php";


if($_SESSION['pseudo']== "admin"){

    $billetManager = new BilletManager();
    $billetManager->supprimer($_GET['billet']);
    header("Location:admin.php");
}
else{

    header("Location:../index.php");
}

?>




            
            