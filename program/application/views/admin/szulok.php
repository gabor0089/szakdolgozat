<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
  <BODY>
    <h1 class='text-center'>Szülők</h1>
    <div class='container-fluid'>
      <a href='../Admin/Ujszulo' title='Új szülő felvitele'><button type='submit' class='btn btn-success'>+ Új szülő felvitele</button></a>
        <table class="table bordered table-striped table-hover table-sm">
          <tr class='row small'>
            <td class='col-md-1'><a href='../Admin/Szulok/name'>Név</a></TD>
            <TD class='col-md-1'><a href='../Admin/Szulok/dob'>Születési dátum</a></TD>
            <td class='col-md-1'><a href='../Admin/Szulok/szulhely'>Születési hely</TD>
            <td class='col-md-1'><a href='../Admin/Szulok/tel'>Telefonszám</TD>
            <td class='col-md-2'><a href='../Admin/Szulok/lakcim'>Lakcím</TD>
            <td class='col-md-2'><a href='../Admin/Szulok/email'>E-mail cím</TD>
            <td class='col-md-1'><a href='../Admin/Szulok/osztalyid'>Gyermekek</TD>
          </TR>
            <?php foreach($szuloklistaja as $lista):?>
          <tr class='row small'>
            <td class='col-md-1'><a href='../Admin/Szulo_mod0/<?=$lista[8]?>'><?=$lista[0]?></a></TD>
            <TD class='col-md-1'><?=$lista[1]?></TD>
            <td class='col-md-1'><?=$lista[2]?></TD>
            <TD class='col-md-1'><?=$lista[3][0].$lista[3][1]?>-<?=$lista[3][2].$lista[3][3]?> <?=$lista[3][4].$lista[3][5].$lista[3][6]?> <?=$lista[3][7].$lista[3][8].$lista[3][9].$lista[3][10]?></td>          
            <td class='col-md-2'><?=$lista[4]?> <?=$lista[5]?></TD>
            <td class='col-md-2'><?=$lista[6]?></TD>
            <td class='col-md-2'><?=$lista[7]?></TD>
          </TR>
            <?php endforeach;?>
        </table>
    </div>
  </body>
</html>