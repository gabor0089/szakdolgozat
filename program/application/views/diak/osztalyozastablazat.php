<!DOCTYPE html>
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
A nézet váltható! És az állapot elmentődik adatbázisba<BR>
Nézet 2: Egymás alatt a tantárgyak, egymás mellett a jegyek. Tantárgyra is lehet kattintani, meg magára a jegyre is, ami így kiadja a részleteket.<BR>
Előszőr le kell kérdezni az összes diák által tanult tárgyat.<BR>
<TABLE border='0'>
<?php
//var_dump($jegyektargyak);
for($i=0;$i<count($jegyektargyak);$i++)
{
	if(is_string($jegyektargyak[$i]))
	{
		echo "<TR><TD>".$jegyektargyak[$i]."</TD>";
	}
	else
	{
		echo "<TD>";
		foreach ($jegyektargyak[$i] as $jegy)
		{
			echo $jegy['jegy']." ";
		}
		echo "</TD></TR>";
	}
}
	?>
		</div>
	</div>
	</body>
</Html>