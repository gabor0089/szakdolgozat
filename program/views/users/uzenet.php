<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<script>
      function ujvalaszablak() 
      {
        if(document.getElementById('ujvalaszablak').style.display == "block")
        {
          document.getElementById('ujvalaszablak').style.display = "none";
        }
        else
        {
          document.getElementById('ujvalaszablak').style.display = "block";
        } 
      }
	</script>
    </HEAD>
	<BODY>
	<H2 class='text-center'>Üzenetek</H2>
	<div class="container-fluid vert_center">
	<div class='row'>
		<div class='col-md-3'>Üzenetváltások vele: <?=$partner?></div>
		<div class='col-md-3'><button class='btn btn-info' id='ujvalasz' onclick="ujvalaszablak()">Válasz</button></div>
	</div>
	<div class='row'>
			<div class='col-md-2'></div>
			<div class='col-md-6' id='ujvalaszablak' style="display:none;">
				<?php $hidden = array('felado' => $userid, 'cimzett' => $partnerid);
				echo form_open('Users/ujuzenetkuldes','',$hidden);?>
				<TEXTAREA name='uzenetszoveg' cols='50' rows='3' style="border:dotted 2px green;"></TEXTAREA> <button class='btn btn-success' type='submit'>Küldés</button>
				<?php echo form_close();?>
			</div>
		</div>
	<div class='row'>
		<div class='col-md-12'>&nbsp</div>
	</div>
		<?php foreach ($uzenetek as $uzenet):?>
			<div class='row'>
				<div class='col-md-2'>	
					<?=$uzenet['datum']?>
				</div>
				<?php if($uzenet['felado']==$userid):?>
				<div class='col-md-4 text-left bg-primary text-white rounded'>	
						<?=$uzenet['uzenet']?>
				</div>
				<div class='col-md-2'>
				</div>
				<?php else:?>
				<div class='col-md-2'>
				</div>
				<div class='col-md-4 text-right bg-secondary text-white rounded'>	
						<?=$uzenet['uzenet']?>
				</div>
				<?php endif;?>		
			</div>
			<div class='row'>
				<div class='col-md-2'>
					&nbsp
				</div>
			</div>
		<?php endforeach;?>
		<div class='row'>
			<div class='col-md-2'>&nbsp</div>
		</div>
		
	</div>
	</body>
</Html>