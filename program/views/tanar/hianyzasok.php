<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        </HEAD>
	<BODY>
	<h1 class='text-center'>Hiányzások</h1>
				<?PHP echo form_open('tanar/ujhianyzas')?>
<?php
$ma=date("Y-m-d",time());
if(!isset($nevsor))
	{
		$osztaly="";
		$ora="";
		$datum="";
	}
?>
<div class='row'>
	<div class='col-md-2'>
		<div class='form-group'>
			<input type='text' name='osztaly' value='<?=$osztaly?>' class='form-control' placeholder='Osztály' autocomplete='off' required autofocus>
		</div>
	</div>
	<div class='col-md-2'>
		<div class='form-group'>
			<input type='date' name='datum' value='<?=$ma?>' class='form-control' required >
		</div>
	</div>
	<div class='col-md-2'>
		<div class='form-group'>
			<input type='text' name='ora' value='<?=$ora?>' class='form-control' placeholder='óra' autocomplete='off' required>
		</div>
	</div>
	<div class='col-md-2'>
		<div class='form-group'>
			<button type='submit' class='btn btn-primary btn-block'>Névsor listázása</button><BR>
		</div>
	</div>
</div>
<?php
echo form_close();
if(isset($nevsor))
	{
		foreach ($nevsor as $nevek):
echo form_open('tanar/Ujhianyzasfelvitel')?>
		
<div class='row'>
	<div class='col-md-2'>
		<div class='form-group'>
			<input type='text' name='diak' value='<?=$nevek['name']?>' class='form-control' readonly autocomplete='off'>
		</div>
	</div>
	<div class='col-md-1'>
		<div class='form-group'>
			<input type='text' name='perc' value='' class='form-control'>
		</div>
	</div>
		<div class='form-group'>
			<input type='hidden' name='diakid' value='<?=$nevek['userid']?>' class='form-control'>
			<input type='hidden' name='ora' value='<?=$ora?>' class='form-control'>
			<input type='hidden' name='hianyzas_datum' value='<?=$datum?>' class='form-control'>
		</div>
	<div class='col-md-1'>
		<div class='form-group'>
			<button type='submit' class='btn btn-primary btn-block'>Késés</button>
		</div>
	</div>
</div>
		<?php 
	echo form_close();

			endforeach;?>
		<?php
	
	}
?>
			

	</body>
</Html>