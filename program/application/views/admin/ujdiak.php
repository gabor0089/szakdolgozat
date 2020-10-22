<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h1 class='text-center'>Új diák felvitele</h1>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
			<?PHP echo form_open_multipart('Admin/ujdiak');?>
			<?php 
				if($feltoltes!='sikertelen!') 
				{
					echo "A felvitel ".$feltoltes."<BR>";
				}
				else
				{
					//echo "Hiba!".$error;
				}
			?>
            Név <input type='text' class='form-control' name='nev' value='' size='50' autocomplete='off' placeholder='Név' required>
            Születési idő <input type='date' class='form-control' name='szulido' value='2001-04-02' autocomplete='off' placeholder='Születési idő' >
			Születési hely <input type='text' class='form-control' name='szulhely' value='' autocomplete='off' placeholder='Születési hely' >
			TAJ szám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='taj' value='' autocomplete='off' placeholder='TAJ szám' >
			Telefonszám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='tel' value='' autocomplete='off' placeholder='Telefonszám' >
			Irányítószám <input type='text' class='form-control' name='irsz' value='' autocomplete='off' placeholder='Irányítószám' >
			Lakcím <input type='text' class='form-control' name='lakcim' value='' autocomplete='off' placeholder='Lakcím' >
			Email <input type='text' class='form-control' name='email' value='' autocomplete='off' placeholder='Email cím' >
			Osztály
			<?php
				$osztalyok = array(
		        	'1'         => '9/A',
		        	'2'         => '9/B',
		        	'4'         => '10/A',
		        	'5'         => '10/B',
		        	'7'         => '11/A',
		        	'8'         => '11/B',
		        	'10'         => '12/A',
		        	'11'         => '12/B',
		      	);
				echo form_dropdown('osztaly', $osztalyok);
			?>
			<BR>
			Fénykép <input type="file" name="userfile" size="20"/><br>
			<button type='submit' class='btn btn-primary btn-block'>Mentés</button>
          </div>
      </div>
    </div>
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>