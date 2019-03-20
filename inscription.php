<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
        <!-- <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="style.css" rel="stylesheet" />  -->
    <style type="text/css">
    .page{
        overflow:hidden;
    }
      [class*="col"] { margin-bottom: 20px; }
      img { width: 100%; }
      body { margin-top: 10px; }
    </style>
    </head>
        
    <body>
    <div class="page">
    <header>                
    
    <!-- <div id="logo"><img src="images/logo.jpg" alt="Logo" /></div> -->
               <!-- Le menu -->  <?php include("menu.php"); ?>
    </header>

    <br/> <br/> <br/> 
    <form class="form-horizontal" method="post" action="inscription.php">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Créer un compte</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Pseudo</label>  
  <div class="col-md-4">
  <input  id = "pseudo" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md">
  <span  id = "helppseudo" name="help" class="help-block" style="display:none;">Pseu est deja utilisé</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
  <div class="col-md-4">
    <input  id ="pwd" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
    <span class="help-block" style="display:none;">help</span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Retapez votre mot de passe</label>
  <div class="col-md-4">
    <input  id ="repwd" name="repwd" type="password" placeholder="Mot de passe" class="form-control input-md">
    <span id="helprepwd" class="help-block" style="color:red;  display:none;";>Mot de passe ne sont pas identiques</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adresse email</label>  
  <div class="col-md-4">
  <input id ="mail"name="mail" type="text" placeholder="mail@mail.com" class="form-control input-md">
  <span id ="helpmail" class="help-block" style="color = red; display:none;">Utilisez autre émail</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="inscrire"  type="submit" name="singlebutton" class="btn btn-primary">S'inscrire</button>
  </div>
</div>

</fieldset>
</form>

<?php
    if(isset($_POST['pseudo']) && isset($_POST['pwd']) && isset($_POST['mail']))
    { 
          if($_POST['pwd']==$_POST['repwd']&& preg_match("/.+@.+\..+/", $_POST['mail'])){

                $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');

                $pseudo =  $_POST['pseudo'];
                $mail =   $_POST['mail'];
        
               $req = $conn->prepare('SELECT pseudo, mail FROM membres WHERE  pseudo = :pseudo OR mail = :mail');
               $req->execute(array(
                'pseudo' => $pseudo,
                'mail' => $mail));
                
            $resultat = $req->fetch();
              if(empty($resultat))
              {

                    $pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
              
                    // Insertion
                    $req = $conn->prepare('INSERT INTO membres(pseudo, pwd, mail, dateConnexion) VALUES(:pseudo, :pass, :mail, CURDATE())');
                    $req->execute(array(
                        'pseudo' => $pseudo,
                        'pass' => $pass_hache,
                        'mail' => $mail));
                          //redirection ne fonctionne pas
                      header("Location: connexion.php");
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
 <br/> <br/>
<section class = "pied">

<?php include("footer.php"); ?>
</section>
  
</div>     
     
<script>


document.getElementById("mail").addEventListener("blur", function (e) {
 
    // Correspond à une chaîne de la forme xxx@yyy.zzz
    var regexCourriel = /.+@.+\..+/;
    var validiteCourriel = "";
    if (!regexCourriel.test(e.target.value)) {
      document.getElementById("helpmail").style.display = "block";
      document.getElementById("helpmail").textContent = "Adresse invalide" ;
      e.preventDefault();
      e.stopPropagation();
    }
    else{
      document.getElementById("helpmail").style.display = "none";
      document.getElementById("helpmail").textContent = "Utilisez autre émail" ;
      e.preventDefault();
      e.stopPropagation();
    }
    
});

document.getElementById("repwd").addEventListener("blur",function(e){
 

  if( document.getElementById("pwd").value!= e.target.value){
    // mots de passe ne sont pas identique
    document.getElementById("helprepwd").style.display = "block";
    e.preventDefault();
    e.stopPropagation(); //rester sur la page  
  }
  else{
    
    document.getElementById("helprepwd").style.display = "none";
    e.preventDefault();
    e.stopPropagation(); //rester sur la page  
  }

});

document.getElementById("pwd").addEventListener("blur",function(e){
 
     if(document.getElementById("repwd").value.length!=0 ){
         if( document.getElementById("repwd").value!= e.target.value){
            // mots de passe ne sont pas identique
            document.getElementById("helprepwd").style.display = "block";
            e.preventDefault();
            e.stopPropagation(); //rester sur la page  
          }
          else{
            
            document.getElementById("helprepwd").style.display = "none";
            e.preventDefault();
            e.stopPropagation(); //rester sur la page  
          }

      }
  
});

// document.getElementById("inscrire").addEventListener("click",function(e){
 

//  if( document.getElementById("pwd").value!= document.getElementById("repwd")){
//    // mots de passe ne sont pas identique
//    document.getElementById("helprepwd").style.display = "block";
//    e.preventDefault();
//    e.stopPropagation(); //rester sur la page  
//  }
//  else{
   
//    document.getElementById("helprepwd").style.display = "none";
//    e.preventDefault();
//    e.stopPropagation(); //rester sur la page  
//  }

// });
 


</script>


</body>
</html>






















