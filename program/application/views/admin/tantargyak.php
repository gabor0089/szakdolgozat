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
<div class="container">
   <table class="table bordered table-striped table-hover table-sm">
       	<tr class='row'>
          <td class='col-md-2'><a href='../Tantargyak/nev'>Tantárgy neve</a></td>
          <td class='col-md-1'><a href='../Tantargyak/osztaly'>Osztály</a></td>
          <td class='col-md-2'><a href='../Tantargyak/tanarnev'>Tanár</a></td>
          </TR>
          
        <?php foreach($targyak as $lista):?>
          <?php echo form_open('Admin/Tantargyvaltozas');?>
          <tr class='row'>
          <td class='col-md-2'><input type='text' class='form-control' name='tantargynev' value='<?=$lista['nev']?>'></td>
          <td class='col-md-1'><input type='text' class='form-control' name='osztalynev' value='<?=$lista['osztalynev']?>'></td>
          <td class='col-md-2'><input type='text' class='form-control' name='tanarnev' value='<?=$lista['tanarnev']?>'></td>
          <input type='hidden' class='form-control' name='tantargyid' value='<?=$lista['tantargyid']?>'>
          <td class='col-md-2'><button class='btn btn-primary'>Mentés!</button></td>
          </TR>
          <?php echo form_close();?>
      <?php endforeach;?>
      </div>
      </table>
      
  </div>
</div>


<?PHP echo form_close();?>

</body>
</html>