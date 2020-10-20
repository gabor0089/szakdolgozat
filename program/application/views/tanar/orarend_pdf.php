<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    </HEAD>
	<BODY>
		<?php
					foreach ($orarend as $ora) 
					{
							$nap=$ora['milyennap'];
							$osztaly=$ora['osztaly'];
							$tantargy=$ora['tantargynev'];
							$terem=$ora['teremnev'];
							$osztalyid=5;
							$tantargyid=10;
						switch($ora['hanyadik_ora'])
						{
							//$a jelenti a 0. órát, $b az 1.-t stb.
							case 0:$a[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 1:$b[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 2:$c[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 3:$d[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 4:$e[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 5:$f[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 6:$g[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 7:$h[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 8:$j[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 9:$k[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
							case 10:$l[$nap]=$osztaly."<BR>".$tantargy."<BR>".$terem;break;
						}
					}
				?>
<font size='2'>
		    <table border='1' cellpadding='4'>
				<tr>
		            <td></td>
		            <td></td>
		            <td width='100'>Hétfő</td>
		            <td width='100'>Kedd</td>
		            <td width='100'>Szerda</td>
		            <td width='100'>Csütörtök</td>
		            <td width='100'>Péntek</td>
		        </tr>
		        <tr>
		        	<td>0<BR></td>
					<td><?=$csengrend[0]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($a[$i])):?><td><?=$a[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>1<BR></td>
					<td><?=$csengrend[1]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($b[$i])):?><td><?=$b[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>2<BR></td>
					<td><?=$csengrend[2]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($c[$i])):?><td><?=$c[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>3<BR></td>
					<td><?=$csengrend[3]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($d[$i])):?><td><?=$d[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>4<BR></td>
					<td><?=$csengrend[4]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($e[$i])):?><td><?=$e[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>5<BR></td>
					<td><?=$csengrend[5]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($f[$i])):?><td><?=$f[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>6<BR></td>
					<td><?=$csengrend[6]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($g[$i])):?><td><?=$g[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>7<BR></td>
					<td><?=$csengrend[7]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($h[$i])):?><td><?=$h[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>8<BR></td>
					<td><?=$csengrend[8]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($j[$i])):?><td><?=$j[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>9<BR></td>
					<td><?=$csengrend[9]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($k[$i])):?><td><?=$k[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		        <tr>
		        	<td>10<BR></td>
					<td><?=$csengrend[10]['kezdes']?> - <?=$csengrend[0]['vege']?></td>
		        	<?php for($i=1;$i<6;$i++):?>
					<?php if(isset($l[$i])):?><td><?=$l[$i]?></td><?php else:?><td><br><br></td><?php endif;?>
		        	<?php endfor;?>
		        </tr>
		    </table>
		</div>
	</BODY>
</HTML>		
