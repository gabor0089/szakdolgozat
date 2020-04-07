<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="sttps://stackpats.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Jegyeim</H1><a href='Nezet'>Nézet váltás</a>
	<div class='row'>
		<div class='kozepre'>
<TABLE border='1'>
<TR><TD>Időpont</TD><TD>Tantárgy</TD><TD>Jegy</TD><TD>Megjegyzés</TD><TD>Tanár</TD></TR>
<?php foreach ($jegyektargyak as $jegy):?>
<TR><TD><?=$jegy['idopont']?></TD><TD><?=$jegy['tantargynev']?></TD><TD><?=$jegy['jegy']?></TD><TD><?=$jegy['megjegyzes']?></TD><TD><?=$jegy['tanar']?></TD></TR>

<?php endforeach;?>
</TABLE>
		</div>
	</div>
	</body>
</Html>