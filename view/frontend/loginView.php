<?php $title = "Connexion" ; ?>

<?php ob_start(); ?>
    <div class = "page">
            <header>
                <?php include("menu.php"); ?>
            </header>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <form class="form-horizontal col-xs-8 col-sm-8 col-md-4 col-lg-4" method="post" action="index.php?action=login">
                    <fieldset>
                        <legend  class="text-center">Se connecter au compte</legend>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Pseudo</label>  
                                <input id="textinput" name="pseudo" type="text" placeholder="Pseudo" class="form-control">
                                </div>
                            <div class="form-group">
                                <label class="control-label" for="passwordinput">Mot de passe</label>
                                <input id="passwordinput" name="pwd" type="password" placeholder="Mot de passe" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="singlebutton"></label>
                                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Se connecter</button>
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

