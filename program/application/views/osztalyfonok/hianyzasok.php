<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   	</HEAD>
	<BODY>
	<h2 class='text-center'>Hiányzások - Késések</h2>
	<div class='container-fluid'>
		<table class="table table-hover table-sm ">
			<tr class='row'>
				<td class='col-md-2 bg-nev text-left'>Név</td>
				<td class='col-md-1 bg-ora text-center'>Igazolt</td>
				<td class='col-md-1 bg-ora text-center'>Igazolatlan</td>
				<td class='col-md-1 bg-ora text-center'>Igazolandó</td>
				<td class='col-md-1 bg-ora text-center'>Összesen</td>
				<td class='col-md-1 text-center'></td>
				<td class='col-md-1 bg-perc text-center'>Igazolt</td>
				<td class='col-md-1 bg-perc text-center'>Igazolatlan</td>
				<td class='col-md-1 bg-perc text-center'>Igazolandó</td>
				<td class='col-md-1 bg-perc text-center'>Összesen</td>
			</tr>

	<?php $osszh=0;$osszhigazolt=0;$osszhigazoltalan=0;$osszhigazolando=0;?>
	<?php $osszk=0;$osszkigazolt=0;$osszkigazoltalan=0;$osszkigazolando=0;?>
	<?php for($i=0; $i < count($nevek); $i++):?>
		<tr class='row'>
		<?php echo form_open('Osztalyfonok/reszletes_hianyzas');
			echo form_hidden('userid', $nevek[$i]['userid']);?>
			<td class='col-md-2 bg-nev'><?=$nevek[$i]['name']?></td>
				<?php foreach ($hianyzasok as $hiany):?>
				<?php if($hiany['diakid']==$nevek[$i]['userid']):?>
					<?php if($hiany['perc']=='45') $osszh++;?>
					<?php if($hiany['statusz']==1 && $hiany['perc']==45) $osszhigazolando++;?>
					<?php if($hiany['statusz']==2 && $hiany['perc']==45) $osszhigazolt++;?>
					<?php if($hiany['statusz']==3 && $hiany['perc']==45) $osszhigazoltalan++;?>
					<?php if($hiany['perc']<45) $osszk+=$hiany['perc'];?>
					<?php if($hiany['statusz']==1 && $hiany['perc']<45) $osszkigazolando+=$hiany['perc'];?>
					<?php if($hiany['statusz']==2 && $hiany['perc']<45) $osszkigazolt+=$hiany['perc'];?>
					<?php if($hiany['statusz']==3 && $hiany['perc']<45) $osszkigazoltalan+=$hiany['perc'];?>
				<?php endif;?>
				<?php endforeach;?>
			<td class='col-md-1 bg-ora'><?php if($osszhigazolt>0) echo $osszhigazolt." óra";else echo "";?></td>
			<td class='col-md-1 bg-ora'><?php if($osszhigazoltalan>0) echo $osszhigazoltalan." óra";else echo "";?></td>
			<td class='col-md-1 bg-ora'><?php if($osszhigazolando>0) echo $osszhigazolando." óra";else echo "";?></td>
			<td class='col-md-1 bg-ora'><?php if($osszh>0) echo $osszh." óra";else echo "";?></td>
			<td class='col-md-1'></td>
			<td class='col-md-1 bg-perc'><?php if($osszkigazolt>0) echo $osszkigazolt." perc";else echo "";?></td>
			<td class='col-md-1 bg-perc'><?php if($osszkigazoltalan>0) echo $osszkigazoltalan." perc";else echo "";?></td>
			<td class='col-md-1 bg-perc'><?php if($osszkigazolando>0) echo $osszkigazolando." perc";else echo "";?></td>
			<td class='col-md-1 bg-perc'><?php if($osszk>0) echo $osszk." perc";else echo "";?></td>
			<td class='col-md-1'><button type='submit' class='btn btn-primary'>Részletek</button></td>
		</tr>
		<?php $osszh=0;$osszhigazolt=0;$osszhigazoltalan=0;$osszhigazolando=0;?>
		<?php $osszk=0;$osszkigazolt=0;$osszkigazoltalan=0;$osszkigazolando=0;?>
		<?php echo form_close();?>
	<?php endfor;?>
		</table>

	</div>

	</body>
</Html>