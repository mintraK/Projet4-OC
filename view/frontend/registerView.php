<?php $title = "Inscription" ?>

<?php ob_start(); ?>
<div class = "page">
    
    <header>                
        <?php include("menu.php"); ?>
    </header>
   
    <div class="contenu-page">
            <form class="form-horizontal" method="post" action="index.php?action=register">
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
                    
    </div>
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

</script>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

