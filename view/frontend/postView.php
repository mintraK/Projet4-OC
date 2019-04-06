<?php $title = $post->titre(); ?>

<?php ob_start(); ?>
<div class = "page">
    
    <header>                
        <?php include("menu.php"); ?>
    </header>
    <p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
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
                                        <form method= "post" action = "index.php?action=reportComment&amp;idComment=<?= $comment['id']; ?>&amp;idPost=<?= $comment['id_billet']?>">
                                            <h3 class="panel-title"><?= htmlspecialchars($comment['auteur']); ?></h3>
                                            <input type = "hidden" name = "idCommentaire" value =  "<?= $comment['id']; ?>" />
                                            </strong> le <?= $comment['date_commentaire_fr']; ?>  <button type = "submit" style="color:red;" ><abbr title="Signaler"><span class="glyphicon glyphicon-exclamation-sign"></span></abbr>
                                        </form>
                                    </div></p> 
                                    <p><div class="panel-body"><?= nl2br(htmlspecialchars($comment['commentaire'])); ?></div></p></div>
                        <?php } ?>
                </div>
            </div>
            
            <div class = "row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 "> </div>
                <div class="col-xs-6 col-sm-6 col-md-6  col-lg-6 "> 
                        <form class="form-group" method = "post" action = "index.php?action=addComment&amp;id=<?= $post->id(); ?>">
                            <fieldset>
                                <legend class="text-center"> <h2>Ajouter un commentaire</h2></legend>
                                    <div class="form-group">   
                                        <label class="control-label" for="textinput">Prénom</label>
                                        <input id="textinput" name="author" type="text" placeholder="<?= $_SESSION['pseudo'];?>" class="form-control input-md"> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="textarea">Commentaire</label>
                                        <textarea class="form-control" id="textarea" name="comment" placeholder = "Commentaire"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button id="Envoyer" type = "submit" name="envoyerCommentaire" class="btn btn-primary">Envoyer</button> 
                                        </div>
                            </fieldset>
                        </form>
                    </div>
            </div>
        <section class = "pied">

          <?php include("footer.php"); ?>
        </section>
    </div>
</div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

