<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	</HEAD>
	<BODY>
		<h1 class='text-center'>Gyerek váltás</h1>
		<div class='col'>
		</div>
		<div class='row'>
			<div class='kozepre'>
			<?PHP echo form_open('Szulo/Chdchng');?>
			<?php foreach ($mindengyerek as $gyerek):?>
				<input type="radio" name="gyerek" value="<?=$gyerek['gyermekid']?>"><?=$gyerek['gyermeknev']?><BR>
			<?php endforeach;?>
				<input type='submit' class='btn btn-primary' value='Váltás'>
			<?PHP echo form_close();?>

			</div>
		</div>
	</body>
</Html>