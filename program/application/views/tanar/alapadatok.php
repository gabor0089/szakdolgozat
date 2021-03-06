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
        <div class='col-md-2 col-sm-12'>
          <a href='<?=base_url()?>Tanar/alapadatok'>
            <button class='btn btn-primary'>Iskola adatai</button>
          </a>
        </div>

        <div class='col-md-2 col-sm-12'>
          <a href='<?=base_url()?>Tanar/Kollegalista'>
            <button class='btn btn-primary'>Kollégák</button>
          </a>
        </div>
        <div class='col-md-2 col-sm-12'>
          <a href='<?=base_url()?>Tanar/Osztalylista'>
            <button class='btn btn-primary'>Tanított osztályok</button>
          </a>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-12 col-md-6">
			Az iskola neve: <input type='text' class='form-control' name='isnev' value='<?=$isnev?>' size='50' autocomplete='off' placeholder='Az iskola neve' readonly><br/>
      Igazgató neve: <input type='text' class='form-control' name='ignev' value='<?=$ignev?>'  autocomplete='off' placeholder='Igazgató neve' readonly><br/>
			Iskola címe: <input type='text' class='form-control' name='cim' value='<?=$cim?>' autocomplete='off' placeholder='Az iskola címe' readonly><br/>
			Aktuális tanév: <input type='text' class='form-control' name='ev' value='<?=$ev?>/<?=$ev+1?>' autocomplete='off' placeholder='Aktuális tanév' readonly><br/>
			<?php 
      $ma=date("Y-m-d",time());
      $most=date("H:i:s",time());
      ?>
      Év végi zárás: <input type='text' class='form-control' name='evvegizaras' value='<?=$evvegedatum?> <?=$evvegeido?>' autocomplete='off' readonly>
      <?php if(($evvegedatum<$ma) || ($evvegedatum==$ma && $evvegeido<=$most)):?>
           <a href="<?php echo base_url();?>Tanar/Evvege"><button class='btn btn-danger'>Év végi eredmények</button></a>
      <?php endif;?>  
      
      </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>