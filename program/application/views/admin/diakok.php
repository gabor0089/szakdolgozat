<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
    <h1 class='text-center'>Diákok</h1>
    <div class='container-fluid'>
      <a href='../Admin/Ujdiak' title='Új diák felvitele'><button type='submit' class='btn btn-success'>+ Új diák felvitele</button></a>
        <table class="table bordered table-striped table-hover table-sm">
          <tr class='row small'>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/name'>Név</a></TD>
            <TD class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/dob'>Születési dátum</a></TD>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/szulhely'>Születési hely</TD>
            <TD class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/taj'>TAJ</TD>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/tel'>Telefonszám</TD>
            <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Diakok/lakcim'>Lakcím</TD>
            <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Diakok/email'>E-mail cím</TD>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Diakok/osztalyid'>Osztály</TD>
            <TD class='col-md-1'>Fotó</TD>
          </TR>
            <?php foreach($diakoklistaja as $lista):?>
          <tr class='row small'>
            <td class='col-md-1'><a href='../Admin/Diak_mod0/<?=$lista[10]?>'><?=$lista[0]?></a></TD>
            <TD class='col-md-1'><?=$lista[1]?></TD>
            <td class='col-md-1'><?=$lista[2]?></TD>
            <TD class='col-md-1'><?=$lista[3][0].$lista[3][1].$lista[3][2]?>-<?=$lista[3][3].$lista[3][4].$lista[3][5]?>-<?=$lista[3][6].$lista[3][7].$lista[3][8]?></td>          
            <td class='col-md-1'><?=$lista[4][0].$lista[4][1]."-".$lista[4][2].$lista[4][3]." ".$lista[4][4].$lista[4][5].$lista[4][6]." ".$lista[4][7].$lista[4][8].$lista[4][9].$lista[4][10]?></TD>
            <td class='col-md-2'><?=$lista[5]?> <?=$lista[6]?></TD>
            <td class='col-md-2'><?=$lista[7]?></TD>
            <td class='col-md-1'><?=$lista[8]?></TD>
            <TD class='col-md-1'><a target="_blank" href="../uploads/<?=$lista[9]?>">Kép</a></TD>
            <td><a target="_blank" href='<?=base_url()?>Users/Ujuzenet/<?=$lista[10]?>' title='<?=$lista[0]?>'><img src="<?php echo base_url();?>assets/img/boritek.png"></a>
          </TR>
            <?php endforeach;?>
        </table>
    </div>
  </body>
</html>