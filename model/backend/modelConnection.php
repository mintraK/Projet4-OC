<?php
    session_start();
    require('model/frontend/UserManager.php');
        if(isset($_POST['pseudo']) && isset($_POST['pwd'])){
            if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])) {

                $user = new UserManager();   
                $res =$user->userLogin($_POST['pseudo']);
                // $user= 
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
                        throw new Exception('Mot de passe est incorect!' );
                    }
                }

            }
            else {
                throw new Exception('Les champss ne sont pas touts remplis!' );     
            }

        }

