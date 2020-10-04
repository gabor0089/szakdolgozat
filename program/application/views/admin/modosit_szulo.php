<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
       <script>   
      function ujgyerekkinyit() 
      {
        if(document.getElementById('ujgyerek').style.display == "block")
        {
          document.getElementById('ujgyerek').style.display = "none";
        }
        else
        {
          document.getElementById('ujgyerek').style.display = "block";
        } 
      }
      function ujgyerekbecsuk()
      {
        document.getElementById('ujgyerek').style.display = "none";
      }
      </script>
      <?php 
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

    </HEAD>
	<BODY onload='ujgyerekbecsuk()'>

<h2 class='text-center'>Szülő adatainak módosítása</h2>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-md-6">
			<?PHP echo form_open('Admin/Szulo_mod');?>
			<?php foreach ($szulokadatai as $szulokadatai):?>
			<input type='hidden' name='userid' value='<?=$szulokadatai['userid']?>'>
            Név <input type='text' class='form-control' name='name' value='<?=$szulokadatai['name']?>' size='50' autocomplete='off' placeholder='Név' required>
            Születési idő <input type='date' class='form-control' name='dob' value='<?=$szulokadatai['dob']?>' autocomplete='off' placeholder='Születési idő' >
			Születési hely <input type='text' class='form-control' name='szulhely' value='<?=$szulokadatai['szulhely']?>' autocomplete='off' placeholder='Születési hely' >
			TAJ szám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='taj' value='<?=$szulokadatai['taj']?>' autocomplete='off' placeholder='TAJ szám' >
			Telefonszám (kötőjelek és szóköz nélkül)<input type='text' class='form-control' name='tel' value='<?=$szulokadatai['tel']?>' autocomplete='off' placeholder='Telefonszám' >
			Irányítószám <input type='text' class='form-control' name='irsz' value='<?=$szulokadatai['irsz']?>' autocomplete='off' placeholder='Irányítószám' >
			Lakcím <input type='text' class='form-control' name='lakcim' value='<?=$szulokadatai['lakcim']?>' autocomplete='off' placeholder='Lakcím' >
			Email <input type='text' class='form-control' name='email' value='<?=$szulokadatai['email']?>' autocomplete='off' placeholder='Email cím' >
			<?php echo form_close();?>
		<?php endforeach;?>
			Gyerek<?php $db=count($gyerekek);?><?php if($db>1):?>ek<?php endif;?>:
		<?php for ($i=0;$i<count($gyerekek)-1;$i++):?>
				<a href='<?php echo base_url();?>Admin/Diak_mod0/<?=$gyerekek[$i]['userid']?>'><?=$gyerekek[$i]['name']?></a>, 	
			<?php endfor;?>
			<a href='<?php echo base_url();?>Admin/Diak_mod0/<?=$gyerekek[count($gyerekek)-1]['userid']?>'><?=$gyerekek[$i]['name']?></a>
			<button class='btn btn-warning' onclick="ujgyerekkinyit()">Új gyerek hozzáadása</button>
			<BR>
			<div id='ujgyerek'>
				<?php echo form_open('Admin/Gyerekhozzaad');?>
				     Gyermek<input type='text' class='form-control' oninput='updateResult(this.value)' name='diaknev' placeholder='Diák neve...' autocomplete='off'>
 					<SELECT id='result-list' name='diak' size='4' multiple required>
 					</SELECT><BR>
 					<input type='hidden' name='szuloid' value='<?=$szulokadatai['userid']?>'>
 					<button type='submit' class='btn btn-success'>Kész</button></a>
 				<?php form_close();?>
			</div>
			<button type='submit' class='btn btn-primary btn-block'>Módosít!</button>
			
          </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>