<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h2 class='text-center'>Diák adatainak módosítása</h2>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
			<?PHP echo form_open('Admin/Diak_mod');?>
			
			<input type='hidden' name='userid' value='<?=$diakokadatai['userid']?>'>
            Név <input type='text' class='form-control' name='name' value='<?=$diakokadatai['name']?>' size='50' autocomplete='off' placeholder='Név' required>
            Születési idő <input type='date' class='form-control' name='dob' value='<?=$diakokadatai['dob']?>' autocomplete='off' placeholder='Születési idő' >
			Születési hely <input type='text' class='form-control' name='szulhely' value='<?=$diakokadatai['szulhely']?>' autocomplete='off' placeholder='Születési hely' >
			TAJ szám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='taj' value='<?=$diakokadatai['taj']?>' autocomplete='off' placeholder='TAJ szám' >
			Telefonszám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='tel' value='<?=$diakokadatai['tel']?>' autocomplete='off' placeholder='Telefonszám' >
			Irányítószám <input type='text' class='form-control' name='irsz' value='<?=$diakokadatai['irsz']?>' autocomplete='off' placeholder='Irányítószám' >
			Lakcím <input type='text' class='form-control' name='lakcim' value='<?=$diakokadatai['lakcim']?>' autocomplete='off' placeholder='Lakcím' >
			Email <input type='text' class='form-control' name='email' value='<?=$diakokadatai['email']?>' autocomplete='off' placeholder='Email cím' >
			Osztály
			<?php
				$selected=$diakokadatai['osztalyid'];
				$osztalyok = array(
		        	'1'         => '9/A',
		        	'2'         => '9/B',
		        	'3'         => '9/C',
		        	'4'         => '10/A',
		        	'5'         => '10/B',
		        	'6'         => '10/C',
		        	'7'         => '11/A',
		        	'8'         => '11/B',
		        	'9'         => '11/C',
		        	'10'         => '12/A',
		        	'11'         => '12/B',
		        	'12'         => '12/C'
				);
				echo form_dropdown('osztaly', $osztalyok,$selected);
			?>
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