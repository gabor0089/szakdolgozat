<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

    <div class="container-fluid">
      <div class='row'>
        <div class='col-sm-12 text-center h2'>Saját osztályom</div>
      </div>
      <div class="row">
        <div class='col-sm-6 text-right'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyJegyek'>
          <button class='btn btn-info'>Jegyek</button></a>
        </div>
        <div class='col-sm-6 text-left'><a href='<?php echo base_url();?>Osztalyfonok/SajatOsztalyHianyzasok'>
          <button class='btn btn-info'>Hiányzások</button></a>
        </div>
      </div>
      <div class="row">
        <div class='col-md-12'>A felső menüpontok linkek, gombok lesznek, ahonnan átmehet a hiányzásokra, vagy a jegyekre. Alapértelmezésben meg kell itt jelennie valamelyiknek, amit lehet változtatni. Tehát amelyikre kattint utoljára, az marad következő bejelentkezésnél is.</div>
      </div>
    </div>
</div>
</body>
</html>