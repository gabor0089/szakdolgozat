<!DOCTYPE html>
<HTML>
  <HEAD>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
  <BODY>

<h1 class='text-center'>Új szülő felvitele</h1>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
      <?PHP echo form_open_multipart('Admin/ujszulo');?>
      <?php 
        if($feltoltes!='sikertelen!') 
        {
          echo "A felvitel ".$feltoltes."<BR>";
        }
      ?>
      Név <input type='text' class='form-control' name='nev' value='' size='50' autocomplete='off' autofocus placeholder='Név' required>
      Születési idő <input type='date' class='form-control' name='szulido' value=''  autocomplete='off' placeholder='Születési idő' >
      Születési hely <input type='text' class='form-control' name='szulhely' value='' autocomplete='off' placeholder='Születési hely' >
      Telefonszám <input type='text' class='form-control' name='tel' value='' autocomplete='off' placeholder='Telefonszám' >
      Irányítószám <input type='text' class='form-control' name='irsz' value='' autocomplete='off' placeholder='Irányítószám' >
      Lakcím <input type='text' class='form-control' name='lakcim' value='' autocomplete='off' placeholder='Lakcím'>
      Gyermek<input type='text' class='form-control' oninput='updateResult(this.value)' name='diaknev' placeholder='Diák neve...' autocomplete='off'>
 <SELECT id='result-list' name='diak' size='4' multiple required>
 </SELECT>

      <button type='submit' class='btn btn-primary btn-block'>Mentés</button>
          </div>
      </div>
    </div>
  </div>
</div>


<?PHP echo form_close();
$php_array=array();
foreach ($diakok_nevei as $diak)
{
    $php_array[]=$diak;
}
$js_array = json_encode($php_array);
echo "<script>";
echo "var javascript_array = ".$js_array. ";";
echo "</script>";
?>
<script>
  function updateResult(query)
  {
      let resultList = document.querySelector("#result-list");
      resultList.innerHTML = "";
      javascript_array.map(function(algo)
      {
        query.split(" ").map(function (word)
        {
          if(algo.toLowerCase().indexOf(word.toLowerCase()) != -1)
          {
            resultList.innerHTML += `<OPTION>${algo}</OPTION>`;
          }
        })
      })
  }
</script>


</body>
</html>