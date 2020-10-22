<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
  <BODY>
  <?php var_dump($szuloklistaja)?>
    <h1 class='text-center'>Szülők</h1>
    <div class='container-fluid'>
      <a href='../Admin/Ujszulo' title='Új szülő felvitele'><button type='submit' class='btn btn-success'>+ Új szülő felvitele</button></a>
        <table class="table bordered table-striped table-hover table-sm">
          <tr class='row small'>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Szulok/name'>Név</a></TD>
            <TD class='col-md-1'><a href='<?php echo base_url();?>Admin/Szulok/dob'>Születési dátum</a></TD>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Szulok/szulhely'>Születési hely</TD>
            <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Szulok/tel'>Telefonszám</TD>
            <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Szulok/lakcim'>Lakcím</TD>
            <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Szulok/email'>E-mail cím</TD>
          </TR>
            <?php foreach($szuloklistaja as $lista):?>
          <tr class='row small'>
            <td class='col-md-1'><a href='../Admin/Szulo_mod0/<?=$lista['userid']?>'><?=$lista['name']?></a></TD>
            <TD class='col-md-1'><?=$lista['dob']?></TD>
            <td class='col-md-1'><?=$lista['szulhely']?></TD>
            <TD class='col-md-1'><?=$lista['tel'][0].$lista['tel'][1]?>-<?=$lista['tel'][2].$lista['tel'][3]?> 
                <?=$lista['tel'][4].$lista['tel'][5].$lista['tel'][6]?> <?=$lista['tel'][7].$lista['tel'][8].$lista['tel'][9].$lista['tel'][10]?></td>          
            <td class='col-md-2'><?=$lista['irsz']?> <?=$lista['lakcim']?></TD>
            <td class='col-md-2'><?=$lista['email']?></TD>
            <td><a target="_blank" href='<?=base_url()?>Users/Ujuzenet/<?=$lista['userid']?>' title='<?=$lista[0]?>'><img src="<?php echo base_url();?>assets/img/boritek.png"></a></td>
          </TR>
            <?php endforeach;?>
        </table>
    </div>
  </body>
</html>