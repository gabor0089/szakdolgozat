<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>

<h1 class='kozepre'>Alapadatok</h1>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
			Az iskola neve: <input type='text' class='form-control' name='isnev' value='<?=$isnev?>' size='50' autocomplete='off' placeholder='Az iskola neve' readonly><br/>
            Igazgató neve: <input type='text' class='form-control' name='ignev' value='<?=$ignev?>'  autocomplete='off' placeholder='Igazgató neve' readonly><br/>
			Iskola címe: <input type='text' class='form-control' name='cim' value='<?=$cim?>' autocomplete='off' placeholder='Az iskola címe' readonly><br/>
			Aktuális tanév: <input type='text' class='form-control' name='ev' value='<?=$ev?>' autocomplete='off' placeholder='Aktuális tanév' readonly><br/>
			</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>