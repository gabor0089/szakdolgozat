<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
		<div class='row'>
			<div class='col-md-12 text-center'><H1>Órarend<a href="<?php echo base_url();?>Diak/OrarendExport"><img src='<?php echo base_url();?>assets/img/orarend_letoltes.png' width='50' height='50'></a></H1></div>
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
							case 0:$a[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 1:$b[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 2:$c[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 3:$d[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 4:$e[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 5:$f[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 6:$g[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 7:$h[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 8:$j[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 9:$k[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
							case 10:$l[$nap]=$tantargy."<BR>".$tanarnev."<BR>".$terem;break;
						}
					}
				?>
				<div class="container">
				
		    <table class="table table-striped table-sm visible-md visible-lg">
				<tr class="row">
		            <td class="col-sm-1"></td>
		            <td class="col-md-2 col-sm-12">Hétfő</td>
		            <td class="col-md-2 col-sm-12">Kedd</td>
		            <td class="col-md-2 col-sm-12">Szerda</td>
		            <td class="col-md-2 col-sm-12">Csütörtök</td>
		            <td class="col-md-2 col-sm-12">Péntek</td>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>0<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($a[$i])):?><td class='col-sm-2 ora thick-border'><?=$a[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>1<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($b[$i])):?><td class='col-sm-2 ora thick-border'><?=$b[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>2<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($c[$i])):?><td class='col-sm-2 ora thick-border'><?=$c[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>3<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($d[$i])):?><td class='col-sm-2 ora thick-border'><?=$d[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>4<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($e[$i])):?><td class='col-sm-2 ora thick-border'><?=$e[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>5<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($f[$i])):?><td class='col-sm-2 ora thick-border'><?=$f[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>6<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($g[$i])):?><td class='col-sm-2 ora thick-border'><?=$g[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>7<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($h[$i])):?><td class='col-sm-2 ora thick-border'><?=$h[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>8<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($j[$i])):?><td class='col-sm-2 ora thick-border'><?=$j[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>9<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($k[$i])):?><td class='col-sm-2 ora thick-border'><?=$k[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr class='row'>
		        	<td class='col-md-1 text-center thick-border'>&nbsp<BR>10<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?>
					<?php if(isset($l[$i])):?><td class='col-sm-2 ora thick-border'><?=$l[$i]?></td><?php else:?><td class='col-sm-2 thick-border'>&nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		    </table>





		    <table class="table table-striped table-sm visible-xs visible-sm">
				<tr class="row"><td class="col-xs-12 text-center">Hétfő</td></tr>
				<tr class='row'>
		        	<?php if(isset($a[1])):?><td class='col-xs-12 ora thick-border'>0. <?=$a[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($b[1])):?><td class='col-xs-12 ora thick-border'>1. <?=$b[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($c[1])):?><td class='col-xs-12 ora thick-border'>2. <?=$c[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($d[1])):?><td class='col-xs-12 ora thick-border'>3. <?=$d[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($e[1])):?><td class='col-xs-12 ora thick-border'>4. <?=$e[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($f[1])):?><td class='col-xs-12 ora thick-border'>5. <?=$f[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($g[1])):?><td class='col-xs-12 ora thick-border'>6. <?=$g[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($h[1])):?><td class='col-xs-12 ora thick-border'>7. <?=$h[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($j[1])):?><td class='col-xs-12 ora thick-border'>8. <?=$j[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($k[1])):?><td class='col-xs-12 ora thick-border'>9. <?=$k[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($l[1])):?><td class='col-xs-12 ora thick-border'>10. <?=$l[1]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr><tr class="row"><td class="col-xs-12 text-center">Kedd</td></tr>
				<tr class='row'>
		        	<?php if(isset($a[2])):?><td class='col-xs-12 ora thick-border'>0. <?=$a[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($b[2])):?><td class='col-xs-12 ora thick-border'>1. <?=$b[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($c[2])):?><td class='col-xs-12 ora thick-border'>2. <?=$c[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($d[2])):?><td class='col-xs-12 ora thick-border'>3. <?=$d[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($e[2])):?><td class='col-xs-12 ora thick-border'>4. <?=$e[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($f[2])):?><td class='col-xs-12 ora thick-border'>5. <?=$f[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($g[2])):?><td class='col-xs-12 ora thick-border'>6. <?=$g[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($h[2])):?><td class='col-xs-12 ora thick-border'>7. <?=$h[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($j[2])):?><td class='col-xs-12 ora thick-border'>8. <?=$j[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($k[2])):?><td class='col-xs-12 ora thick-border'>9. <?=$k[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($l[2])):?><td class='col-xs-12 ora thick-border'>10. <?=$l[2]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr><tr class="row"><td class="col-xs-12 text-center">Szerda</td></tr>
				<tr class='row'>
		        	<?php if(isset($a[3])):?><td class='col-xs-12 ora thick-border'>0. <?=$a[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($b[3])):?><td class='col-xs-12 ora thick-border'>1. <?=$b[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($c[3])):?><td class='col-xs-12 ora thick-border'>2. <?=$c[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($d[3])):?><td class='col-xs-12 ora thick-border'>3. <?=$d[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($e[3])):?><td class='col-xs-12 ora thick-border'>4. <?=$e[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($f[3])):?><td class='col-xs-12 ora thick-border'>5. <?=$f[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($g[3])):?><td class='col-xs-12 ora thick-border'>6. <?=$g[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($h[3])):?><td class='col-xs-12 ora thick-border'>7. <?=$h[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($j[3])):?><td class='col-xs-12 ora thick-border'>8. <?=$j[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($k[3])):?><td class='col-xs-12 ora thick-border'>9. <?=$k[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($l[3])):?><td class='col-xs-12 ora thick-border'>10. <?=$l[3]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr><tr class="row"><td class="col-xs-12 text-center">Csütörtök</td></tr>
				<tr class='row'>
		        	<?php if(isset($a[4])):?><td class='col-xs-12 ora thick-border'>0. <?=$a[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($b[4])):?><td class='col-xs-12 ora thick-border'>1. <?=$b[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($c[4])):?><td class='col-xs-12 ora thick-border'>2. <?=$c[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($d[4])):?><td class='col-xs-12 ora thick-border'>3. <?=$d[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($e[4])):?><td class='col-xs-12 ora thick-border'>4. <?=$e[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($f[4])):?><td class='col-xs-12 ora thick-border'>5. <?=$f[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($g[4])):?><td class='col-xs-12 ora thick-border'>6. <?=$g[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($h[4])):?><td class='col-xs-12 ora thick-border'>7. <?=$h[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($j[4])):?><td class='col-xs-12 ora thick-border'>8. <?=$j[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($k[4])):?><td class='col-xs-12 ora thick-border'>9. <?=$k[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($l[4])):?><td class='col-xs-12 ora thick-border'>10. <?=$l[4]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr><tr class="row"><td class="col-xs-12 text-center">Péntek</td></tr>
				<tr class='row'>
		        	<?php if(isset($a[5])):?><td class='col-xs-12 ora thick-border'>0. <?=$a[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($b[5])):?><td class='col-xs-12 ora thick-border'>1. <?=$b[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($c[5])):?><td class='col-xs-12 ora thick-border'>2. <?=$c[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($d[5])):?><td class='col-xs-12 ora thick-border'>3. <?=$d[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($e[5])):?><td class='col-xs-12 ora thick-border'>4. <?=$e[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($f[5])):?><td class='col-xs-12 ora thick-border'>5. <?=$f[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($g[5])):?><td class='col-xs-12 ora thick-border'>6. <?=$g[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>0. &nbsp &nbsp >&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($h[5])):?><td class='col-xs-12 ora thick-border'>7. <?=$h[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>1. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($j[5])):?><td class='col-xs-12 ora thick-border'>8. <?=$j[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($k[5])):?><td class='col-xs-12 ora thick-border'>9. <?=$k[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        <tr class='row'>
		        	<?php if(isset($l[5])):?><td class='col-xs-12 ora thick-border'>10. <?=$l[5]?></td><?php else:?>
		        		<td class='col-xs-12 thick-border'>2. &nbsp<br>&nbsp<br>&nbsp</td><?php endif;?>
		        </tr>
		        
		    </table>
		</div>
	</BODY>
</HTML>		
