<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H2 class='text-center'>Csoportos jegyadás</H2>
	<H4 class='text-center'><?=$osztalynev?> - <?=$tantargynev?></H4>
	<div class='container'>
	<?PHP echo form_open_multipart('tanar/csoportos_ujjegyadas')?>      
    <table class="table table-hover table-sm bordered">
		<tr class='row'>
			<td class='col-md-2'>Megjegyzés:</td>
			<td class='col-md-2'><input type='text' class='form-control' name='megjegyzes'>
				<input type='hidden' name='tantargyid' value='<?=$tantargyid?>'>
			</td>
			<td class='col-md-1 text-right'>Dolgozat:</td>
			<td class='col-md-3 text-center'>
				<SELECT name='dolgozat' class='form-control'>
					<OPTION></OPTION>
				<?php foreach ($dolgozatok as $d => $value):?>
						<OPTION value='<?=$value['dolgozatid']?>'><?=$value['dolgozatcim']?></OPTION>
					<?php endforeach;?>
				</SELECT>
			</td>
			<td class='col-md-4'><button type='submit' class='btn btn-primary'>Mentés</button></td>
		</tr>
 
		<tr class='row'>
			<td class='col-md-3'>Név</td>
			<td class='col-md-4 text-center'>Jegyek</td>
			<td class='col-md-1 atlag'>Átlag</td>
			<td class='col-md-1 text-center'>Új jegy</td>
		</tr>
		<?php foreach ($nevsor as $n => $value):?>
		<tr class='row'>
			<td class='col-md-3'><?=$value['name']?></td>
			<td class='col-md-4'>
				<?php $osszeg=0;$db=0;
					foreach ($jegyek as $j => $value2)
					{
						if($value2['userid']==$value['userid'])
						{
							echo $value2['jegy']."&nbsp&nbsp ";
							if($value2['jegy']<>0) $db++;
							$osszeg+=$value2['jegy'];
						}
					}?>
			</td>
			<td class='col-md-1 atlag border border-danger'>
				<?php if($db>0):?>
					<?php $atlag=$osszeg/$db;?>
					<?=round($atlag,2);?>
				<?php endif;?>
			</td>
			<td class='col-md-1 ujjegy'>
				<input type='hidden' name='userid[]' value='<?=$value['userid']?>'>
				<input type='hidden' name='osztalyid' value='<?=$osztaly?>'>
				<input type='number' name='jegy[]' min='1' max='5' size='3' maxlength='1' tabindex='<?=$key?>'> 
			</td>
			<td class='col-md-1'>
				<input type="file" name="fajl[]" size="20" tabindex='99999999' />
			</td>

			</tr>
		</div>
		<?php endforeach;?>
	</table>
	</div>
	</body>
</Html>