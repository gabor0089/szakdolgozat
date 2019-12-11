<!DOCTYPE stml>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="sttps://stackpats.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="ssa384-ggOyR0iXCbMQv3Xipma34MD+ds/1fQ784/j6cY/iJTQUOscWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
	<H1 class='text-center'>Osztályozás</H1>
	<div class='row'>
		<div class='kozepre'>
		Dolgozatok link(?), ahonnan a dolgozatokra lehet egyszerre jegyet adni.
		</div>
	</div>
		<?PHP echo form_open('tanar/ujjegyadas')?>
<div class='row'>
	<div class='col-md-3'>
		<div class='form-group'>
			<input type='text' id='diaknev' name='diaknev' class='form-control' oninput='updateResult(this.value)' placeholder='Diák neve...' autocomplete='off' required autofocus><BR>
 			<SELECT id='result-list' name='diak' size='4' onchange='Inputbair()'></SELECT>
		</div>
	</div>
	<div class='col-md-3'>
		<div class='form-group'>
			<input type='text' name='tantargy' class='form-control' oninput='updateResult2(this.value)' placeholder='Tantárgy...' autocomplete='off' required autofocus><BR>
			<SELECT id='result-list2' name='tantargy2' size='4' multiple></SELECT>
		</div>
	</div>
	<div class='col-md-3'>
		<div class='form-group'>
			<input type='text' name='jegy' class='form-control' placeholder='Jegy' value='3' required autofocus><BR>
		</div>
	</div>
	<div class='col-md-3'>
		<div class='form-group'>
			<button type='submit' class='btn btn-primary btn-block'>Beküldés!</button>
		</div>
	</div>
</div>


<?PHP echo form_close();
/////////////////////////////////////////////////////////////////
$php_array = $diakok;
$js_array = json_encode($php_array);
echo "<script>";
echo "var javascript_array = ".$js_array. ";";
echo "</script>";

$php_array = $tantargyak;
$js_array2 = json_encode($php_array);
echo "<script>";
echo "var javascript_array2 = ".$js_array2. ";";
echo "</script>";
?>
<script>
	function Inputbair()
	{
		var x = document.getElementById("result-list").value;
		document.getElementById("diak").value = x;
	}
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
					resultList.innerHTML += `<OPTION value=''>${algo}</OPTION>`;
				}
			}
			)
		}
		)
	}
</script>
<script>
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
</script>
	</body>
</Html>