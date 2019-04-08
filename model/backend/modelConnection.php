<?php
    session_start();
    require('model/frontend/UserManager.php');
        if(isset($_POST['pseudo']) && isset($_POST['pwd'])){
            if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])) {

                $user = new UserManager(); 
                $userexist = $user->userExist($_POST['pseudo'],"");
                if ($userexist){
                    $res =$user->userLogin($_POST['pseudo']); 
                    $isPasswordCorrect = password_verify($_POST['pwd'], $res->pwd());
                    if (empty($res))
                    {
                        throw new Exception('Mauvais identifiant ou mot de passe !');
                    }
                    else
                    {
                        if ($isPasswordCorrect) {
                            $_SESSION['id'] = $res->id();
                            $_SESSION['pseudo'] = $res->pseudo();
                            header("Location:index.php");
                        }
                        else {
                            throw new Exception('Mot de passe est incorrect!' );
                        }
                    }
                }else{
                    throw new Exception('Le pseudo n\'existe pas !' );
                }
            }
            else {
                throw new Exception('Les champss ne sont pas touts remplis!' );     
            }

        }

