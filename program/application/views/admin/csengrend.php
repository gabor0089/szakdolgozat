<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
<?PHP echo form_open('Admin/csengrend');?>

<h1 class='text-center'>Csengetési rend módosítása</h1>
<div class='row'>
	<div class='kozepre'>
<TABLE border='1'>
<TR><TD></TD></TR>
<TR><TD>0.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k0' value='07:00'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v0' value='07:40'></TD></TR>
<TR><TD>1.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k1' value='08:00'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v1' value='08:45'></TD></TR>
<TR><TD>2.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k2' value='08:55'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v2' value='09:40'></TD></TR>
<TR><TD>3.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k3' value='09:55'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' vname='v3' value='10:40'></TD></TR>
<TR><TD>4.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k4' value='10:50'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v4' value='11:35'></TD></TR>
<TR><TD>5.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k5' value='11:45'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v5' value='12:30'></TD></TR>
<TR><TD>6.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k6' value='12:40'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v6' value='13:25'></TD></TR>
<TR><TD>7.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k7' value='13:40'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v7' value='14:20'></TD></TR>
<TR><TD>8.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k8' value='14:25'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v8' value='15:05'></TD></TR>
<TR><TD>9.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k9' value='15:10'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v9' value='15:50'></TD></TR>
<TR><TD>10.</TD><TD><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='k10' value='15:55'><input type='text' class='form-control col-xs-4 col-sm-6 col-md-4' name='v10' value='16:40'></TD></TR>
</TABLE>
<button type='submit' class='btn btn-primary btn-block form-control col-sm-6 col-md-4'>Mentés</button>
</div>
<p>Itt még nem az adatbázisból jön az adat, de már oda ment!</p>
</div>
<?PHP echo form_close();?>

</body>
</html>