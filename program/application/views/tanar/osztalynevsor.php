<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<div class='h2 text-center'>Adatok</div>

<div class="container-fluid">
  <div class="row">
        <div class='col-md-2'>
          <a href='<?=base_url()?>Tanar/alapadatok'>
            <button class='btn btn-primary'>Iskola adatai</button>
          </a>
        </div>

        <div class='col-md-2'>
          <a href='<?=base_url()?>Tanar/Kollegalista'>
            <button class='btn btn-primary'>Kollégák</button>
          </a>
        </div>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Tanar/Osztalylista'>
            <button class='btn btn-primary'>Tanított osztályok</button>
          </a>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-2'>&nbsp</div>
      </div> 

      <div class='row'>
      <?php foreach ($osztalyok as $osztaly) :?>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Tanar/osztalynevsor/<?=$osztaly['osztalyid']?>'>
            <button class='btn btn-primary'><?=$osztaly['osztalynev']?></button>
          </a>
        </div>
      <?php endforeach;?>  
      </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Név</th>
              <th scope="col">Születési idő</th>
              <th scope="col">TAJ-szám</th>
              <th scope="col">Telefonszám</th>
              <th scope="col">Lakcím</th>
              <th scope="col"></th><th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=1;$i<count($nevek);$i++):?>
              <tr>
                <th scope="row"><?=$i?>. <?=$nevek[$i]['name']?></th>
                <td><?=$nevek[$i]['dob']?></td>
                <td><?=$nevek[$i]['taj'][0].$nevek[$i]['taj'][1].$nevek[$i]['taj'][2]?>-<?=$nevek[$i]['taj'][3].$nevek[$i]['taj'][4].$nevek[$i]['taj'][5]?>-<?=$nevek[$i]['taj'][6].$nevek[$i]['taj'][7].$nevek[$i]['taj'][8]?></td>
                <td><?=$nevek[$i]['tel'][0].$nevek[$i]['tel'][1]?>-<?=$nevek[$i]['tel'][2].$nevek[$i]['tel'][3]?> <?=$nevek[$i]['tel'][4].$nevek[$i]['tel'][5]?><?=$nevek[$i]['tel'][6]." ".$nevek[$i]['tel'][7]?><?=$nevek[$i]['tel'][8].$nevek[$i]['tel'][9]?><?=$nevek[$i]['tel'][10]?></td>
                <td><?=$nevek[$i]['irsz']?> <?=$nevek[$i]['lakcim']?></td>
                <td><a target="_blank" href="../../uploads/<?=$nevek[$i]['foto_link']?>">
                  <img width="40" src="../uploads/<?=$nevek[$i]['foto_link']?>"></img>
                </a></td>
                <td><a target="_blank" href='<?=base_url()?>Users/Ujuzenet/<?=$nevek[$i]['userid']?>'>Üzenet</a></td>
              </tr>
            <?php endfor;?>
          </tbody>
        </table>
        <div class='row'><div class='col-md-2'>&nbsp</div></div>
      </div>
    </div>
</body>
</html>