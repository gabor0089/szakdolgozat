<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h2 class='text-center'>Új tanterem</h2>
<div class="container">
      <?php echo form_open('Admin/Ujteremkesz');?>
        <div class='row'>
          <div class='col-md-1'>Név:</div>
          <div class='col-md-1 form-group'><?php echo form_input('nev');?></div>
        </div>
        <div class='row'>
          <div class='col-md-1'>Megjegyzés:</div>
          <div class='col-md-1 form-group'><?php echo form_input('megjegyzes');?></div>
        </div>
        <div class='row'>
          <div class='col-md-2'><button type='submit' class='btn btn-success'>Mentés</button></div>
          </div>
      <?php echo form_close();?>    
  </div>
</body>
</html>