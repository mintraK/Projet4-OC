

         
   
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php"><img src="../images/logo.jpg" style="width:150px; heigth:100px;" /></a>
            </div>
            
                    <ul class="nav navbar-nav pull-right">
                    <li><a class="active" href =""><span class="glyphicon glyphicon-user"></span> Bonjour <?php echo $_SESSION['pseudo'];?>  !</a> </li>
                    <li><a href="admin.php"><span class="glyphicon glyphicon-cog"></span>Tableau de bord</a></li>
                    <li><a href="../deconnexion.php"><span class="glyphicon glyphicon-log-out"></span>  Déconnexion</a></li>
                    
                </ul>
        </div>  
    </div>
    </header>
  <br/>
  <br/>
  
<div class="row">  
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">                
                <ul class="nav navbar-inverse  flex-column">
                     <li class="nav-item ">
                         <a class="nav-link active" href="ajouteArticle.php">Ajouter un article</a>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supprimeArticle.php">Supprimer les articles</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="commentaireSignaler.php">Commentaires signalés</a>
                    </li>
             
                 </ul>
        </div>
    <!-- </div> se trouve dans html -->