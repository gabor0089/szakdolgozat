<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
		<?php echo form_open('Tanar/osztalyozas_egyeni');?>
		<H1 class='text-center'>Csoportos osztályozás 
		<button class='btn btn-secondary'>-> Egyéni</button>
		</H1>
		<?php echo form_close();?>
	<div class='container'>
      <table class="table borderless">		
		<?php if(isset($osztalyok)):?>
			<tr class='row'>
				<td class='col-md-1'>Osztályok</td>
			<tr>
	        <tr class='row'>
				<td class='col-md-1'>
					<?php foreach ($osztalyok as $o => $value):?>
						<?php echo form_open('Tanar/osztalyozas_csoportos_osztaly');?>
						<input type='hidden' name='osztalyid' value='<?=$value['osztalyid']?>'>
						<button type='submit' class='btn btn-mute'><?=$value['osztaly']?></button>
					<?php echo form_close();?>
						<BR>
					<?php endforeach?>
				</td>
		  	</tr>
		<?php endif;?>

		<?php if(isset($tantargyak)):?>
			<tr class='row'>
				<td class='col-md-1'>Osztályok</td>
				<td class='col-md-1'>Tantárgyak</td>
			<tr>
	        <tr class='row'>
				<td class='col-md-1'>
					<button type='submit' class='btn btn-primary'><?=$osztaly?></button>
				</td>
				<td class='col-md-2'>
				<?php foreach ($tantargyak as $t => $value):?>
					<?php echo form_open('Tanar/jegyek_csoportos');?>	
						<input type='hidden' name='osztalyid' value='<?=$osztalyid?>'>
						<input type='hidden' name='tantargyid' value='<?=$value['tantargyid']?>'>
						<button type='submit' class='btn btn-mute'><?=$value['nev']?></button>
					<?php echo form_close();?>
					<BR>
				<?php endforeach;?>
				</td>
		  	</tr>
		<?php endif;?>
		
		
<?php
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '1024');
ini_set('xdebug.var_display_max_data', '1024');
?>
	</body>
</Html>