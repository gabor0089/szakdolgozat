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
    <table class="table bordered table-striped table-hover table-sm">
    <tr class='row'><td class='col-md-2'><a href='../Admin/Ujdiak' title='Új diák felvitele'><button type='submit' class='btn btn-success'>+ Új diák felvitele</button></a></td>
                    <td class='col-md-2'><a href='../Admin/UjdiakExcel' title='Diákok importálása'><button type='submit' class='btn btn-warning'>^ Diákok importálása</button></a></td></tr>
      	   <tr class='row small'>
          <td class='col-md-1'>Név</TD>
          <TD class='col-md-1'>Születési dátum</TD>
          <td class='col-md-1'>Születési hely</TD>
          <TD class='col-md-1'>TAJ</TD>
          <td class='col-md-1'>Telefonszám</TD>
          <TD class='col-md-1'>Irányítószám</TD>
          <td class='col-md-2'>Lakcím</TD>
          <td class='col-md-2'>E-mail cím</TD>
          <td class='col-md-1'>Osztály</TD>
          <TD class='col-md-1'>Fotó</TD>
          </TR>
      
        <?php foreach($diakoklistaja as $lista):?>
          <tr class='row small'>
          <td class='col-md-1'><?=$lista[0]?></TD>
          <TD class='col-md-1'><?=$lista[1]?></TD>
          <td class='col-md-1'><?=$lista[2]?></TD>
          <TD class='col-md-1'><?=$lista[3][0].$lista[3][1].$lista[3][2]?>-<?=$lista[3][3].$lista[3][4].$lista[3][5]?>-<?=$lista[3][6].$lista[3][7].$lista[3][8]?></td>          
          <td class='col-md-1'><?=$lista[4][0].$lista[4][1]."-".$lista[4][2].$lista[4][3]." ".$lista[4][4].$lista[4][5].$lista[4][6]." ".$lista[4][7].$lista[4][8].$lista[4][9].$lista[4][10]?></TD>
          <TD class='col-md-1 text-right'><?=$lista[5]?></TD>
          <td class='col-md-2'><?=$lista[6]?></TD>
          <td class='col-md-1'><?=$lista[7]?></TD>
          <td class='col-md-1'><?=$lista[8]?></TD>
          <TD class='col-md-1'><a target="_blank" href="../uploads/<?=$lista[9]?>">Kép</a></TD>
          </TR>
      <?php endforeach;?>
      </div>
      </table>
      
      </div>
    </div>
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>