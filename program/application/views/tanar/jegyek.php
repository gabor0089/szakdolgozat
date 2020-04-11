<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Jegyek</H1>
	<H3 class='text-center'><?=$diaknev?> - <?=$tantargynev?></H3>
	<div class='container'>
		<?PHP echo form_open_multipart('tanar/ujjegyadas')?>      
<div class='row'>
<div class='col-md-2'>&nbsp</div>
	<input type='hidden' name='tantargyid' value='<?=$tantargyid?>'>
	<input type='hidden' name='diakid' value='<?=$diakid?>'>
	<div class='col-md-1 form-row'>
			<input type='text' name='jegy' class='form-control' placeholder='jegy'>
	</div>
	<div class='col-md-2'>
			<input type='text' name='megjegyzes' class='form-control' placeholder ='megjegyzés'>
	</div>
	<div class='col-md-1 text-right'>
			dolgozat:
	</div>
	<div class='col-md-2'>
		<SELECT name='dolgozat' class='form-control'>
			<OPTION></OPTION>
			<?php foreach ($dolgozatok as $d => $value):?>
				<OPTION value='<?=$value['dolgozatid']?>'><?=$value['dolgozatcim']?></OPTION>	
			<?php endforeach;?>
		</SELECT>
	</div>	
	<div class='col-md-3'>
		<input type="file" name="userfile" size="20" />
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
				$atlag=0;
				if($jegyek<>null)
				{
					$atlag=round($osszeg/count($jegyek),2);
				}
			?>
	<table class="table table-striped table-hover table-sm">
		<tr class='row'>
			<td class='col-md-2 text-right font-weight-bold'>Átlag:</td>
			<td class='col-md-1 text-left font-weight-bold'><?=$atlag?></td>
			<td class='col-md-2 text-left font-weight-bold'>Megjegyzés</td>
			<td class='col-md-6 text-left font-weight-bold'>Dolgozat</td>
			
			<td class='col-md-2'></td>
		</tr>
	<?php foreach ($jegyek as $jegy):?>
		<tr class='row'>
			<td class='col-md-2'><?=$jegy['idopont']?></td>
			<td class='col-md-1 text-left'><?=$jegy['jegy']?></td>
			<td class='col-md-2'><?=$jegy['megjegyzes']?></td>
			<td class='col-md-6'><a target="_blank" href="../../uploads/<?=$jegy['file']?>"><?=$jegy['dolgozat']?></a></td>
		</tr>
	<?php endforeach;?>
	</table>
	</div>
	</body>
</Html>