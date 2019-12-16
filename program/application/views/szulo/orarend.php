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
<H1>Órarend</H1>
				<?php
					foreach ($orarend as $ora) 
					{
						switch($ora['hanyadik_ora'])
						{
							//$a jelenti a 0. órát, $b az 1.-t stb.
							case 0:$a[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 1:$b[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 2:$c[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 3:$d[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 4:$e[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 5:$f[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 6:$g[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 7:$h[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 8:$j[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 9:$k[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
							case 10:$l[$ora['milyennap']]=$ora['tantargy']."<BR>".$ora['terem']."<BR>".$ora['tanarnev'];break;
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
	</body>
</Html>