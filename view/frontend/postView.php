<?php $title = htmlspecialchars($post->titre()); ?>

<?php ob_start(); ?>
<div class = "page">
    
    <header>                
        <?php include("menu.php"); ?>
    </header>
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <div class="contenu-page">
    
            <div class = "row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style = "margin:20px;"> 
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $post->titre(); ?><em>le <?= $post->dateCreation(); ?></em></h3>
                        </div>
                        <div class="panel-body"><p> <?= nl2br($post->contenu()); ?></p></div>
                    </div>        
                </div>
            </div>

            <div class = "row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                    <h2>Commentaires</h2>
                        <?php while ($comment = $comments->fetch()){ ?>
                            <p><strong>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <form method= "post" action = "index.php?action=addComment&amp;id=<?= $post->id(); ?>">
                                            <h3 class="panel-title"><?= htmlspecialchars($comment['auteur']); ?></h3>
                                            <input type = "hidden" name = "idCommentaire" value =  "<?=$$comment['id']; ?>" />
                                            </strong> le <?= $comment['date_commentaire_fr']; ?>  <button type = "submit" style="color:red;" ><abbr title="Signaler"><span class="glyphicon glyphicon-exclamation-sign"></span></abbr>
                                        </form>
                                    </div></p> 
                                    <p><div class="panel-body"><?= nl2br(htmlspecialchars($comment['commentaire'])); ?></div></p></div>
                        <?php } ?>
                </div>
            </div>
            
            <div class = "row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 "> </div>
                <div class="col-xs-6 col-sm-6 col-md-8  col-lg-8 "> 
                        <?php if(isset($_SESSION['pseudo'])){
                        ?>
                        <form class="form-group" method = "post" action = "index.php?action=addComment&amp;id=<?= $post->id(); ?>">
                            <fieldset>

                                <!-- Form Name -->
                                <legend class="text-center"> <h2>Ajouter un commentaires</h2></legend>


                                    <!-- Textarea -->
                                    <div class="form-horizontal form-group">
                                        <label class="col-md-4  control-label" for="textarea"><?= $_SESSION['pseudo'];?></label>
                                        <div class="col-md-6">                     
                                            <textarea class="form-control" id="textarea" name="comment" placeholder = "Commentaire"></textarea>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="form-group">
                                        <div class="col-md-12 text-center" style = "margin-top:20px;margin-bottom:10px;">
                                            <button id="Envoyer" type = "submit" name="envoyerCommentaire" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </div>

                            </fieldset>
                        </form>

                        
                        <?php }?>
                    </div>
            </div>
        <section class = "pied">

          <?php include("footer.php"); ?>
        </section>
    </div>
</div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

