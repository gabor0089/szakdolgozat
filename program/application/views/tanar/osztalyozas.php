<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Osztályozás</H1>
		<div class='row'>
			<div class='col-md-1'>
				&nbsp
			</div>
	        <div class='col-md-2'>
	          <a>
	            <button class='btn btn-secondary' diabled onclick="showDivX()">Csoportos/Egyéni jegyadás</button>
	          </a>
	        </div>
		</div>
		<?PHP //echo form_open('tanar/ujjegyadas')?>      
		<?PHP echo form_open('tanar/jegyek_csoportos')?>      
		<div class='row' id='csopjegy' style="display:none;">
			<div class='col-md-1'>
				&nbsp
			</div>
			<div class='col-md-3 form-group'>
	          <SELECT name='dolgozat' class='form-control'><OPTION>1. Témazáró</OPTION><OPTION>2. Témazáró</OPTION></SELECT>
			</div>
			<div class='col-md-3 form-group'>
				<SELECT name='tema' class='form-control'><OPTION>Szódolgozat</OPTION><OPTION>Órai munka</OPTION></SELECT>
			</div>			
			<div class='col-md-3 form-group'>
				<SELECT name='osztaly' class='form-control'><OPTION>9/A</OPTION><OPTION>9/B</OPTION></SELECT>
			</div>
			<div class='col-md-1 form-group'>
				<button type='submit' class='form-control btn btn-primary'>Listázás</button>
			</div>
		</div>
			<?php echo form_close();?>
		<div class='row' id='egyenjegy' style="display:block;">
		<?PHP echo form_open('tanar/jegyek_egyeni')?>
			<div class='col-md-1'>
				&nbsp
			</div>
			<div class='col-md-3'>
				<div class='form-group'>
					<input type='text' class='form-control' oninput='updateResult(this.value)' placeholder='Diák neve...' autocomplete='off' autofocus><BR>
		 			<SELECT id='result-list' name='diak' size='10' required></SELECT>
				</div>
			</div>
			<div class='col-md-3'>
				<div class='form-group'>
					<input type='text' class='form-control' oninput='updateResult2(this.value)' placeholder='Tantárgy...' autocomplete='off'><BR>
					<SELECT id='result-list2' name='tantargy' size='10' required></SELECT>
				</div>
			</div>
			<div class='col-md-2'>
				<div class='form-group'>
					<button type='submit' class='btn btn-primary btn-block'>Megtekintés</button>
				</div>
			</div><?PHP echo form_close();?>

		</div>
<?php
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '1024');
ini_set('xdebug.var_display_max_data', '1024');
$diakokuj=array();
for ($i=0; $i < count($diakok); $i++) {
	if(isset($diakok[$i])) 
		$diakokuj[]=$diakok[$i];
}
$tantargyakuj=array();
for ($i=0; $i < count($tantargyak); $i++) {
	if(isset($tantargyak[$i])) 
		$tantargyakuj[]=$tantargyak[$i];
}

/////////////////////////////////////////////////////////////////
$js_array = json_encode($diakokuj);
echo "<script>";
echo "var javascript_array = ".$js_array. ";";
echo "</script>";

$js_array2 = json_encode($tantargyakuj);
echo "<script>";
echo "var javascript_array2 = ".$js_array2. ";";
echo "</script>";
?>
	        </div>		
		</div>
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
			}
			)
		}
		)
	}
	function updateResult2(query)
	{
		let resultList2 = document.querySelector("#result-list2");
		resultList2.innerHTML = "";
		javascript_array2.map(function(algo)
		{
			query.split(" ").map(function (word)
			{
				if(algo.toLowerCase().indexOf(word.toLowerCase()) != -1)
				{
					resultList2.innerHTML += `<OPTION>${algo}</OPTION>`;
				}
			}
			)
		}
		)
	}
    function showDiv() 
    {
      if(document.getElementById('csopjegy').style.display == "block")
      {
        document.getElementById('csopjegy').style.display = "none";
        document.getElementById('egyenjegy').style.display = "block";
      }
      else
      {
        document.getElementById('csopjegy').style.display = "block";
        document.getElementById('egyenjegy').style.display = "none";

      } 
    }

</script>
	</body>
</Html>