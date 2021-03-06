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
			<div class='col-md-2 h3 text-right'><a href="<?php echo base_url();?>Osztalyfonok/Evvege/<?=$sszam-1?>">előző</a></div>
			<div class='col-md-8 text-center h3'><?=$tantargynevek?></div>
			<div class='col-md-2 h3 text-left'><a href="<?php echo base_url();?>Osztalyfonok/Evvege/<?=$sszam+1?>">következő</a></div>
		</div>
		<table class="table table-striped table-hover table-sm">
			<?php echo form_open('Osztalyfonok/evvegekesz_tantargy');?>
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
			<?php foreach ($nevek as $nev):?>
				<tr class='row'>
				<td class='col-md-2'><?=$nev['name']?></td>
				<td class='col-md-7'>
					<?php foreach ($evkozijegyek as $evkozi):?>
						<?php if($nev['userid']==$evkozi['kikapta'])
							echo $evkozi['jegy']." ";?>
					<?php endforeach;?>
				</td>
				<td class='col-md-1 text-center'>
					<?php foreach ($atlagok as $atlag):?>
						<?php if($nev['userid']==$atlag['kikapta'])
							echo round($atlag['ertek'],2);?>
					<?php endforeach;?>
				</td>

				<?php $megvan=false;?>
				<?php for ($i=0;$i<count($evvegijegyek);$i++):?>
					<?php if($nev['userid']==$evvegijegyek[$i]['userid'] && 
							$evvegijegyek[$i]['tantargyid']==$tantargyidk && 
							$evvegijegyek[$i]['jegy']<>null):?>
						<?php $megvan=true;?>
						<td class='col-md-2 text-center'><?=$evvegijegyek[$i]['jegy']?></td>
					<?php endif;?>
				<?php endfor;?>
					<?php if(!$megvan):?>
						<td class='col-md-2'>
							<input type='text' class='form-control form-control-sm text-center' maxlength='1' name='<?=$nev['userid']?>' value=''>
						</td>
					<?php endif;?>
				</tr>
			<?php endforeach;?>

			<tr class='row'>
				<td class='col-md-12 text-right'><button class='btn btn-danger'>Mentés</button></td>
			</tr>
			<input type='hidden' name='tantargyid' value='<?=$tantargyidk?>'>
			<?php echo form_close();?>
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