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
			<div class='col-md-12 h2 text-center'>Év végi jegyek</div>
		</div>
		<div class='row'>
			<div class='col-md-12 text-left'><a href="<?php echo base_url();?>Osztalyfonok/Evvege_Nezetvaltas">Nézetváltás</a></div>
		</div>
		<div class='row'>
			<div class='col-md-2 h3 text-right'><a href="<?php echo base_url();?>Osztalyfonok/Evvege_1diak/<?=$sszam-1?>">előző</a></div>
			<div class='col-md-8 text-center h3'><?=$diaknev['name']?></div>
			<div class='col-md-2 h3 text-left'><a href="<?php echo base_url();?>Osztalyfonok/Evvege_1diak/<?=$sszam+1?>">következő</a></div>
		</div>
		<table class="table table-striped table-hover table-sm">
			<?php echo form_open('Osztalyfonok/evvegekesz_diak');?>
			<?php 
				$ma=date("Y-m-d",time());
      			$most=date("H:i:s",time());
      		?>
			<tr class='row'>
				<td class='col-md-2'></td>
				<td class='col-md-7'></td>
				<td class='col-md-1 text-center'>Átlag</td>
				<td class='col-md-2 text-center'>Év végi osztályzat</td>
			</tr>
			<?php foreach ($tantargyak as $t):?>
				<tr class='row'>
				<td class='col-md-2'><?=$t['nev']?></td>
				<td class='col-md-7'>
					<?php foreach ($evkozijegyek as $evkozi):?>
						<?php if($t['tantargyid']==$evkozi['tantargyid'])
							echo $evkozi['jegy']." ";?>
					<?php endforeach;?>
				</td>
				<td class='col-md-1 text-center'>
					<?php foreach ($atlagok as $atlag):?>
						<?php if($t['tantargyid']==$atlag['tantargyid'])
							echo round($atlag['ertek'],2);?>
					<?php endforeach;?>
				</td>

				<?php $megvan=false;?>
				<?php for ($i=0;$i<count($evvegijegyek);$i++):?>
					<?php if($t['tantargyid']==$evvegijegyek[$i]['tantargyid'] && 
							$evvegijegyek[$i]['jegy']<>null):?>
						<?php $megvan=true;?>
						<td class='col-md-2 text-center'><?=$evvegijegyek[$i]['jegy']?></td>
					<?php endif;?>
				<?php endfor;?>
					<?php if(!$megvan):?>
						<td class='col-md-2'>
							<input type='text' class='form-control form-control-sm text-center' maxlength='1' name='<?=$t['tantargyid']?>' value=''>
						</td>
					<?php endif;?>
				</tr>
			<?php endforeach;?>

			<tr class='row'>
				<td class='col-md-12 text-right'><button class='btn btn-danger'>Mentés</button></td>
			</tr>
			<input type='hidden' name='userid' value='<?=$diakid?>'>
			<input type='hidden' name='osztalyid' value='<?=$osztalyomid?>'>
			<?php echo form_close();?>
		
		<tr class='row'>
			<td class='col-md-9'></td>
			<td class='col-md-3 text-right'><a href="<?php echo base_url();?>Osztalyfonok/Evvaltas/<?=$diakid?>"><button type='submit' class='btn btn-success text-right'>Következő osztályba léphet</button></a></td>
		</tr>
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