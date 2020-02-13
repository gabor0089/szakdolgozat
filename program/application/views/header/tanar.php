<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
  <BODY>

<div class="visible-xs">XS</div>
<div class="visible-sm">SM</div>
<div class="visible-md">MD</div>
<div class="visible-lg">LG</div>
<span class='header-iskolanev'>
<?=$iskolanev?>
</span>
<span class='header-name-exit'>
<a href="<?php echo base_url();?>User/profil/<?=$userid?>"><?=$name?></a> (<?=$beosztas?>) 
  <?php echo date("H:i:s",time());?> 
  <a class="hidden-sm hidden-xs" href='../../../Users/Kilepes'><img src="<?php echo base_url();?>assets/img/exit.png" height="15"></img></a>
</span>
<header class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <nav>
            <a href="<?php echo base_url();?>Users/alapadatok">Alapadatok</a>
            <a href="<?php echo base_url();?>Users/csengrend">Csengetési rend</a>
            <a href="<?php echo base_url();?>Tanar/orarend">Órarend</a>
            <a href="<?php echo base_url();?>Tanar/osztalyozas">Osztályozás</a>
            <a href="<?php echo base_url();?>Tanar/hianyzas">Hiányzások</a>
            <a href="<?php echo base_url();?>Users/uzenetek">Üzenetek</a>
            <a class="visible-sm visible-xs" href='../Users/Kilepes'>Kilépés</a>

          </nav>
      </div>
    </div>
  </div>
</header>

</body>
</html>