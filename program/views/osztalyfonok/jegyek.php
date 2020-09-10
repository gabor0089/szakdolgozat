<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<div class='container'>
	<H1 class='text-center'>Jegyek</H1>
	<H3 class='text-center'><?=$diaknev?> - <?=$tantargynev?></H3>
		<?PHP echo form_open('tanar/ujjegyadas2')?>      
<div class='row'>
<div class='col-md-2'>&nbsp</div>
	<input type='hidden' name='tantargyid' value='<?=$jegyek[0]['tantargyid']?>'>
	<input type='hidden' name='tanarid' value='<?=$jegyek[0]['kiadta']?>'>
	<input type='hidden' name='diakid' value='<?=$jegyek[0]['kikapta']?>'>
	<div class='col-md-1 form-row'>
			<input type='text' name='jegy' class='form-control' placeholder='jegy'>
	</div>
	<div class='col-md-2 form-row'>
			<input type='text' name='megjegyzes' class='form-control' placeholder ='megjegyzés'>
	</div>
	<div class='col-md-1'>
		<button type='submit' class='btn btn-primary btn-block'>-></button>
	</div>
</div>
			<?PHP echo form_close();?>
			<?php
			$osszeg=0;
				for ($i=0; $i < count($jegyek); $i++) 
				{ 
					$osszeg+=$jegyek[$i]['jegy'];
				}
				$atlag=round($osszeg/count($jegyek),2);
			?>
<div class='row'>
			<div class='col-md-2 text-right font-weight-bold'>Átlag</div>
			<div class='col-md-1 text-center font-weight-bold'><?=$atlag?></div>
			<div class='col-md-2'></div>
		</div>
	<?php foreach ($jegyek as $jegy):?>
		<div class='row'>
			<div class='col-md-2'><?=$jegy['idopont']?></div>
				<div class='col-md-1 text-center'>
					<?=$jegy['jegy']?>
				</div>
			<div class='col-md-2'>
					<?=$jegy['megjegyzes']?>
			</div>
		</div>
	<?php endforeach;?>
	</div>
	</body>
</Html>