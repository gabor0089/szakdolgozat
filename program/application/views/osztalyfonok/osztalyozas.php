<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//bootstrap-extension.com/css/4.5.1/bootstrap-extension.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<div class='container'>
      <div class='row'>
        <div class='col-sm-12 text-center h2'>Saját osztályom</div>
      </div>
      <div class="row">
        <div class='col-sm-6 text-right'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyJegyek'>
          <button class='btn btn-info'>Jegyek</button></a>
        </div>
        <div class='col-sm-6 text-left'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyHianyzasok'>
          <button class='btn btn-info'>Hiányzások</button></a>
        </div>
      </div>

		<div class='row'>
			<div class='col-md-12 h2 text-center'>Jegyek</div>
		</div>
		<div class='row'>
			<div class='col-md-2 h3 text-right'><a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam-1?>">előző</a></div>
			<div class='col-md-8 text-center h3'><?=$tantargynevek?></div>
			<div class='col-md-2 h3 text-left'><a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam+1?>">következő</a></div>
		</div>
		<table class="table table-striped table-hover table-sm">
			<tr class='row'>
				<td class='col-md-1'></td>
				<td class='col-md-2'></td>
				<td class='col-md-7'></td>
				<td class='col-md-1'>Átlag</td>
			</tr>
			<?php for ($i=0;$i<count($nevek);$i++):?>
				<tr class='row'>
					<td class='col-md-1 text-right'><?=$i+1?>.</td>
					<td class='col-md-2'><?=$nevek[$i]['name']?></td>
					<td class='col-md-7'>
					<?php $osszeg=0;$db=0;?>
					<?php foreach ($jegyek as $jegy):?>
						<?php if($nevek[$i]['userid']==$jegy['kikapta'] && $jegy['jeloles']<>0):?>
							<a href='#' title='<?=$jegy['megjegyzes']?> <?=$jegy['idopont']?>'><?=$jegy['jegy']?></a>&nbsp&nbsp 
							<?php 
								$osszeg=$osszeg+$jegy['jegy'];
								$db++;
							?>
						<?php endif;?>	
					<?php endforeach;?>
					</td>
					<td class='col-md-1'>
						<?php
							if($db<>0) 
							{
								$atlag=$osszeg/$db;
								echo number_format($atlag,2);
							}
						?>
					</td>
				</tr>
			<?php endfor;?>
		</table>
<?php
	ini_set('xdebug.var_display_max_depth', '10');
	ini_set('xdebug.var_display_max_children', '256');
	ini_set('xdebug.var_display_max_data', '1024');
?>
</div>
	</body>
	<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>
</html>