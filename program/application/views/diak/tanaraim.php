<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<div class='h2 text-center'>Tanáraim</div>

<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class='row'>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Diak/alapadatok'>
             <button class='btn btn-primary'>Iskola adatai</button>
          </a>
        </div>

        <div class='col-md-2'>
          <a href='<?=base_url()?>Diak/Tanaraim'>
            <button class='btn btn-primary'>Tanáraim</button>
          </a>
        </div>
        <div class='col-md-2'>
          <a href='<?=base_url()?>Diak/Osztalyom'>
            <button class='btn btn-primary'>Osztályom</button>
          </a>
        </div>
      </div>
              <table class="table">
          <thead>
            <tr>
              <th scope="col">Név</th>
              <th scope="col">Telefon</th>
              <th scope="col">Lakcím</th>
              <th scope="col"></th><th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=1;$i<count($tanaraim);$i++):?>
              <tr class='sor'>
                <th scope="row"><?=$tanaraim[$i]['name']?></th>
                <td><?=$tanaraim[$i]['tel']?></td>
                <td><?=$tanaraim[$i]['irsz']?> <?=$tanaraim[$i]['lakcim']?></td>
                <td><a target="_blank" href="../uploads/<?=$tanaraim[$i]['foto_link']?>">
                  <img width="40" src="../uploads/<?=$tanaraim[$i]['foto_link']?>"></img>
                </a></td>
                <td><a target="_blank" href='<?=base_url()?>Users/Ujuzenet/<?=$tanaraim[$i]['userid']?>'>Üzenet</a></td>
              </tr>
            <?php endfor;?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>