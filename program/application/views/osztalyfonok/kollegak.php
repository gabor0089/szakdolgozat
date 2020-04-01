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

    <div class="container">
      <div class="row">
        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/alapadatok'>
            <button class='btn btn-primary'>Iskola adatai</button>
          </a>
        </div>

        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/Kollegalista'>
            <button class='btn btn-primary'>Kollégák</button>
          </a>
        </div>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Osztalyfonok/Osztalynevsor'>
            <button class='btn btn-primary'>Osztályom</button>
          </a>
        </div>
      </div>
      <table class="table table-striped table-hover table-sm">
          <thead>
            <tr>
              <th scope="col">Név</th>
              <th scope="col">Születési idő</th>
              <th scope="col">Lakcím</th>
              <th scope="col"></th><th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=1;$i<count($kollegak);$i++):?>
              <tr class='sor'>
                <th scope="row"><?=$kollegak[$i]['name']?></th>
                <td><?=$kollegak[$i]['dob']?></td>
                <td><?=$kollegak[$i]['irsz']?> <?=$kollegak[$i]['lakcim']?></td>
                <td><a target="_blank" href="../uploads/<?=$kollegak[$i]['foto_link']?>">
                  <img width="40" src="../uploads/<?=$kollegak[$i]['foto_link']?>"></img>
                </a></td>
                <td><a target="_blank" href='<?=base_url()?>Users/Ujuzenet/<?=$kollegak[$i]['userid']?>'>Üzenet</a></td>
              </tr>
            <?php endfor;?>
          </tbody>
      </table>
    </div>
</body>
</html>