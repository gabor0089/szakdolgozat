<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="sttps://stackpats.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
		<div class='row'>
			<div class='kozepre'>
				<H1>Órarend</H1>
				<?php
					foreach ($orarend as $ora) 
					{
							$nap=$ora['milyennap'];
							$osztaly=$ora['osztaly'];
							$tantargy=$ora['tantargy'];
							$terem=$ora['terem'];
							$osztalyid=$ora['osztalyid'];
							$tantargyid=$ora['tantargyid'];

						switch($ora['hanyadik_ora'])
						{
							//$a jelenti a 0. órát, $b az 1.-t stb.
							case 0:$a[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 1:$b[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 2:$c[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 3:$d[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 4:$e[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 5:$f[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 6:$g[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 7:$h[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 8:$j[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 9:$k[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 10:$l[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$osztaly."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tantargy."</a><BR><a class='orarendlink'>".$terem."</a>";break;
						}
					}
				?>
				<TABLE class='orarend' border='0'>
					<TR class='nap'><TD></TD><TD>Hétfő</TD><TD>Kedd</TD><TD>Szerda</TD><TD>Csütörtök</TD><TD>Péntek</TD></TR>
					<TR><TD>0</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($a[$i])):?><TD class='ora'><?=$a[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>1</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($b[$i])):?><TD class='ora'><?=$b[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>2</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($c[$i])):?><TD class='ora'><?=$c[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>3</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($d[$i])):?><TD class='ora'><?=$d[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>4</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($e[$i])):?><TD class='ora'><?=$e[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>5</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($f[$i])):?><TD class='ora'><?=$f[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>6</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($g[$i])):?><TD class='ora'><?=$g[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>7</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($h[$i])):?><TD class='ora'><?=$h[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>8</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($j[$i])):?><TD class='ora'><?=$j[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>9</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($k[$i])):?><TD class='ora'><?=$k[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
					<TR><TD>10</TD><?php for($i=1;$i<6;$i++):?><?php if(isset($l[$i])):?><TD class='ora'><?=$l[$i]?></TD><?php else:?><TD></TD><?php endif;?><?php endfor;?></TD></TR>
				</TABLE>
			</div>
		</div>
	</BODY>
</HTML>		
