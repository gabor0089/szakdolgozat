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
			<div class='col-md-12 h4 text-center'><?=$targynev['nev']?> <?=$targynev['osztalynev']?></div>
		</div>
		<table class="table table-striped table-hover table-sm">
			<?php echo form_open('Tanar/evvegekesz');?>
			<tr class='row'>
				<td class='col-md-1'></td>
				<td class='col-md-2'></td>
				<td class='col-md-1 text-center'>
					<?php 
						$ma=date("Y-m-d",time());
      					$most=date("H:i:s",time());
      				?>
      							Év végi osztályzat
      			</td>
			</tr>
			<?php for ($i=0;$i<count($evvegijegyek);$i++):?>
				<tr class='row'>
					<td class='col-md-1 text-right'><?=$i+1?>.</td>
					<td class='col-md-2'><?=$evvegijegyek[$i]['name']?></td>
					<td class='col-md-1 text-center'>
						<?php if($evvegijegyek[$i]['jegy']==0):?>
							<input type='text' class='form-control' maxlength='1' name='<?=$evvegijegyek[$i]['userid']?>' value=''>	
						<?php else:?>
							<?=$evvegijegyek[$i]['jegy'];?>
						<?php endif;?>
					</td>
				</tr>
			<?php endfor;?>
	
			<tr class='row'>
					<td class='col-md-12 text-right'><button class='btn btn-danger'>Mentés</button></td>
			</tr>
			<input type='hidden' name='tantargyid' value='<?=$tantargyid?>'>
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