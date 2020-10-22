<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   	</HEAD>
	<BODY>
	<h2 class='text-center'>Profil - Beállítások</h2>
	<?php $userid=$useradatok[0]['userid'];?>
	<?php echo form_open('Szulo/profilkesz/'.$userid);?>
	<div class='container'>
		<div class='row'>
		<div class='col-md-3'>Név: </div><input type='text' name='name' class='col-md-3 form-control' value='<?=$useradatok[0]['name']?>'>
		</div>
		<div class='row'>
		<div class='col-md-3'>E-mail cím: </div><input type='text' name='email' class='col-md-3 form-control' value='<?=$useradatok[0]['email']?>'>
		</div><div class='row'><div class='col-md-12'>&nbsp</div></div>
		<div class='row'>
		<div class='col-md-3'>Jelszó változtatása: </div><input type='password' name='pw' class='col-md-3 form-control'>
		</div>
		<div class='row'>
		<div class='col-md-3'>Új jelszó ismét: </div><input type='password' name='pw2' class='col-md-3 form-control'>
		</div><div class='row'><div class='col-md-12'>&nbsp</div></div>
		<div class='row'>
		<div class='col-md-3'>Irányítószám: </div><input type='text' name='irsz' class='col-md-1 form-control' value='<?=$useradatok[0]['irsz']?>'>
		</div>
		<div class='row'>
		<div class='col-md-3'>Lakcím: </div><input type='text' name='lakcim' class='col-md-3 form-control' value='<?=$useradatok[0]['lakcim']?>'>
		</div>
		<div class='row'>
		<div class='col-md-3'>Telefonszám: </div><input type='text' name='tel' class='col-md-3 form-control' value='<?=$useradatok[0]['tel']?>'>
		</div>
		<div class='row'><div class='col-md-12'>&nbsp</div></div>
		<div class='row'>
			<div class='col-md-6 text-center'><button type='submit' class='btn btn-success'>Módosítások mentése!</button></div>
		</div>
		<?php echo form_close();?>
	</div>
	</body>
</Html>