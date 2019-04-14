<?php $title = "Inscription" ?>

<?php ob_start(); ?>
<div class = "page">
    
    <header>                
        <?php include("menu.php"); ?>
    </header>
   
    <div class="contenu-page">
        <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <form class="form-horizontal col-xs-6 col-sm-6 col-md-6 col-lg-6" method="post" action="index.php?action=register">
                <fieldset>
                    <legend class="text-center">Créer un compte</legend>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Pseudo</label>  
                        <input  id = "pseudo" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md">
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="passwordinput">Mot de passe</label>
                        <input  id ="pwd" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
                        <span class="help-block" style="display:none;">help</span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="passwordinput">Retapez votre mot de passe</label>
                        <input  id ="repwd" name="repwd" type="password" placeholder="Mot de passe" class="form-control input-md">
                        <span id="helprepwd" class="help-block" style="color:red;  display:none;">Mot de passe ne sont pas identiques</span>
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="textinput">Adresse email</label>  
                        <input id ="mail" name="mail" type="text" placeholder="mail@mail.com" class="form-control input-md">
                        <span id ="helpmail" class="help-block" style="color: red; display:none;">Utilisez autre émail</span>  
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="singlebutton"></label>
                        <button id="inscrire"  type="submit" name="singlebutton" class="btn btn-primary">S'inscrire</button>
                    </div>
                </fieldset>
            </form>
        </div>       
    </div>
    <section class = "pied">
          <?php include("footer.php"); ?>
    </section>
    
</div>
<script src= public/register.js></script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

