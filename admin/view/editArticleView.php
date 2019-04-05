<?php
// On démarre la session AVANT d'écrire du code HTML
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
 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
      
                <h1>Modifier le billet</h1>
                <form method="post" action="index.php?action=editArticle&amp;id=<?= $post->id(); ?>" >
                  <input type="text" name = "titre" placeholder ="Saisisez le titre" value = "<?= $post->titre(); ?>"/><br />
                  
                  <textarea id="mytextarea" name="contenu" ><?= $post->contenu(); ?></textarea>
                  <button id="button" type="submit" name="button">publier</button>
                </form>
             

            </div> <!--div de col -->
          </div><!--div de row -->
        </section>
        
        <section class = "pied">

        <?php include("../footer.php"); ?>
        </section>
      </div>
      <?php  $content = ob_get_clean(); ?>
 <?php require('template.php'); ?>

    

