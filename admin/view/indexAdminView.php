
<?php $title = "Tableau de bord"; ?>
<?php ob_start(); ?>
<div class="page">
    <header>                
        <?php include("menuAdmin.php"); ?>
    </header>
    <section class = "detail">
        <div class="row">
            <?php include("menuverticale.php"); ?> 
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <table class="table table-bordered table-striped table-condensed table-responsive">
                        <caption>
                            <h4>Tous les articles</h4>
                        </caption>
                        <thead>
                        <tr>
                            <th>Titres</th>
                            <th>Contenus</th>
                            <th>Liens</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $donnees){ ?>
                            <tr>
                                <td><?= htmlspecialchars($donnees->titre()); ?></td>
                                <td><?= nl2br($donnees->contenu()); ?></td>
                                <td><a href="../index.php?action=post&amp;id=<?= $donnees->id(); ?>">Lien</a></td>
                                <td><a href="index.php?action=editArticle&amp;id=<?= $donnees->id(); ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil" style="color: green;"></span></a> </td>
                                <td><a href="index.php?action=deleteArticle&amp;id=<?= $donnees->id(); ?>" class="btn btn-default"><span class="glyphicon glyphicon-trash" style="color: red;"></span></a> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
        </div>
    </section>
    <section class = "pied">          
    <?php include("footer.php"); ?>
    </section>
 </div>
<?php  $content = ob_get_clean(); ?>
 <?php require('template.php'); ?>


