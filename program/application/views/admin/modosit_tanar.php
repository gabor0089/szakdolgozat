<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h2 class='text-center'>Tanár adatainak módosítása</h2>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
			<?PHP echo form_open('Admin/Tanar_mod');?>
			
			<input type='hidden' name='userid' value='<?=$tanarokadatai['userid']?>'>
            Név <input type='text' class='form-control' name='name' value='<?=$tanarokadatai['name']?>' size='50' autocomplete='off' placeholder='Név' required>
            Születési idő <input type='date' class='form-control' name='dob' value='<?=$tanarokadatai['dob']?>' autocomplete='off' placeholder='Születési idő' >
			Születési hely <input type='text' class='form-control' name='szulhely' value='<?=$tanarokadatai['szulhely']?>' autocomplete='off' placeholder='Születési hely' >
			TAJ szám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='taj' value='<?=$tanarokadatai['taj']?>' autocomplete='off' placeholder='TAJ szám' >
			Telefonszám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='tel' value='<?=$tanarokadatai['tel']?>' autocomplete='off' placeholder='Telefonszám' >
			Irányítószám <input type='text' class='form-control' name='irsz' value='<?=$tanarokadatai['irsz']?>' autocomplete='off' placeholder='Irányítószám' >
			Lakcím <input type='text' class='form-control' name='lakcim' value='<?=$tanarokadatai['lakcim']?>' autocomplete='off' placeholder='Lakcím' >
			Email <input type='text' class='form-control' name='email' value='<?=$tanarokadatai['email']?>' autocomplete='off' placeholder='Email cím' >
			<BR>
			<button type='submit' class='btn btn-primary btn-block'>Módosít!</button>
			<?php echo form_close();?>
          </div>
      </div>
    </div>
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>