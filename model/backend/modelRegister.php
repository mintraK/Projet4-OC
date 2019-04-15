<?php
    session_start();
    require('model/frontend/UserManager.php');
    if(isset($_POST['pseudo']) && isset($_POST['pwd']) && isset($_POST['mail']))
    {  if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])&&!empty($_POST['mail'])){
        if($_POST['pwd']==$_POST['repwd']){
            
            if(preg_match("/.+@.+\..+/", $_POST['mail'])){
                $pseudo =  $_POST['pseudo'];
                $mail =   $_POST['mail'];
            
                $user = new UserManager(); 
                $res = $user->userExist($pseudo, $mail);
    
                if(!$res)
                {
                    $password_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                    $isCreate = $user->createUser($pseudo, $password_hache, $mail);
                    if( $isCreate == 1)
                    {
                        header("Location: index.php?action=login");
                    }
                    else
                    {
                        throw new Exception('Impossible de creer un nouvel utilisateur !');    
                    }  
                }
                else
                {   
                    throw new Exception('L\'utilisateur existe déjà!');    
                }
            }
            else
            {
                throw new Exception('L\'adresse mail n\'est pas valide !');
            }
          } 
          else
          { 
              throw new Exception('Les 2 mots de passe ne sont pas identiques!');
          }
        }
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        } 
      }   
?>