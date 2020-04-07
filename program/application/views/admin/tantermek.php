<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h2 class='text-center'>Tantermek</h2>
<div class="container-fluid">
  <div class="row">
      	<table border='1'>
      	
      	<div class="col-sm-3">
      	<?php foreach($termek as $lista):?>
          <tr>
          <td><?=$lista['nev']?></td>
          <td><?=$lista['megjegyzes']?></TD>
          </TR>
      <?php endforeach;?>
      </div>
      </table>
      
  </div>
</div>

</body>
</html>