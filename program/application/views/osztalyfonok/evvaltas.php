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
			<div class='col-md-12 h2 text-center'>Évváltás</div>
		</div>
		<div class='row'>
			<div class='col-md-12 h4 text-center'><?=$diaknev?></div>
		</div>
		<?php echo form_open('Osztalyfonok/Evvaltas_kesz');?>
		<div class='row'>
			<div class='col-md-6 h5 text-center'>Jelenlegi osztály: <?=$jelenlegi_osztaly?></div>
			<div class='col-md-6 h5 text-center'>Jövő évi osztály: 
				<SELECT name='osztalyid'>
					<?php foreach ($osztalyok as $o):?>
						<?php if($o['osztalyid']==$jelenlegi_osztalyid+3):?>
							<OPTION selected value="<?=$o['osztalyid']?>"><?=$o['osztalynev']?></OPTION></div>
						<?php else:?>
							<OPTION value="<?=$o['osztalyid']?>"><?=$o['osztalynev']?></OPTION></div>
						<?php endif;?>
					<?php endforeach;?>
				</SELECT>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-6 h5 text-center'></div>
			<input type='hidden' name='userid' value='<?=$diakid?>'>
			<div class='col-md-6 h5 text-center'><button class='btn btn-primary'>OK</button></div>
		</div>
		<?php echo form_close();?>

		
<?php
	ini_set('xdebug.var_display_max_depth', '10');
	ini_set('xdebug.var_display_max_children', '256');
	ini_set('xdebug.var_display_max_data', '1024');
?>
</div>
	</body>
	<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>
</html>