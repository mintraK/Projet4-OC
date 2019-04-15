<?php
 session_start();
 
$title = "Modifier le billet"; ?>

<?php ob_start(); ?>

      <div class="page">
        <header>  
          <?php include("menuAdmin.php"); ?>
        </header>
        <br/> 
        <section class = "detail">
          <div class="row">
            <?php include("menuverticale.php");
             ?>
              <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
              <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                <h1>Modifier le billet</h1>
                <form method="post" action="index.php?action=editArticle&amp;id=<?= $post->id(); ?>" >
                  <input type="text" name = "titre" placeholder ="Saisisez le titre" value = "<?= $post->titre(); ?>"/><br />
                  <textarea id="mytextarea" name="contenu" ><?= $post->contenu(); ?></textarea>
                  <button id="button" type="submit" name="button">publier</button>
                </form>
            </div>
          </div>
        </section>
        
        <section class = "pied">

        <?php include("../footer.php"); ?>
        </section>
      </div>
      <?php  $content = ob_get_clean(); ?>
 <?php require('template.php'); ?>

    

