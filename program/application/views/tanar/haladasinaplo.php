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
					<button class='btn btn-primary'><?=$targy['nev']?> <?=$targy['osztaly']?></button>
				</a>
			</div>
			<?php endforeach;?>
		</div>
		<div class='row'>
		<?php if($naplo<>null):?>
			<div class='col-md-12 text-center h3'><?=$naplo[0]['osztalynev']?> <?=$naplo[0]['tantargynev']?></div>
		</div>
		<?php foreach ($naplo as $n):?>
			<div class='row'>
				<div class='col-md-1'>&nbsp</div>
				<div class='col-md-1'><?=$n['hanyadik_ora']?></div>
				<div class='col-md-1'><?=$n['datum']?></div>
				<div class='col-md-3'><?=$n['tevekenyseg']?></div>
			</div>
		<?php endforeach;?>
	<?php endif;?>
	</body>
</Html>