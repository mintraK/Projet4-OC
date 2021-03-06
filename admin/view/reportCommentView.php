<?php
 session_start();
 
$title = "Commentaires signalés"; ?>

<?php ob_start(); ?>
    <div class="page">      
          <header>  
            <?php include("menuAdmin.php"); ?>
          </header>        
          <section class = "detail" >
            <div class="row">
                <?php include("menuverticale.php"); ?>
                <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                  <table class="table table-bordered table-striped table-condensed">
                    <caption>
                        <h4>Tous les commentaires signalés</h4>
                    </caption>
                    <thead>
                      <tr>
                        <th>auteurs</th>
                        <th>contenus</th>
                        <th>supprimer</th>
                        <th>ignorer</th>
                      </tr>
                    </thead>
                    <tbody>                
                      <?php foreach($comment as $donnees) {?>  
                        <tr>
                          <td><?= nl2br(htmlspecialchars($donnees->auteur()));?></td>
                          <td><?= nl2br(htmlspecialchars($donnees->commentaire()))?></td>
                          <td>
                            <form method= "post" action = "index.php?action=deleteComment&amp;commentId=<?=$donnees->id();?>">
                              <button type = "submit"><span class="glyphicon glyphicon-trash" style="color: red;"></span>                    
                            </form>
                          </td>
                          <td>
                            <form method= "post" action = "index.php?action=ignoreComment&amp;commentId=<?=$donnees->id();?>">
                              <button type = "submit" ><span class="glyphicon glyphicon-ok" style="color: green;"></span>   
                            </form>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              </div>
            </div> 
          </section>     
        </div>
<?php  $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

    

