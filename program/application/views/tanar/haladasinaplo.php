<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<script>
</script>
    </HEAD>
	<BODY>
	<H2 class='text-center'>Haladási napló</H2>
		<div class='row'>
			<?php foreach ($tanitotttargyak as $targy):?>
			<?php $targy2=$targy['tantargyid'];?>
			<div class='col-md-2'>
				<a href='<?=base_url()?>Tanar/haladasinaplo/<?=$targy2?>'>
					<button class='btn btn-primary'><?=$targy['nev']?> <?=$targy['osztalynev']?></button>
				</a>
			</div>
			<?php endforeach;?>
		</div>
		<div class='row'>
		<?php if($naplo<>null):?>
			<div class='col-md-12 text-center h3'><?=$naplo[0]['osztalynev']?> <?=$naplo[0]['tantargynev']?></div>
		</div>
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
			<div class='row sor'>
				<div class='col-md-1 text-right'><?=$n['hanyadik_ora']?></div>
				<div class='col-md-2'><?=$n['datum']?> <?=$nap?></div>
				<div class='col-md-6'>
				<?php echo form_open('Tanar/haladasinaplokesz');?>
					<input class='form-control' type='text' name='tev' value='<?=$n['tevekenyseg']?>'>
					<input type='hidden' name='naploid' value='<?=$n['id']?>'>
					<input type='hidden' name='targyid' value='<?=$n['tantargyid']?>'>
				</div>
				<div class='col-md-1'>
					<button class='btn btn-success' type='submit'>Kész</button>
				</div>
			<?php echo form_close();?>
			</div>
		<?php endforeach;?>
	<?php endif;?>
	</body>
</Html>