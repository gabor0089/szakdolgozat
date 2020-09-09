<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<?php echo form_open('Tanar/osztalyozas_csoportos');?>
		<H1 class='text-center'>Egyéni osztályozás 
		<button class='btn btn-secondary'>->Csoportos</button>
		</H1>
	<?php echo form_close();?>
	<div class='container'>
			    <table class="table borderless">		
		<tr class='row'>
			<?PHP echo form_open('tanar/osztalyozas_diakok')?>
			<td class='col-md-3'>
				<input name='diaknev' type='text' class='form-control' placeholder='Diák neve...' autocomplete='off' autofocus>
			</td>
			<td class='col-md-1'>
				<input type='submit' class='btn btn-primary' value='Keresés'>
			</td>
		</tr>
		<?php echo form_close();?>
		<tr class='row'>
		<?php if(isset($diakok)):?>
			<td class='col-md-3'>
					<?php foreach ($diakok as $d => $value):?>
						<?php echo form_open('Tanar/osztalyozas_tantargy');?>
						<input type='hidden' name='diakid' value='<?=$value['userid']?>'>
						<button type='submit' class='btn btn-mute'><?=$value['name']?></button>
					<?php echo form_close();?>
						<BR>
					<?php endforeach?>
			</td>
		<?php endif;?>
		<?php if(isset($targyak)):?>
			<td class='col-md-3'>
						<input type='hidden' name='tantargyid' value='<?=$value['tantargyid']?>'>
						<button class='btn btn-mute'><?=$diaknev?></button>
			</td>
			<td class='col-md-3'>
					<?php foreach ($targyak as $t => $value):?>
					<?php echo form_open('Tanar/Jegyek_egyeni');?>
						<input type='hidden' name='tantargyid' value='<?=$value['tantargyid']?>'>
						<input type='hidden' name='diakid' value='<?=$diakid?>'>
						<button type='submit' class='btn btn-mute'><?=$value['nev']?></button>
					<?php echo form_close();?>
						<BR>
					<?php endforeach?>
			</td>
		<?php endif;?>
		</tr>
		
<?php
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '1024');
ini_set('xdebug.var_display_max_data', '1024');
?>
	</body>
</Html>