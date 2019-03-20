<?php session_start(); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" style="width:150px; heigth:100px;" /></a>
    </div>
<?php 
        if(isset($_SESSION['pseudo'])){
          
            // $_SESSION['pseudo'] = $pseudo;
?>
            <ul class="nav navbar-nav pull-right">
                <li><a class="active" href =""><span class="glyphicon glyphicon-user"></span> Bonjour <?php echo $_SESSION['pseudo'];?>  !</a> </li>
                <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span>  Déconnexion</a></li>
      
            </ul>

           
            <?php 

            }
           else{
                $page = $_SERVER['PHP_SELF'];
 
                     if( basename($page) == 'index.php')
                     { 
             ?>
                        <ul class="nav navbar-nav pull-right">
                            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                            <li><a href="connexion.php">Connexion</a></li>
      
                        </ul>
                <?php }

                    if( basename($page) == "inscription.php")
                     {
                 ?>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                            <li class="active" ><a href="inscription.php"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                            <li><a href="connexion.php">Connexion</a></li>
      
                        </ul>
                 <?php }

                     if( basename($page) == "connexion.php")
                     {
                ?>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                            <li class="active"><a href="connexion.php">Connexion</a></li>
                            
                        </ul>
                <?php }
    


    }
?>

   
    
  </div>
</div><br/>


           