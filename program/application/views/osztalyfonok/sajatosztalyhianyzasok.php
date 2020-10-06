<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   	</HEAD>
	<BODY>
	<div class='container'>
	  <div class='row'>
        <div class='col-sm-12 text-center h2'>Saját osztályom</div>
      </div>
      <div class="row">
        <div class='col-sm-6 text-right'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyJegyek'>
          <button class='btn btn-info'>Jegyek</button></a>
        </div>
        <div class='col-sm-6 text-left'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyHianyzasok'>
          <button class='btn btn-info'>Hiányzások</button></a>
        </div>
      </div>

		<table class="table table-hover table-sm ">
			<tr class='row'>
				<td class='col-md-2 bg-nev text-center h2'></td>
				<td class='col-md-4 bg-ora text-center h2'>Hiányzások</td>
				<td class='col-md-4 bg-perc text-center h2'>Késések</td>
			</tr>
			<tr class='row'>
				<td class='col-md-2 bg-nev text-left'>Név</td>
				<td class='col-md-1 bg-ora text-center'>Igazolt</td>
				<td class='col-md-1 bg-ora text-center'>Igazolatlan</td>
				<td class='col-md-1 bg-ora text-center'>Igazolandó</td>
				<td class='col-md-1 bg-ora text-center'>Összesen</td>
				<td class='col-md-1 bg-perc text-center'>Igazolt</td>
				<td class='col-md-1 bg-perc text-center'>Igazolatlan</td>
				<td class='col-md-1 bg-perc text-center'>Igazolandó</td>
				<td class='col-md-1 bg-perc text-center'>Összesen</td>
			</tr>

	<?php $osszh=0;$osszhigazolt=0;$osszhigazoltalan=0;$osszhigazolando=0;?>
	<?php $osszk=0;$osszkigazolt=0;$osszkigazoltalan=0;$osszkigazolando=0;?>
	<?php for($i=0; $i < count($nevek); $i++):?>
		<tr class='row'>
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
			<td class='col-md-1 bg-ora text-center'><?php if($osszhigazolt>0) echo $osszhigazolt." óra";?></td>
			<td class='col-md-1 bg-ora text-center'><?php if($osszhigazoltalan>0) echo $osszhigazoltalan." óra";?></td>
			<td class='col-md-1 bg-ora text-center'><?php if($osszhigazolando>0) echo $osszhigazolando." óra";?></td>
			<td class='col-md-1 bg-ora text-center'><?php if($osszh>0) echo $osszh." óra";?></td>

			<td class='col-md-1 bg-perc text-center'><?php if($osszkigazolt>0) echo $osszkigazolt." perc";?></td>
			<td class='col-md-1 bg-perc text-center'><?php if($osszkigazoltalan>0) echo $osszkigazoltalan." perc";?></td>
			<td class='col-md-1 bg-perc text-center'><?php if($osszkigazolando>0) echo $osszkigazolando." perc";?></td>
			<td class='col-md-1 bg-perc text-center'><?php if($osszk>0) echo $osszk." perc";?></td>
			<td class='col-md-1'><a href="<?php echo base_url();?>Osztalyfonok/reszletes_hianyzas/<?=$nevek[$i]['userid']?>"><button class='btn btn-primary'>Részletek</button></a></td>
		</tr>
		<?php $osszh=0;$osszhigazolt=0;$osszhigazoltalan=0;$osszhigazolando=0;?>
		<?php $osszk=0;$osszkigazolt=0;$osszkigazoltalan=0;$osszkigazolando=0;?>
	<?php endfor;?>
		</table>
	</div>

	</body>
</Html>