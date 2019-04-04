<?php

    session_start();
    require('model/frontend/UserManager.php');
        if(isset($_POST['pseudo']) && isset($_POST['pwd'])){
        // $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        // $pseudo = $_POST['pseudo'];

        //  Récupération de l'utilisateur et de son pass hashé
        // $req = $conn->prepare('SELECT id, pwd FROM membres WHERE pseudo = :pseudo');
        // $req->execute(array(
        //     'pseudo' => $pseudo));
        // $resultat = $req->fetch();
            
        $user = new UserManager();   
        $res =$user->userLogin($_POST['pseudo']);
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pwd'], $res->pwd());
        
        
        if (empty($res))
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                  session_start();
                  $_SESSION['id'] = $res->id();
                 $_SESSION['pseudo'] = $res->pseudo();
                
                //  echo 'Vous êtes connecté !';
                 header("Location:index.php");
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }


        }
        else{

        }
