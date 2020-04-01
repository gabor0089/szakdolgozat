<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
		<div class='row'>
			<div class='col-md-12 text-center'><H1>Órarend</H1></div>
		</div>
				<?php
					foreach ($orarend as $ora) 
					{
							$nap=$ora['milyennap'];
							$tanarnev=$ora['tanarnev'];
							$tantargy=$ora['tantargy'];
							$terem=$ora['terem'];
							$osztalyid=5;
							$tantargyid=10;
						switch($ora['hanyadik_ora'])
						{
							//$a jelenti a 0. órát, $b az 1.-t stb.
							case 0:$a[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 1:$b[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 2:$c[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 3:$d[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 4:$e[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 5:$f[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 6:$g[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 7:$h[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 8:$j[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 9:$k[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
							case 10:$l[$nap]="<a class='orarendlink' href='".base_url()."Tanar/osztaly/$osztalyid'>".$tantargy."</a><BR>
											 <a class='orarendlink' href='".base_url()."Tanar/tantargy/$tantargyid'>".$tanarnev."</a><BR><a class='orarendlink'>".$terem."</a>";break;
						}
					}
				?>

				<div class="container">
		    <table class="table table-striped table-hover table-sm">
				<tr class="row">
		            <td class="col-sm-1"></td>
		            <td class="col-sm-2">Hétfő</td>
		            <td class="col-sm-2">Kedd</td>
		            <td class="col-sm-2">Szerda</td>
		            <td class="col-sm-2">Csütörtök</td>
		            <td class="col-sm-2">Péntek</td>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>0<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($a[$i])):?><td class='col-sm-2 ora thick-border'><?=$a[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>1<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($b[$i])):?><td class='col-sm-2 ora thick-border'><?=$b[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>2<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($c[$i])):?><td class='col-sm-2 ora thick-border'><?=$c[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>3<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($d[$i])):?><td class='col-sm-2 ora thick-border'><?=$d[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>4<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($e[$i])):?><td class='col-sm-2 ora thick-border'><?=$e[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>5<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($f[$i])):?><td class='col-sm-2 ora thick-border'><?=$f[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>6<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($g[$i])):?><td class='col-sm-2 ora thick-border'><?=$g[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>7<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($h[$i])):?><td class='col-sm-2 ora thick-border'><?=$h[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>8<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($j[$i])):?><td class='col-sm-2 ora thick-border'><?=$j[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>9<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($k[$i])):?><td class='col-sm-2 ora thick-border'><?=$k[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-sm-1 text-center thick-border'>&nbsp<BR>10<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($l[$i])):?><td class='col-sm-2 ora thick-border'><?=$l[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		    </table>
		</div>
	</BODY>
</HTML>		
