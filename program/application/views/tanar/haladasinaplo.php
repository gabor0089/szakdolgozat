<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <script>   
      function ujnaplokinyit() 
      {
        if(document.getElementById('ujnaplo').style.display == "block")
        {
          document.getElementById('ujnaplo').style.display = "none";
        }
        else
        {
          document.getElementById('ujnaplo').style.display = "block";
        } 
      }
      function ujnaplobecsuk()
      {
        document.getElementById('ujnaplo').style.display = "none";
      }
    </script>
    </HEAD>
	<BODY onload='ujnaplokinyit()'>
	<div class='container'>
	<H2 class='text-center'>Haladási napló</H2>
		<div class='row'>
			<?php foreach ($tanitotttargyak as $targy):?>
			<?php $targy2=$targy['tantargyid'];?>
			<div class='col-md-1'>
				<a href='<?=base_url()?>Tanar/haladasinaplo/<?=$targy2?>'>
					<button class='btn btn-primary'><?=$targy['nev']?> <?=$targy['osztalynev']?></button>
				</a>
			</div>
			<?php endforeach;?>
		</div>
		<div class='row'>
		<?php if($naplo<>null):?>
			<div class='col-md-12 text-center h2'><?=$naplo[0]['osztalynev']?> <?=$naplo[0]['tantargynev']?> (<?=$naplo[0]['oraszam']?> tanóra)</div>
		</div>
		<?php if(isset($naplo[0]['datum'])):?>
		<?php foreach ($naplo as $n):?>
			<?php
			$engday=date("N",strtotime($n['datum']));
			switch($engday)
			{
				case 1:$nap="hétfő";break;
				case 2:$nap="kedd";break;
				case 3:$nap="szerda";break;
				case 4:$nap="csütörtök";break;
				case 5:$nap="péntek";break;
				default:$nap="hétvége";break;
			}
			?>
			<div class='row'>
				<div class='col-md-1 text-right'><?=$n['hanyadik_ora']?></div>
				<div class='col-md-2'><?=$n['datum']?> <?=$nap?></div>
				<div class='col-md-6'>
				<?php echo form_open('Tanar/haladasinaplokesz');?>
					<input class='form-control' type='text' name='tev' value='<?=$n['tevekenyseg']?>'>
					<input type='hidden' name='naploid' value='<?=$n['id']?>'>
					<input type='hidden' name='targyid' value='<?=$n['tantargyid']?>'>
				</div>
				<div class='col-md-1'>
					<button class='btn btn-success' type='submit'>Mentés</button>
				</div>
			<?php echo form_close();?>
			</div>
			
		<?php endforeach;?>
		<?php endif;?>
		<div id='ujnaplo'>
				<?php $hidden=array(
					'osztalyid'=>$naplo[0]['osztalyid'],
					'tantargyid'=>$naplo[0]['tantargyid']);
				?>
				<?php echo form_open('Tanar/haladasi_naplo_uj','',$hidden);?>
				<div class="row">
						<div class='col-md-1'><input class='form-control' type='text' name='ora' value='' size='1'></div>
						<div class='col-md-2'><input class='form-control' type='date' name='datum' value=''></div>
						<div class='col-md-6'><input class='form-control' type='text' name='tev' value=''></div>
						<div class='col-md-1'><button class='btn btn-warning' type='submit'>Mentés</button></div>
				</div>
				<?php echo form_close();?>
			</div>
			<div class='row'>
				<div class='col-md-1'></div>
				<div class='col-md-2'></div>
				<div class='col-md-6'></div>
				<div class="col-md-1 text-left"><button class='btn btn-primary' onclick='ujnaplokinyit()'>+</button>
				</div>
			</div>
	<?php endif;?>
	</div>
	</body>
</Html>