<?php
 session_start();
?>
<?php $title = "Ajouter un billet"; ?>
<?php ob_start(); ?>
<div class="page">
        <header>  
          <?php include("menuAdmin.php"); ?>
        </header>     
        <section class = "detail">
          <div class="row">
            <?php include("menuverticale.php");?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">   
                <h1>Ajouter un billet</h1>
                <form method="post" action="index.php?action=addArticle" enctype="multipart/form-data">
                  <input type="text" name = "titre" placeholder ="Saisisez le titre"/><br />
                  <label for="mon_fichier">Photo (tous formats | max. 1 Mo) :</label><br />
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  <input type="file"  name="mon_fichier" id="mon_fichier" /><br />
                  <textarea id="mytextarea" name="contenu"></textarea>
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


