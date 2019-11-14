<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<p class='header-name-exit'><a href="<?php echo base_url();?>User/profil/<?=$name?>"><?=$name?></a> (<?=$beosztas?>) 
  <?php echo date("H:i:s",time());?> 
  <a class='exit' href='../Users/Kilepes'><img src="<?php echo base_url();?>assets/img/exit.png" height="15"></img></a>
<p>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <!--<img src="<?php echo base_url();?>assets/img/logo.png"></img>-->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Admin/alapadatok">Alapadatok</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Admin/csengrend">Csengetési rend</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Admin/ujdiak">Új diák</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Admin/ujtanar">Új tanár</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Admin/ujszulo">Új szülő</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>