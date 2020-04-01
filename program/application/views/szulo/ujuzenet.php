<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H2 class='text-center'>Üzenetek</H2>
	<div class="container-fluid vert_center">
		<div class='row'>
			<div class='col-md-3'>Üzenet küldése neki: <?=$partnernev?></div>
		</div>
		<div class='row'>
			<div class='col-md-1'></div>
			<div class='col-md-6' id='ujvalaszablak'>
				<?php $hidden = array('felado' => $userid, 'cimzett' => $partner);
				echo form_open('Szulo/ujuzenetkuldes','',$hidden);?>
				<TEXTAREA name='uzenetszoveg' cols='50' rows='3'></TEXTAREA> <button class='btn btn-success' type='submit'>Küldés</button>
				<?php echo form_close();?>
			</div>
		</div>
		</div>
	</div>
	</body>
</Html>