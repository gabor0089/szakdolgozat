<!DOCTYPE html>
<HTML lang="hu">
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
<div class="container">
<div class='text-center h1'>Órarend</div>
<div class='text-center col-sm-12'>
<?php foreach ($osztalyok as $o):?>
    <a href="<?php echo base_url();?>Admin/Orarend/<?=$o['osztalyid']?>">
  <?php if($alaposztalyid==$o['osztalyid']):?>
    <button class='btn btn-secondary'>
  <?php else:?>
    <button class='btn btn-primary'>  
  <?php endif;?>
<?=$o['osztalynev']?></button></a>
<?php endforeach;?>
</div>
<?php
          foreach ($orarend as $ora) 
          {
              $nap=$ora['milyennap'];
              $tanarnev=$ora['tanarnev'];
              $tantargy=$ora['tantargynev'];
              $terem=$ora['teremnev'];
              $oraid=$ora['oraid'];
              $osztalyid=5;
              $tantargyid=10;
            switch($ora['hanyadik_ora'])
            {
              //$a jelenti a 0. órát, $b az 1.-t stb.
              case 0:$a[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$a[$nap]['id']=$oraid;break;
              case 1:$b[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$b[$nap]['id']=$oraid;break;
              case 2:$c[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$c[$nap]['id']=$oraid;break;
              case 3:$d[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$d[$nap]['id']=$oraid;break;
              case 4:$e[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$e[$nap]['id']=$oraid;break;
              case 5:$f[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$f[$nap]['id']=$oraid;break;
              case 6:$g[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$g[$nap]['id']=$oraid;break;
              case 7:$h[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$h[$nap]['id']=$oraid;break;
              case 8:$j[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$j[$nap]['id']=$oraid;break;
              case 9:$k[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$k[$nap]['id']=$oraid;break;
              case 10:$l[$nap]['adat']=$tantargy."<BR>".$tanarnev."<BR>".$terem;$l[$nap]['id']=$oraid;break;
            }
          }
?>
        <div class="container">
        <table class="table table-striped table-sm">
        <tr class="row">
                <td class="col-sm-1"></td>
                <td class="col-sm-2">Hétfő</td>
                <td class="col-sm-2">Kedd</td>
                <td class="col-sm-2">Szerda</td>
                <td class="col-sm-2">Csütörtök</td>
                <td class="col-sm-2">Péntek</td>
            </tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>0<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($a[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$a[$i]['id']?>/<?=$alaposztalyid?>"><?=$a[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$a[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
                <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>1<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($b[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$b[$i]['id']?>/<?=$alaposztalyid?>"><?=$b[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$b[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>2<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($c[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$c[$i]['id']?>/<?=$alaposztalyid?>"><?=$c[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$c[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>3<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($d[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$d[$i]['id']?>/<?=$alaposztalyid?>"><?=$d[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$d[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>4<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($e[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$e[$i]['id']?>/<?=$alaposztalyid?>"><?=$e[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$e[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>5<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($f[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$f[$i]['id']?>/<?=$alaposztalyid?>"><?=$f[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$f[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>6<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($g[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$g[$i]['id']?>/<?=$alaposztalyid?>"><?=$g[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$g[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>7<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($h[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$i[$i]['id']?>/<?=$alaposztalyid?>"><?=$h[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$h[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>8<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($j[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$j[$i]['id']?>/<?=$alaposztalyid?>"><?=$j[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$j[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>9<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($k[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$k[$i]['id']?>/<?=$alaposztalyid?>"><?=$k[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$k[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
            <tr class='row'><td class='col-sm-1 text-center thick-border'>&nbsp<BR>10<BR>&nbsp</td><?php for($i=1;$i<6;$i++):?><?php if($l[$i]['adat']<>"<BR><BR>"):?>
                      <td class='col-sm-2 ora thick-border'><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$l[$i]['id']?>/<?=$alaposztalyid?>"><?=$l[$i]['adat']?></a></td>
                  <?php else:?><td class='col-sm-2 thick-border'>&nbsp<br><a href="<?php echo base_url();?>Admin/Orarend_mod/<?=$l[$i]['id']?>/<?=$alaposztalyid?>"><üres></a><br>&nbsp</td><?php endif;?>
              <?php endfor;?></tr>
        </table>
    </div>
<div class='row'><div class='col-sm-12 text-right'>
  <a href="<?php echo base_url();?>Admin/Orarend_letrehozas/<?=$alaposztalyid?>"><button class='btn btn-danger'>Órarend kiürítés</button></a>
</div></div>

</div>

</body>
</html>