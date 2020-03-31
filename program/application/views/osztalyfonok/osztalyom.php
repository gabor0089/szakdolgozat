<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<div class='h2 text-center'>Adatok</div>

<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class='row'>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/alapadatok'>
            <button class='btn btn-primary'>Iskola adatai</button>
          </a>
        </div>

        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/Kollegalista'>
            <button class='btn btn-primary'>Kollégák</button>
          </a>
        </div>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/Osztalynevsor'>
            <button class='btn btn-primary'>Osztályom</button>
          </a>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-2'>&nbsp</div>
      </div> 

      <div class='row'>
      <?php foreach ($osztalyok as $osztaly) :?>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Tanar/osztalynevsor/<?=$osztaly['osztalyid']?>'>
            <button class='btn btn-primary'><?=$osztaly['osztalynev']?></button>
          </a>
        </div>
      <?php endforeach;?>  
      </div> 
    </div>
  </div>
</div>
</body>
</html>