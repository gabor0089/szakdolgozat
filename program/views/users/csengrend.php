<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
	<BODY>
		<h1 class='text-center'>Csengetési rend</h1>
		<div class="container">
		    <table class="table table-striped">
				<?php foreach ($datas as $data):?>
		        <tr class="row">
		            <td class="col-sm-1"><?=$data['ora']?>. óra</td>
		            <td class="col-sm-3"><?=$data['kezdes']?> - <?=$data['vege']?></td>
		        </tr>
		    	<?php endforeach;?>
		    </table>
		</div>
	</body>
</html>