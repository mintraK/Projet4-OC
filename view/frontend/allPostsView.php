<?php $title = "Tous les articles" ;?>
<?php ob_start(); ?>
    <div class="page">
        <header> 
            <?php include("menu.php"); ?>
        </header>
        <section id="panneau"><img src="view/frontend/image.php" alt="photo"/></section> 
        <h2 class="text-center">Tous les billets du blog :</h2>
            <?php foreach ($posts as $donnees) {?>
            <div class="row">
                <div class="news">
                    <div class="col-xs-12 col-sm-11 col-md-3 col-lg-3"><img src= "<?= $donnees->photo(); ?>" alt="photo-du-billet"/>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-8 col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?= $donnees->titre(); ?></h3>
                                <em>le <?= $donnees->dateCreation(); ?></em>
                            </div>
                            <div class="panel-body">
                                <?= substr($donnees->contenu(),0,400);?>
                                <br />
                                <em><a href="index.php?action=post&amp;id=<?= $donnees->id();?>">Lire la suite</a></em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <br/>
            <section class = "pied">
                <?php include("footer.php"); ?>
            </section>
        </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>