<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Jegyek</H1><a href='Nezet'>Nézet váltás</a>
	<div class='container'>
	<div class='row'>
		<table class="table table-striped table-hover table-sm">
<TR class='row'>
	<TD class='col-md-2'>Időpont</TD>
	<TD class='col-md-2'>Tantárgy</TD>
	<TD class='col-md-1'>Jegy</TD>
	<TD class='col-md-2'>Megjegyzés</TD>
	<TD class='col-md-2'>Tanár</TD>
</TR>
<?php foreach ($jegyektargyak as $jegy):?>
<TR class='row'>
	<TD class='col-md-2'><?=$jegy['idopont']?></TD>
	<TD class='col-md-2'><?=$jegy['tantargynev']?></TD>
	<TD class='col-md-1'><?=$jegy['jegy']?></TD>
	<TD class='col-md-2'><?=$jegy['megjegyzes']?></TD>
	<TD class='col-md-2'><?=$jegy['tanar']?></TD>
</TR>
<?php endforeach;?>
</TABLE>
		</div>
	</div>
	</body>
</Html>