<!DOCTYPE html>
<HTML lang="hu">
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<script>
      function tantargymegnyit() {
        if(document.getElementById('tantargyak').style.display == "block"){
          document.getElementById('tantargyak').style.display = "none";}
        else{document.getElementById('tantargyak').style.display = "block";}}
      function teremmegnyit() {
        if(document.getElementById('terem').style.display == "block"){
          document.getElementById('terem').style.display = "none";}
        else{document.getElementById('terem').style.display = "block";}}
      function tanarmegnyit() {
        if(document.getElementById('tanarok').style.display == "block"){
          document.getElementById('tanarok').style.display = "none";}
        else{document.getElementById('tanarok').style.display = "block";}}
      function mindbecsuk()
      {
        document.getElementById('tantargyak').style.display = "none";
        document.getElementById('terem').style.display = "none";
        document.getElementById('tanarok').style.display = "none";
      }
    </script>

    </HEAD>
	<BODY onload='mindbecsuk()'>
<div class="container">
  <div class='text-center h1'>Óra módosítása</div>
  <div class='row'>
    <?php
    switch($orarend[0]['milyennap'])
    {
      case 1: $nap="Hétfő";break;
      case 2: $nap="Kedd";break;
      case 3: $nap="Szerda";break;
      case 4: $nap="Csütörtök";break;
      case 5: $nap="Péntek";break;
    }
  $hidden=['oraid'=>$orarend[0]['oraid']];
    ?>
    <div class='col-sm-1'><?=$nap?></div>
    <div class='col-sm-1'><?=$orarend[0]['hanyadik_ora']?>. óra</div>
    <div class='col-sm-2'><a href='#' onclick='tantargymegnyit()'>Tantárgy: <?=$orarend[0]['tantargynev']?></a></div>
    <div class='col-sm-2'><a href='#' onclick='teremmegnyit()'>Terem: <?=$orarend[0]['teremnev']?></a></div>
    <div class='col-sm-2'><a href='#' onclick='tanarmegnyit()'>Tanár: <?=$orarend[0]['tanarnev']?></a></div>
    <div class='col-sm-2'><a href="<?php echo base_url();?>Admin/Ora_torol/<?=$orarend[0]['oraid']?>"><button class='btn btn-danger'>Töröl</button></a></div>
  </div><BR>
  <div class='row' id='tantargyak'>

    <?php foreach ($tantargyak as $targy):?>
        <?php echo form_open('Admin/Orarend_ora_kesz','',$hidden);?>
          <input type='hidden' name='targy' value='<?=$targy['tantargyid']?>'>
          <div class='col-sm-6'><button type='submit' class='btn btn-primary'><?=$targy['nev']?></button></div>
        <?php echo form_close();?>
    <?php endforeach;?>
  </div>

  <div class='row' id='terem'>
    <?php foreach ($terem as $t):?>
      <?php echo form_open('Admin/Orarend_ora_kesz','',$hidden);?>
          <input type='hidden' name='terem' value='<?=$t['teremid']?>'>
          <div class='col-sm-2'><button type='submit' class='btn btn-primary'><?=$t['nev']?></button></div>
      <?php echo form_close();?>
    <?php endforeach;?>
  </div>
  
  <div class='row' id='tanarok'>
    <?php foreach ($tanarok as $tan):?>
      <?php echo form_open('Admin/Orarend_ora_kesz','',$hidden);?>
          <input type='hidden' name='tanar' value='<?=$tan['userid']?>'>
          <div class='col-sm-2'><button type='submit' class='btn btn-primary'><?=$tan['name']?></button></div>
      <?php echo form_close();?>
    <?php endforeach;?>
  </div>
</div>
</body>
</html>