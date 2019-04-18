<?php

 require_once('model/frontend/PostManager.php');
 require_once('model/frontend/CommentManager.php');
 require('model/frontend/UserManager.php');
function reportComment(){

    if(isset($_POST['idCommentaire']))
    {
        $CommentManager = new CommentManager();
        $isaddReport = $CommentManager->addReportComment($_POST['idCommentaire']); 
        if($isaddReport == 1){
            header("Location:index.php?action=post&id=".$_GET['idPost']);
        }
        else {
            throw new Exception('Impossible de signaler ce commentaire ' );
        }
    }
}
function logoutUser()
{
    $_SESSION = array();
    session_destroy();
    setcookie('pseudo', '');
    setcookie('pass_hache', '');
    header("Location:index.php");
  
}
function loginUser()
{  
        if(isset($_POST['pseudo']) && isset($_POST['pwd'])){
            if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])) {
                $pseudo = strip_tags($_POST['pseudo']);
                $user = new UserManager(); 
                $userexist = $user->userExist($pseudo,"");
                if ($userexist){
                    $res =$user->userLogin($pseudo); 
                    $pwd = strip_tags($_POST['pwd']);
                    $isPasswordCorrect = password_verify($pwd, $res->pwd());
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


    require('view/frontend/loginView.php');
}
function  register()
{
    if(isset($_POST['pseudo']) && isset($_POST['pwd']) && isset($_POST['mail']))
    {  if (!empty($_POST['pseudo']) && !empty($_POST['pwd'])&&!empty($_POST['mail'])){
        if($_POST['pwd']==$_POST['repwd']){
            
            if(preg_match("/.+@.+\..+/", $_POST['mail'])){
                $pseudo =  strip_tags($_POST['pseudo']);
                $mail =   strip_tags($_POST['mail']);
            
                $user = new UserManager(); 
                $res = $user->userExist($pseudo, $mail);
    
                if(!$res)
                {
                    $password_hache = password_hash(strip_tags($_POST['pwd']), PASSWORD_DEFAULT);
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
     require('view/frontend/registerView.php');

}
function  dashBord()
{
     header("Location: admin");
}


