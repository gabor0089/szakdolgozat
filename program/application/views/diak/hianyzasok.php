<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        </HEAD>
	<BODY>
	<h1 class='text-center'>Hiányzások</h1>
<?php foreach ($datas as $d):?>
	<div class='row'>
	<div class='col-md-2'>
		<?php
			$datum=$d['hianyzas_datum'];
			$sorszam=date('N',strtotime($datum));
			echo $d['hianyzas_datum']." ".$napok[$sorszam];
		?>
	</div>
	<div class='col-md-1'>
		<?=$d['ora']?>. óra 
	</div>
	<div class='col-md-1'>
		<?=$d['perc']?> perc késés
	</div>
	<div class='col-md-1'>
		<?=$d['tanarnev']?>
	</div>
	<div class='col-md-1'>
		
		<?=$statusz[$d['statusz']]?>
	</div>
</div>
	
<?php endforeach;?>
	</div>
	</body>
</Html>