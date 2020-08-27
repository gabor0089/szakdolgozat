<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
      <script>
      function showDiv() 
      {
        if(document.getElementById('radioform').style.display == "block")
        {
          document.getElementById('radioform').style.display = "none";
        }
        else
        {
          document.getElementById('radioform').style.display = "block";
        } 
      }
      function showDiv2() 
      {
        if(document.getElementById('ofopipa').checked==true)
        {
          document.getElementById('radioform').style.display = "block";
        }
        else
        {
          document.getElementById('radioform').style.display = "none";
        } 
      }
	</script>

    </HEAD>
	<BODY onload="showDiv2()">

<h1 class='text-center'>Új tanár felvitele</h1>
<div class="container-fluid">
          <div class="col-sm-4 col-md-4">
			<?PHP echo form_open_multipart('Admin/ujtanar');?>
            Név <input type='text' class='form-control' name='nev' value='' size='50' autocomplete='off' placeholder='Név' required>
            Születési idő <input type='date' class='form-control' name='szulido' value='' autocomplete='off' placeholder='Születési idő' >
			Születési hely <input type='text' class='form-control' name='szulhely' value='' autocomplete='off' placeholder='Születési hely' >
			TAJ szám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='taj' value='' autocomplete='off' placeholder='TAJ szám' >
			Telefonszám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='tel' value='' autocomplete='off' placeholder='Telefonszám' >
			Irányítószám <input type='text' class='form-control' name='irsz' value='' autocomplete='off' placeholder='Irányítószám' >
			Lakcím <input type='text' class='form-control' name='lakcim' value='' autocomplete='off' placeholder='Lakcím' >
			Beosztás
			<?php
				$beosztasok = array(
		        	'0'         => 'adminisztrátor',
		        	'1'         => 'igazgató',
		        	'2'         => 'osztályfőnök',
		        	'3'         => 'tanár',
		        	);
				echo form_dropdown('beosztas', $beosztasok);
			?>
			<BR>
			Fénykép <input type="file" name="userfile" size="20"/><br>
			<button type='submit' class='btn btn-primary btn-block'>Mentés</button>
          </div>
          <div class="col-sm-2 col-md-2">
          <div class='form-check'>
			<input type="checkbox" class="form-check-input osztalyfonok" id="ofopipa" name='ofopipa' onclick="showDiv()">
    		<label class="form-check-label" for="ofopipa">Osztályfőnök</label>
		  </div>
		  <div class='form-radio' id='radioform'>
          		
          	<?php foreach ($osztalyok as $o):?>
          		<input type='radio' class='erettsegikozep' name='ofoosztaly' id='<?=$o['osztalyid']?>' value='<?=$o['osztalyid']?>' 
          		checked="unchecked"> <label for='<?=$o['osztalyid']?>'><?=$o['osztalynev']?></label><BR>
          		<?php endforeach;?>	
			</div>
			</div>
	      	
			
    </div>
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>