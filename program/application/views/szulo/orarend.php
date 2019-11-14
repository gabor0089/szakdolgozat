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

	$hetfo=array();
	$kedd=array();
	$szerda=array();
	$csutortok=array();
	$pentek=array();
	$szombat=array();
	$vasarnap=array();
foreach ($orarend as $ora)
{
	$helyeskezdodatum=date('Y-m-d',$kezdodatum);
	if($ora['datum']==$helyeskezdodatum)//azaz hétfővel
	{
		$hetfo[]=$ora['hanyadik_ora'];$hetfo[]=$ora['osztalyid'];$hetfo[]=$ora['tantargyid'];$hetfo[]=$ora['teremid'];
	}
	$helyeskezdodatum=date('Y-m-d',$kezdodatum+86400);
	if($ora['datum']==$helyeskezdodatum)//azaz keddel
	{
		$kedd[]=$ora['hanyadik_ora'];$kedd[]=$ora['osztalyid'];$kedd[]=$ora['tantargyid'];$kedd[]=$ora['teremid'];
	}
	$helyeskezdodatum=date('Y-m-d',$kezdodatum+172800);
	if($ora['datum']==$helyeskezdodatum)//azaz szerdával
	{
		$szerda[]=$ora['hanyadik_ora'];$szerda[]=$ora['osztalyid'];$szerda[]=$ora['tantargyid'];$szerda[]=$ora['teremid'];
	}
	$helyeskezdodatum=date('Y-m-d',$kezdodatum+259200);
	if($ora['datum']==$helyeskezdodatum)//azaz csütörtökkel
	{
		$csutortok[]=$ora['hanyadik_ora'];$csutortok[]=$ora['osztalyid'];$csutortok[]=$ora['tantargyid'];$csutortok[]=$ora['teremid'];
	}
	$helyeskezdodatum=date('Y-m-d',$kezdodatum+345600);
	if($ora['datum']==$helyeskezdodatum)//azaz péntekkel
	{
		$pentek[]=$ora['hanyadik_ora'];$pentek[]=$ora['osztalyid'];$pentek[]=$ora['tantargyid'];$pentek[]=$ora['teremid'];
	}
}
?>
<TABLE border='1'>
<TR><TD></TD>
<TD><?=date('Y-m-d',$kezdodatum)?><BR>Hétfő</TD>
<TD><?=date('Y-m-d',$kezdodatum+86400)?><BR>Kedd</TD>
<TD><?=date('Y-m-d',$kezdodatum+172800)?><BR>Szerda</TD>
<TD><?=date('Y-m-d',$kezdodatum+259200)?><BR>Csütörtök</TD>
<TD><?=date('Y-m-d',$kezdodatum+345600)?><BR>Péntek</TD>
<?php
	$h0=array(null,null,null);$h1=array(null,null,null);$h2=array(null,null,null);$h3=array(null,null,null);$h4=array(null,null,null);
	$h5=array(null,null,null);$h6=array(null,null,null);$h7=array(null,null,null);$h8=array(null,null,null);$h9=array(null,null,null);
	$h10=array(null,null,null);
for($i=0;$i<count($hetfo);$i=$i+4)
{
	if($hetfo[$i]==0)	{		$h0=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h0="";}
	if($hetfo[$i]==1)	{		$h1=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h1="";}
	if($hetfo[$i]==2)	{		$h2=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h2="";}
	if($hetfo[$i]==3)	{		$h3=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h3="";}
	if($hetfo[$i]==4)	{		$h4=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h4="";}
	if($hetfo[$i]==5)	{		$h5=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h5="";}
	if($hetfo[$i]==6)	{		$h6=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h6="";}
	if($hetfo[$i]==7)	{		$h7=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h7="";}
	if($hetfo[$i]==8)	{		$h8=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h8="";}
	if($hetfo[$i]==9)	{		$h9=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h9="";}
	if($hetfo[$i]==10)	{		$h10=$hetfo[$i+1].". osztály<BR>Tantárgy: ".$hetfo[$i+2]."<BR>Terem:".$hetfo[$i+3];	}else{$h10="";}
}
	$k0=array(null,null,null);$k1=array(null,null,null);$k2=array(null,null,null);$k3=array(null,null,null);$k4=array(null,null,null);
	$k5=array(null,null,null);$k6=array(null,null,null);$k7=array(null,null,null);$k8=array(null,null,null);$k9=array(null,null,null);
	$k10=array(null,null,null);
var_dump($kedd);
for($i=0;$i<count($kedd);$i=$i+4)
{
	if($kedd[$i]==0)	
	{		
		$k0=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];
	}
	else
	{
		//$k0="";
	}
	if($kedd[$i]==1)	{		$k1=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k1="";}
	if($kedd[$i]==2)	{		$k2=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k2="";}
	if($kedd[$i]==3)	{		$k3=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k3="";}
	if($kedd[$i]==4)	{		$k4=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k4="";}
	if($kedd[$i]==5)	{		$k5=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k5="";}
	if($kedd[$i]==6)	{		$k6=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k6="";}
	if($kedd[$i]==7)	{		$k7=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k7="";}
	if($kedd[$i]==8)	{		$k8=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k8="";}
	if($kedd[$i]==9)	{		$k9=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];	}else{$k9="";}
	if($kedd[$i]==10)	{		$k10=$kedd[$i+1].". osztály<BR>Tantárgy: ".$kedd[$i+2]."<BR>Terem:".$kedd[$i+3];}else{$k10="";}
}
	$s0=array(null,null,null);$s1=array(null,null,null);$s2=array(null,null,null);$s3=array(null,null,null);$s4=array(null,null,null);
	$s5=array(null,null,null);$s6=array(null,null,null);$s7=array(null,null,null);$s8=array(null,null,null);$s9=array(null,null,null);
	$s10=array(null,null,null);
for($i=0;$i<count($szerda);$i=$i+4)
{
	if($szerda[$i]==0)	{		$s0=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s0="";}
	if($szerda[$i]==1)	{		$s1=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s1="";}
	if($szerda[$i]==2)	{		$s2=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s2="";}
	if($szerda[$i]==3)	{		$s3=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s3="";}
	if($szerda[$i]==4)	{		$s4=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s4="";}
	if($szerda[$i]==5)	{		$s5=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s5="";}
	if($szerda[$i]==6)	{		$s6=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s6="";}
	if($szerda[$i]==7)	{		$s7=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s7="";}
	if($szerda[$i]==8)	{		$s8=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s8="";}
	if($szerda[$i]==9)	{		$s9=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s9="";}
	if($szerda[$i]==10)	{		$s10=$szerda[$i+1].". osztály<BR>Tantárgy: ".$szerda[$i+2]."<BR>Terem:".$szerda[$i+3];	}else{$s10="";}
}
	$c0=array(null,null,null);$c1=array(null,null,null);$c2=array(null,null,null);$c3=array(null,null,null);$c4=array(null,null,null);
	$c5=array(null,null,null);$c6=array(null,null,null);$c7=array(null,null,null);$c8=array(null,null,null);$c9=array(null,null,null);
	$c10=array(null,null,null);
for($i=0;$i<count($csutortok);$i=$i+4)
{
	if($csutortok[$i]==0)	{		$c0=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c0="";}
	if($csutortok[$i]==1)	{		$c1=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c1="";}
	if($csutortok[$i]==2)	{		$c2=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c2="";}
	if($csutortok[$i]==3)	{		$c3=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c3="";}
	if($csutortok[$i]==4)	{		$c4=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c4="";}
	if($csutortok[$i]==5)	{		$c5=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c5="";}
	if($csutortok[$i]==6)	{		$c6=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c6="";}
	if($csutortok[$i]==7)	{		$c7=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c7="";}
	if($csutortok[$i]==8)	{		$c8=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c8="";}
	if($csutortok[$i]==9)	{		$c9=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c9="";}
	if($csutortok[$i]==10)  {		$c10=$csutortok[$i+1].". osztály<BR>Tantárgy: ".$csutortok[$i+2]."<BR>Terem:".$csutortok[$i+3];	}else{$c10="";}
	
}
	$p0=array(null,null,null);$p1=array(null,null,null);$p2=array(null,null,null);$p3=array(null,null,null);$p4=array(null,null,null);
	$p5=array(null,null,null);$p6=array(null,null,null);$p7=array(null,null,null);$p8=array(null,null,null);$p9=array(null,null,null);
	$p10=array(null,null,null);
for($i=0;$i<count($pentek);$i=$i+4)
{
	if($pentek[$i]==0)  {		$p0=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p0="";}
	if($pentek[$i]==1)	{		$p1=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p1="";}
	if($pentek[$i]==2)	{		$p2=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p2="";}
	if($pentek[$i]==3)	{		$p3=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p3="";}
	if($pentek[$i]==4)	{		$p4=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p4="";}
	if($pentek[$i]==5)	{		$p5=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p5="";}
	if($pentek[$i]==6)	{		$p6=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p6="";}
	if($pentek[$i]==7)	{		$p7=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p7="";}
	if($pentek[$i]==8)	{		$p8=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p8="";}
	if($pentek[$i]==9)	{		$p9=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p9="";}
	if($pentek[$i]==10)	{		$p10=$pentek[$i+1].". osztály<BR>Tantárgy: ".$pentek[$i+2]."<BR>Terem:".$pentek[$i+3];	}else{$p10="";}
}

?></TR>
<TR><TD>0</TD><TD><?=$h0?></TD><TD><?=$k0?></TD><TD><?=$s0?></TD><TD><?=$c0?></TD><TD><?=$p0?></TD><TR>
<TR><TD>1</TD><TD><?=$h1?></TD><TD><?=$k1?></TD><TD><?=$s1?></TD><TD><?=$c1?></TD><TD><?=$p1?></TD><TR>
<TR><TD>2</TD><TD><?=$h2?></TD><TD><?=$k2?></TD><TD><?=$s2?></TD><TD><?=$c2?></TD><TD><?=$p2?></TD><TR>
<TR><TD>3</TD><TD><?=$h3?></TD><TD><?=$k3?></TD><TD><?=$s3?></TD><TD><?=$c3?></TD><TD><?=$p3?></TD><TR>
<TR><TD>4</TD><TD><?=$h4?></TD><TD><?=$k4?></TD><TD><?=$s4?></TD><TD><?=$c4?></TD><TD><?=$p4?></TD><TR>
<TR><TD>5</TD><TD><?=$h5?></TD><TD><?=$k5?></TD><TD><?=$s5?></TD><TD><?=$c5?></TD><TD><?=$p5?></TD><TR>
<TR><TD>6</TD><TD><?=$h6?></TD><TD><?=$k6?></TD><TD><?=$s6?></TD><TD><?=$c6?></TD><TD><?=$p6?></TD><TR>
<TR><TD>7</TD><TD><?=$h7?></TD><TD><?=$k7?></TD><TD><?=$s7?></TD><TD><?=$c7?></TD><TD><?=$p7?></TD><TR>
<TR><TD>8</TD><TD><?=$h8?></TD><TD><?=$k8?></TD><TD><?=$s8?></TD><TD><?=$c8?></TD><TD><?=$p8?></TD><TR>
<TR><TD>9</TD><TD><?=$h9?></TD><TD><?=$k9?></TD><TD><?=$s9?></TD><TD><?=$c9?></TD><TD><?=$p9?></TD><TR>
<TR><TD>10</TD><TD><?=$h10?></TD><TD><?=$k10?></TD><TD><?=$s10?></TD><TD><?=$c10?></TD><TD><?=$p10?></TD><TR>


</TABLE>
		</div>
	</div>
	</body>
</Html>