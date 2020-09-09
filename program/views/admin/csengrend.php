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
<div class='container'>
		<table class="table bordered table-striped table-hover table-sm">

<TR class='row'><TD class='col-md-1'>0. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k0' value='<?=$csengetes[0]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v0' value='<?=$csengetes[0]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>1. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k1' value='<?=$csengetes[1]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v1' value='<?=$csengetes[1]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>2. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k2' value='<?=$csengetes[2]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v2' value='<?=$csengetes[2]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>3. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k3' value='<?=$csengetes[3]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v3' value='<?=$csengetes[3]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>4. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k4' value='<?=$csengetes[4]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v4' value='<?=$csengetes[4]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>5. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k5' value='<?=$csengetes[5]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v5' value='<?=$csengetes[5]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>6. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k6' value='<?=$csengetes[6]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v6' value='<?=$csengetes[6]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>7. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k7' value='<?=$csengetes[7]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v7' value='<?=$csengetes[7]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>8. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k8' value='<?=$csengetes[8]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v8' value='<?=$csengetes[8]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>9. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k9' value='<?=$csengetes[9]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v9' value='<?=$csengetes[9]['vege']?>'></TD></TR>
<TR class='row'><TD class='col-md-1'>10. óra</TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='k10' value='<?=$csengetes[10]['kezdes']?>'></TD><TD class='col-md-1'>
	<input type='text' class='form-control' name='v10' value='<?=$csengetes[10]['vege']?>'></TD></TR>
</TABLE>
<button type='submit' class='btn btn-primary btn-block form-control col-sm-6 col-md-4'>Mentés</button>
</div>
</div>
<?PHP echo form_close();?>

</body>
</html>