<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<div class='h2 text-center'>Dolgozatok</div>

<div class="container">
  <div class="row">
    <table class="table table-striped table-hover table-sm">
          <tr class='row'><td><button class='btn btn-primary' onclick='ujdolg()'>Új dolgozat</button></td></tr>
            <tr class='row'>
              <th class="col-md-3">Tantárgy</th>
              <th class="col-md-3">Dátum</th>
              <th class="col-md-3">Dolgozat címe</th>
            </tr>
          <tbody>
          <tr class='row' id='ujdolg' style="display:none;">
          <?PHP echo form_open('Tanar/dolgozatkesz');?>
          <?php
          $tantargyak=[
            '1'=>'angol',
            '2'=>'matek'
          ];
          ?>
              <td class='col-md-3'><SELECT name='tantargyid' class='form-control'>
              <?php foreach ($tantargyak as $t=>$value):?>
               <OPTION value='<?=$t?>'><?=$value?></OPTION> 
              <?php endforeach;?>
              </SELECT></td>  
              <td class='col-md-2'><input type='date' class='form-control' name='datum'></td>
              <td class='col-md-1'><input type='time' class='form-control' name='ido'></td>  
              <td class='col-md-3'><input type='text' class='form-control' name='dolgozatcim'></td>
              <td class='col-md-1'><input type='submit' class='btn btn-primary'></td>
              <?php echo form_close();?>
            </tr>
          <?php foreach ($dolgozatok as $dolg):?>
            <tr class='row'>
              <td class='col-md-3'><?=$dolg['tantargynev']?></td>  
              <td class='col-md-2'><?=$dolg['datum']?></td>  
              <td class='col-md-3'><?=$dolg['dolgozatcim']?></td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
        <div class='row'><div class='col-md-2'>&nbsp</div></div>
      </div>
    </div>
<script>
    function ujdolg() 
    {
      if(document.getElementById('ujdolg').style.display == "block")
      {
        document.getElementById('ujdolg').style.display = "none";
      }
      else
      {
        document.getElementById('ujdolg').style.display = "block";
      } 
    }

</script>

</body>
</html>