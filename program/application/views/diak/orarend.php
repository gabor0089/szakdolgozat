<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="sttps://stackpats.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Órarend</H1>
	<div class='row'>
		<div class='kozepre'>
		<?php
		//var_dump($orarend);
		?>
			<TABLE class='table table-dark'>

			<TR><TD></TD><TD>Hétfő</TD><TD>Kedd</TD><TD>Szerda</TD><TD>Csütörtök</TD><TD>Péntek</TD></TR>
				<?php $j=0;while($j<55):?>
				<TR><TD><?=$j/5?></TD><?php for ($i=0;$i<5;$i++):?>
					<TD>
					<?php if(!isset($orarend[$i+$j]['tantargy'])):?>
					</TD>	
					<?php else:?>
					<?=$orarend[$i+$j]['tantargy']?><BR>Terem: <?=$orarend[$i+$j]['terem']?><BR><?=$orarend[$i+$j]['tanarnev']?></TD>
					<?php endif;?>
				<?php endfor;$j=$j+5;?></TR>
				<?php endwhile;?>
			</TABLE>
		</div>
	</div>
	</BODY>
</HTML>