<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   	</HEAD>
	<BODY>
	<h2 class='text-center'>Hiányzások - Késések</h2>
	<h3 class='text-center'><?=$diaknev?></h3>
	<div class='container'>
		<table class="table table-hover table-sm ">
			<tr class='row'>
				<td class='col-md-2 text-left'>Dátum</td>
				<td class='col-md-1 text-center'>óra</td>
				<td class='col-md-1 text-center'>perc</td>
				<td class='col-md-2 text-center'>tanár</td>
				<td class='col-md-1 text-center'>státusz</td>
				<td class='col-md-1 text-center'>típus</td>
				<td class='col-md-2 text-center'>megjegyzés</td>
			</tr>
		<?php foreach ($hianyzas as $hiany):?>
			<?php if($hiany['perc']==45):?>
				<tr class='row sarga'>
			<?php else:?>
				<tr class='row'>
			<?php endif;?>
			<?php echo form_open('Osztalyfonok/hianyzaskesz');?>
			<?php echo form_hidden('hianyzasid',$hiany['hianyzasid']);?>
			<?php echo form_hidden('diakid',$hiany['diakid']);?>
				<td class='col-md-2 text-left'><?=$hiany['hianyzas_datum']?></td>
				<td class='col-md-1 text-center'><?=$hiany['ora']?></td>
				<td class='col-md-1 text-center'><?=$hiany['perc']?></td>
				<td class='col-md-2 text-left'><?=$hiany['nev']?></td>
			<?php if($hiany['statusz']==1):?>
				<?php
				$mezo = array(
	  			      'name'          => 'megjegyzes',
    			      'maxlength'     => '200',
    			      'style'         => 'width:80%'
				);
				?>
				<td class='col-md-1 bg-warning text-center'></td>
				<td class='col-md-2 text-center'><?php echo form_dropdown('tipus',$igazolasok);?></td>
				<td class='col-md-2 text-center'><?php echo form_input($mezo);?></td>
				<td class='col-md-1 text-center'><button type='submit' class='btn btn-primary'>OK</button></td>
			<?php endif;?>
			<?php if($hiany['statusz']==2):?><td class='col-md-1 bg-success text-center'></td><?php endif;?>
			<?php if($hiany['statusz']==3):?><td class='col-md-1 bg-danger text-center'></td><?php endif;?>
				<td class='col-md-1 text-center'><?=$hiany['tipus']?></td>
				<td class='col-md-2 text-center'><?=$hiany['megjegyzes']?></td>
				
			<?php echo form_close();?>
			</tr>
		<?php endforeach;?>
		</table>
	</div>

	</body>
</Html>