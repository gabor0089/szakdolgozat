<!DOCTYPE html>
<HTML lang="hu">
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
<div class="container">
<div class='text-center h1'>Alap adatok módosítása</div>
<?PHP echo form_open('Admin/alapadatok');?>
  <div class="row">
    <div class="col-md-2 col-sm-6">
      Az iskola neve
    </div>
    <div class="col-md-5 col-sm-6">
      <input type='text' class='form-control' name='isnev' value='<?=$isnev?>' size='50' autocomplete='off' placeholder='Az iskola neve' required>
    </div>
    <div class="col-md-5">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      Az igazgató neve
    </div>
    <div class="col-md-5">
      <input type='text' class='form-control' name='ignev' value='<?=$ignev?>'  autocomplete='off' placeholder='Igazgató neve' required><br/>
    </div>
    <div class="col-md-5">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      Iskola címe
    </div>
    <div class="col-md-5">
      <input type='text' class='form-control' name='cim' value='<?=$cim?>' autocomplete='off' placeholder='Az iskola címe' required><br/>
    </div>
    <div class="col-md-5">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      Aktuális tanév
    </div>
    <div class="col-md-5">
      <input type='text' class='form-control' name='ev' value="<?=$ev?>/<?=$ev+1?>" autocomplete='off' placeholder='Aktuális tanév' required><br/>
    </div>
    <div class="col-md-5">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      Év végi lezárás
    </div>
    <div class="col-md-2">
      <input type='date' class='form-control' name='evvegedatum' value='<?=$evvegedatum?>' autocomplete='off' required>
    </div>
    <div class="col-md-2">
      <input type='time' class='form-control' name='evvegeido' value='<?=$evvegeido?>' autocomplete='off' required>
    </div>
    <div class="col-md-5">
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      Érettségi
    </div>
    <div class="col-md-2">
      <input type='date' class='form-control' name='erettsegidatum' value='<?=$erettsegidatum?>' autocomplete='off' required>
    </div>
    <div class="col-md-2">
      <input type='time' class='form-control' name='erettsegiido' value='<?=$erettsegiido?>' autocomplete='off' required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-5">
      <button type='submit' class='btn btn-primary btn-block'>Mentés</button>
    </div>
  </div>
<?PHP echo form_close();?>
</div>
</body>
</html>