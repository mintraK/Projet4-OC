<?php $title = "Connexion" ; ?>

<?php ob_start(); ?>
     <div class = "page">
            <header>
                <?php include("menu.php"); ?>
            </header>
           <?php 
            // if (isset($_POST['pseudo'])){
            //     $pseudo = $_POST['pseudo'];
            // }
           
           ?>
            <form class="form-horizontal" method="post" action="index.php?action=login&amp;pseudo=<?= $_POST['pseudo'];?>">
                <fieldset>
             
                <!-- Form Name -->
                <legend  class="text-center">Se connecter au compte</legend>
                
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Pseudo</label>  
                <div class="col-md-4">
                <input id="textinput" name="pseudo" type="text" placeholder="Pseudo" class="form-control input-md">
                <span class="help-block">help</span>  
                </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
                <div class="col-md-4">
                    <input id="passwordinput" name="pwd" type="password" placeholder="Mot de passe" class="form-control input-md">
                    <span class="help-block">help</span>
                </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Se connecter</button>
                </div>
                </div>

                </fieldset>
            </form>

            <section class = "pied">
                <?php include("footer.php"); ?>
            </section>

    
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

