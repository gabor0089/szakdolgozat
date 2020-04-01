<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        </HEAD>
	<BODY>
	<h1 class='text-center'>Hiányzások</h1>
<div class='container'>
	<div class='row'>
		<table class="table table-striped table-hover table-sm">
<?php foreach ($datas as $d):?>
	<TR class='row'>
	<TD class='col-md-2'>
		<?php
			$datum=$d['hianyzas_datum'];
			$sorszam=date('N',strtotime($datum));
			echo $d['hianyzas_datum']." ".$napok[$sorszam];
		?>
	</TD>
	<TD class='col-md-2'><?=$d['ora']?>. óra</TD>
	<TD class='col-md-2'><?=$d['perc']?> perc késés</TD>
	<TD class='col-md-2'><?=$d['tanarnev']?></TD>
	<?php if($d['statusz']==1):?><TD class='col-md-1 bg-warning'><?php endif;?>
	<?php if($d['statusz']==2):?><TD class='col-md-1 bg-success'><?php endif;?>
	<?php if($d['statusz']==3):?><TD class='col-md-1 bg-danger'><?php endif;?>
</TR>
<?php endforeach;?>
</TABLE>
		</div>
	</div>
</body>
</Html>