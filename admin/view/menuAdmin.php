<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php"><img src="../images/logo.jpg" style="width:150px; heigth:100px;" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
            
                    <ul class="nav navbar-nav pull-right">
                    <li><a class="active" href =""><span class="glyphicon glyphicon-user"></span> Bonjour <?php echo $_SESSION['pseudo'];?>  !</a> </li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-cog"></span>Tableau de bord</a></li>
                    <li><a href="../index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>  Déconnexion</a></li>
                    
                </ul>
    </div>
  </div>
</nav>
    </header>
 
 