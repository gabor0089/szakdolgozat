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
			<div class='col-md-12 h2 text-center'>Jegyek</div>
		</div>
		<div class='row'>
			<div class='col-md-2 h3 text-right'><a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam-1?>">előző</a></div>
			<div class='col-md-8 text-center h3'><?=$tantargynevek?></div>
			<div class='col-md-2 h3 text-left'><a href="<?php echo base_url();?>Osztalyfonok/Osztalyozas/<?=$sszam+1?>">következő</a></div>
		</div>
		<table class="table table-striped table-hover table-sm">
		<?PHP var_dump($evvegijegyek);?>
			<?php echo form_open('Osztalyfonok/evvege');?>
			<tr class='row'>
				<td class='col-md-1'></td>
				<td class='col-md-2'></td>
				<td class='col-md-7'></td>
				<td class='col-md-1'>Átlag</td>
				<td class='col-md-1 text-center'>
					<?php 
						$ma=date("Y-m-d",time());
      					$most=date("H:i:s",time());
      					if(($evvegedatum<$ma) || ($evvegedatum==$ma && $evvegeido<=$most)):?>
      							Év végi osztályzat
      					<?php endif;?>
      			</td>
			</tr>
			<?php for ($i=0;$i<count($nevek);$i++):?>
				<tr class='row'>
					<td class='col-md-1 text-right'><?=$i+1?>.</td>
					<td class='col-md-2'><?=$nevek[$i]['name']?></td>
					<td class='col-md-7'>
					<?php $osszeg=0;$db=0;?>
					<?php foreach ($jegyek as $jegy):?>
						<?php if($nevek[$i]['userid']==$jegy['kikapta'] && $jegy['jeloles']<>0):?>
							<a href='#' title='<?=$jegy['megjegyzes']?> <?=$jegy['idopont']?>'><?=$jegy['jegy']?></a>&nbsp&nbsp 
							<?php 
								$osszeg=$osszeg+$jegy['jegy'];
								$db++;
							?>
						<?php endif;?>	
					<?php endforeach;?>
					</td>
					<td class='col-md-1'>
						<?php
							if($db<>0) 
							{
								$atlag=$osszeg/$db;
								echo number_format($atlag,2);
							}
						?>
					</td>
					<?php if(($evvegedatum<$ma) || ($evvegedatum==$ma && $evvegeido<=$most)):?>
					<td class='col-md-1'>
						<?php if(count($evvegijegyek)==0):?>
							<input type='text' class='form-control' maxlength='1' name='<?=$nevek[$i]['userid']?>' value=''>	
						<?php else:?>
							<?php foreach ($evvegijegyek as $key => $value):?>
								<!-- Az a baj, hogy mivel a foreach-csel végigmegyünk mindig az összes elemen,ezért ha már egyszer
								kiírtuk a megfelelő adatot, akkor ugyanazon a diákon megint megnézzük, hogy mi a helyzett. És mivel
								A jegynek a userid-ja nem egyezik meg az aktuális userid-vel, ezért kiírja az else ágat (IS). -->
								<?php if($value['userid']==$nevek[$i]['userid']):?>
									<?=$value['jegy'];
									echo "kulcs: ".$key;
									unset($evvegijegyek[$key]);
									?>
<!-- Ezzel az unsettel, mmiiután megtaláltuk az adott usert, akkor töröljük a tömbből, így a végére nem lesz semmi a tömbben.-->		
								<?php else:?>
									<?=$value['userid'];?> - <?=$nevek[$i]['userid'];?><BR>		
										<input type='text' class='form-control' maxlength='1' name='<?=$nevek[$i]['userid']?>' value=''>
										

								<?php endif;?>
							<?php endforeach;?>
						<?php endif;?>
					</td>
					<?php endif;?>
				</tr>
			<?php endfor;?>
			<tr class='row'>
				<?php if(($evvegedatum<$ma) || ($evvegedatum==$ma && $evvegeido<=$most)):?>
					<td class='col-md-12 text-right'><button class='btn btn-danger'>Mentés</button></td>
				<?php endif;?>
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