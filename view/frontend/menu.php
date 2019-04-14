<?php session_start(); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="public/images/logo.jpg" style="width:150px;" alt="logo-du-site" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">    
<?php     
        if(isset($_SESSION['pseudo'])){
           if($_SESSION['pseudo']== "admin"){
  ?>
              <ul class="nav navbar-nav pull-right">
                <li><a class="active" href =""><span class="glyphicon glyphicon-user"></span> Bonjour <?php echo $_SESSION['pseudo'];?>  !</a> </li>           
                <li><a href="index.php?action=dashBord"><span class="glyphicon glyphicon-cog"></span> Tableau de bord</a></li>
                <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>  Déconnexion</a></li>
              </ul>
    <?php  }
           else{
    ?>
              <ul class="nav navbar-nav pull-right">
                  <li><a class="active" href =""><span class="glyphicon glyphicon-user"></span> Bonjour <?php echo $_SESSION['pseudo'];?>  !</a> </li>
                  <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>  Déconnexion</a></li>
              </ul>
            <?php 
            }
        }
        else{
              if( $_GET['action'] == "register"){
            ?>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                        <li class="active" ><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                        <li><a href="index.php?action=login">Connexion</a></li>
  
                    </ul>
          <?php }
              else if( $_GET['action'] == 'login'){
          ?>        <ul class="nav navbar-nav pull-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                        <li><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                        <li class="active"><a href="index.php?action=login">Connexion</a></li>    
                    </ul>
        <?php }
              else{
               ?>
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                        <li><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                        <li><a href="index.php?action=login">Connexion</a></li>
                    </ul>            
              <?php }
        } ?>  
    </div>
  </div>
</nav>


           