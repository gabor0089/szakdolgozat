<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Jegyek</H1><a href='Nezet'>Nézet váltás</a>
	<div class='container'>
		<div class='row'>
		<table class="table table-striped table-hover table-sm">
				<?php foreach ($targyak as $t):?> 
				<tr class='row'>
					<td class='font-weight-bold col-md-3'>
						<?=$t['tantargynev']?>		
					</td>
					<td class='col-md-8'>
					<?php $osszeg=0;$db=0;?>
					<?php foreach ($jegyek as $j):?>
						<?php if($t['tid']==$j['tantargyid']):?>
							<?php $osszeg+=$j['jegy'];$db++;?>
							<a href='#' title='<?=$j['megjegyzes']?> <?=$j['idopont']?>'><?=$j['jegy']?></a>&nbsp&nbsp 
						<?php endif;?>
					<?php endforeach;?>
					</td>
					<td class='col-md-1 font-weight-bold'><?php if($db<>null){echo round($osszeg/$db,2);}else{}?></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
	</body>
</Html>