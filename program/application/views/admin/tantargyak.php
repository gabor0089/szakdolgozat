<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h2 class='text-center'>Tantárgyak<a href='../Admin/Ujtantargy' title='Új Tantárgy felvitele'>+</a></h2>
<div class="container-fluid">
  <div class="row">
      	<table border='1'>
      	
      	<div class="col-sm-3">
      	<?php foreach($targyak as $lista):?>
          <tr>
          <td><?=$lista['nev']?></td>
          <td><?=$lista['osztalynev']?></TD>
          <td><?=$lista['tanarnev']?></TD>
          </TR>
      <?php endforeach;?>
      </div>
      </table>
      
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>