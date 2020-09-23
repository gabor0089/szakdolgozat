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
			<?php foreach ($targyak as $targy):?>
			<?php $targy2=$targy['tantargyid'];?>
			<div class='col-md-2'>
				<a href='<?=base_url()?>Tanar/Evvege1targy/<?=$targy2?>'>
					<button class='btn btn-primary'><?=$targy['nev']?> <?=$targy['osztalynev']?></button>
				</a>
			</div>
			<?php endforeach;?>
		</div>
		
<?php
	ini_set('xdebug.var_display_max_depth', '10');
	ini_set('xdebug.var_display_max_children', '256');
	ini_set('xdebug.var_display_max_data', '1024');
?>
</div>
	</body>
	<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>
</html>