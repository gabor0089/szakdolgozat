<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <script>   
      function showDiv() 
      {
        if(document.getElementById('ujtantargy').style.display == "block")
        {
          document.getElementById('ujtantargy').style.display = "none";
        }
        else
        {
          document.getElementById('ujtantargy').style.display = "block";
        } 
      }
      function ujtargybecsuk()
      {
        document.getElementById('ujtantargy').style.display = "none";
      }
    </script>

    </HEAD>
	<BODY onload='ujtargybecsuk()'>

<h2 class='text-center'>Tantárgyak</h2>
<div class="container">
  <a><button class='btn btn-info' onclick="showDiv()">Új hozzáadása</button></a>
   <table class="table bordered table-striped table-hover table-sm">
       	<tr class='row'>
          <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Tantargyak/nev'>Tantárgy neve</a></td>
          <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Tantargyak/osztaly'>Osztály</a></td>
          <td class='col-md-2'><a href='<?php echo base_url();?>Admin/Tantargyak/tanarnev'>Tanár</a></td>
          <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Tantargyak/oraszam'>Óraszám</a></td>
          <td class='col-md-1'><a href='<?php echo base_url();?>Admin/Tantargyak/fontossag'>Fontosság</a></td>
          </TR>
        <tr class='row bg-info' id='ujtantargy'>
        <?php echo form_open('Admin/Ujtantargy')?>
          <td class='col-md-2'><input type='text' class='form-control' name='tantargynev' value=''></td>
          <td class='col-md-1'><input type='text' class='form-control' name='osztalynev' value=''></td>
          <td class='col-md-2'><input type='text' class='form-control' name='tanarnev' value=''></td>
          <td class='col-md-1'><input type='text' class='form-control' name='oraszam' value=''></td>
          <td class='col-md-1'><input type='text' class='form-control' name='fontossag' value=''></td>
          <td class='col-md-4'><button class='btn btn-success'>Új tantárgy hozzáadása!</button></td>
        <?php echo form_close();?>
          </TR>
          
        <?php foreach($targyak as $lista):?>
          <?php echo form_open('Admin/Tantargyvaltozas');?>
          <tr class='row'>
          <td class='col-md-2'><input type='text' class='form-control' name='tantargynev' value='<?=$lista['nev']?>'></td>
          <td class='col-md-1'><input type='text' class='form-control' name='osztalynev' value='<?=$lista['osztalynev']?>'></td>
          <td class='col-md-2'><input type='text' class='form-control' name='tanarnev' value='<?=$lista['tanarnev']?>'></td>
          <td class='col-md-1'><input type='text' class='form-control' name='oraszam' value='<?=$lista['oraszam']?>'></td>
          <td class='col-md-1'><input type='text' class='form-control' name='fontossag' value='<?=$lista['fontossag']?>'></td>
          <input type='hidden' class='form-control' name='tantargyid' value='<?=$lista['tantargyid']?>'>
          <td class='col-md-2'><button class='btn btn-primary'>Mentés!</button></td>
          </TR>
          <?php echo form_close();?>
      <?php endforeach;?>
      </div>
      </table>
      
  </div>
</div>



</body>
</html>