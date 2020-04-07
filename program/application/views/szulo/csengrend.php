<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<h1 class='text-center'>Csengetési rend</h1>
	<div class='row'>
		<div class='kozepre'>
			<TABLE border='1'>
				<?php
				foreach ($datas as $data):?>
					<TR><TD><?=$data['ora']?>. óra:</TD><TD><?=$data['kezdes']?></TD><TD>-</TD><TD><?=$data['vege']?></TD></TR>	
				<?php endforeach;?>
			</TABLE>
		</div>
	</div>
	</body>
</html>