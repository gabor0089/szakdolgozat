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
<div class='h1 text-center'>Jegyek:
<a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam-1?>"><-</a>
<?=$tantargynevek?>
<a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam+1?>">-></a></div>
	<div class='container-fluid'>
		<table class="table table-striped table-hover table-sm">
			<?php for ($i=0;$i<count($nevek);$i++): ?>
			<tr class='row'>
				<td class='col-md-1 text-right'><?=$i+1?>.</td>
				<td class='col-md-2'><?=$nevek[$i]['name']?></td>
				<td class='col-md-9'>
				<?php foreach ($jegyek as $jegy):?>
					<?php if($nevek[$i]['userid']==$jegy['kikapta']):?>
						&nbsp&nbsp<?=$jegy['jegy']?>&nbsp&nbsp
					<?php endif;?>	
				<?php endforeach;?>
				</td>
			</tr>	
			<?php endfor;?>
		</table>
	</div>
</div>
		<?php
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
?>
	</body>
	<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>
</Html>