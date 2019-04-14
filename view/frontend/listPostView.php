
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="page">
    <header>                
        <?php include("menu.php"); ?>
    </header>         
   <section id = "panneau">
    
        <img src="view/frontend/image.php"  alt="Photo"/>    
    </section><br/>
    <div class="contenu-page">
        <h2>Dernier billet du blog :</h2><br/>
        <div class="row">
            <div class="news">
                <div class="col-xs-9 col-sm-9 col-md-3 col-lg-3"><img src= "<?= $posts->photo(); ?>" alt="photo-de-billet"/>
                </div>
                <div class="col-xs-9 col-sm-9  col-md-9 col-lg-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $posts->titre(); ?></h3>
                            <em>le <?= $posts->dateCreation(); ?></em>
                        </div>
                        <div class="panel-body">
                            <?= substr( $posts->contenu(),0,500);?>
                            <br />
                            <p><em><a href="index.php?action=post&amp;id=<?= $posts->id(); ?>">Lire la suite</a></em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p><a href="index.php?action=listPosts">Tous les articles</a></p> 
    </div>
    <section class = "pied">          
    <?php include("footer.php"); ?>
    </section> 
 </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


