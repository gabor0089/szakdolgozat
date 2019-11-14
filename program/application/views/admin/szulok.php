<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h1 class='text-center'>Szülők<a href='../Admin/Ujszulo' title='Új szülő felvitele'>+</a></h1>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
      	<table border='1' style='1px'>
      	
      	<div class="col-sm-3">
      	<?php foreach($szuloklistaja as $lista):?>
          <tr>
          <td><?=$lista[0]?></TD>
          <TD><?=$lista[1]?></TD>
          <td><?=$lista[2]?></TD>
          <TD><?=$lista[3]?></TD>
          <td><?=$lista[4]?></TD>
          <TD><?=$lista[5]?></TD>
          <td><?=$lista[6]?></TD>
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