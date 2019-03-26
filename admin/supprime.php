<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();
try
            {
                $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
             
if($_SESSION['pseudo']== "admin"){

    $req = $conn->prepare('DELETE FROM billets WHERE id = :id');
    $req->execute(array(
    'id' => $_GET['billet']));

    $req= $conn->prepare('DELETE FROM commentaires WHERE id_billet = :id');
    $req->execute(array(
    'id' => $_GET['billet']));

    header("Location:admin.php");
}
else{

    header("Location:../index.php");
}

?>




            
            