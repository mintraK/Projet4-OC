<?php $title = "Connexion" ; ?>

<?php ob_start(); ?>
     <div class = "page">
            <header>
                <?php include("menu.php"); ?>
            </header>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <form class="form-horizontal col-xs-4 col-sm-4 col-md-4 col-lg-4" method="post" action="index.php?action=login&amp;pseudo=<?= $_POST['pseudo'];?>">
                    <fieldset>
                
                    <!-- Form Name -->
                    <legend  class="text-center">Se connecter au compte</legend>
                    
                    <!-- Text input-->
                    <div class="form-group">
                    <label class="control-label" for="textinput">Pseudo</label>  
                    <div class="">
                    <input id="textinput" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md">
                    <span class="help-block">help</span>  
                    </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                    <label class="control-label" for="passwordinput">Mot de passe</label>
                    <div class="">
                        <input id="passwordinput" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
                        <span class="help-block">help</span>
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                    <label class="control-label" for="singlebutton"></label>
                    <div class="">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Se connecter</button>
                    </div>
                    </div>

                    </fieldset>
                </form>
            </div>
            <section class = "pied">
                <?php include("footer.php"); ?>
            </section>

    
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

