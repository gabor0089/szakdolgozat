<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
  <BODY>
<!--
<div class="visible-xs">XS</div>
<div class="visible-sm">SM</div>
<div class="visible-md">MD</div>
<div class="visible-lg">LG</div>
-->
<span class='header-iskolanev'>
<?=$iskolanev?>
</span>
<span class='header-name-exit'>
<a href="<?php echo base_url();?>Users/profil/<?=$userid?>"><?=$name?></a> (<?=$beosztas?>) 
  <?php echo date("H:i:s",time());?> 
  <a class="hidden-sm hidden-xs" href='../Users/Kilepes'><img src="<?php echo base_url();?>assets/img/exit.png" height="15"></img></a><BR>
<a class='gyermek' href="<?php echo base_url();?>Szulo/gyerekvaltas">Aktuális gyermek: <?=$aktgyerek[0]['gyermeknev']?></a>
</span>
  <header class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <nav>
            <a href="<?php echo base_url();?>Szulo/alapadatok">Alapadatok</a>
            <a href="<?php echo base_url();?>Szulo/csengrend">Csengetési rend</a>
            <a href="<?php echo base_url();?>Szulo/orarend">Órarend</a>
            <a href="<?php echo base_url();?>Szulo/osztalyozas">Osztályzatok</a>
            <a href="<?php echo base_url();?>Szulo/hianyzas">Hiányzások</a>
            <a href="<?php echo base_url();?>Szulo/uzenetek">Üzenetek</a>
            <a class="visible-sm visible-xs" href='<?php echo base_url();?>Users/Kilepes'>Kilépés</a>

          </nav>
      </div>
    </div>
  </div>
</header>

</body>
</html>