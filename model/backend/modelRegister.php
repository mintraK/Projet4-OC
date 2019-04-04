<?php
    session_start();
    require('model/frontend/UserManager.php');
    if(isset($_POST['pseudo']) && isset($_POST['pwd']) && isset($_POST['mail']))
    { 
          if($_POST['pwd']==$_POST['repwd']&& preg_match("/.+@.+\..+/", $_POST['mail'])){
    
         
    
                $pseudo =  $_POST['pseudo'];
                $mail =   $_POST['mail'];
        
              $user = new UserManager(); 
              $res = $user->userExist($pseudo, $mail);

              if(!$res)
              {
    
                $password_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                    $user->createUser($pseudo, $password_hache, $mail);
                          //redirection ne fonctionne pas
                      header("Location: index.php?action=login");
                     exit();
    
              }else
              {
              //user existe deja
                  echo("user existe deja");
                  
              }
    
          } 
          else{
              //mot de passe ne sont pas identiques
    
          }
    
      }
        
        
?>