<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Üzenetek<a href="<?php echo base_url();?>Users/ujuzenet">+</a></H1>
	<div class="container-fluid vert_center">
		<?php foreach ($uzenetek as $uzi):?>
			<div class='row'>
				<div class='col-md-2'>
				<?php $csoport=$uzi['csoport'];?>
					<a href="<?php echo base_url();?>Users/egyuzenet/<?=$csoport?>/<?=$userid?>"><?=$uzi['datum']?></a>
				</div>
				<div class='col-md-2'>
				<?php if($uzi['felado']==$userid)
					{
						$nev=$uzi['cimzettnev'];
					}
					else
					{
						$nev=$uzi['feladonev'];	
					}
					?>
					<a href="<?php echo base_url();?>Users/egyuzenet/<?=$csoport?>/<?=$userid?>"><?=$nev?></a>
				</div>
				<div class='col-md-4'>
					<a href="<?php echo base_url();?>Users/egyuzenet/<?=$csoport?>/<?=$userid?>"><?=$uzi['uzenet']?></a>
				</div>
			</div><HR>
		<?php endforeach;?>
	</div>
	</body>
</Html>