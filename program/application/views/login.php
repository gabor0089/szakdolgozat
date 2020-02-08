<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Bejelentkezés</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	</HEAD>
	<BODY class='hatter'>
<?PHP echo form_open('Users/login');?>
<div class="container-fluid vert_center">
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-2 bejelentkez"><h2 align='center'>Bejelentkezés</h2>
		</div>
		<div class="col-md-5">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
		</div>
		<div class="col-md-2 bejelentkez">
			<form role="form">
				<div class="form-group">
				<input type='text' name='username' class='form-control' autocomplete='off' value='' placeholder='Felhasználónév' autofocus required>
				</div>
				<div class="form-group">	
				<input type='password' name='password' class='form-control' autocomplete='off' value='' placeholder='Jelszó' required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">
					Bejelentkezés
				</button><br>
			</form>
		</div>
		<div class="col-md-5">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 bejelentkez2">
			Egy-kattintásos belépés <small>(későbbiekben törlésre kerül!)</small>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			Bogdán Orsolya<input type='hidden' name='username' value='bogdanorsolya'><input type='hidden' name='password' value='bogdanorsolya'><input type='submit' value='Adminisztrátor'>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			<input type='hidden' name='username' value='bogdanorsolya'><input type='hidden' name='password' value='bogdanorsolya'><input type='submit' disabled value='Igazgató'>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			<input type='hidden' name='username' value='bogdanorsolya'><input type='hidden' name='password' value='bogdanorsolya'><input type='submit' disabled value='Osztályfőnök'>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			Gál Vivien<input type='hidden' name='username' value='galvivien'><input type='hidden' name='password' value='galvivien'><input type='submit' value='Tanár'>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			Budai Roland<input type='hidden' name='username' value='budairoland'><input type='hidden' name='password' value='budairoland'><input type='submit' value='Diák'>
			<?PHP echo form_close();?>
			<?PHP echo form_open('Users/login');?>
			Szekeres Tünde<input type='hidden' name='username' value='szekerestunde'><input type='hidden' name='password' value='szekerestunde'><input type='submit' value='Szülő'>
			<?PHP echo form_close();?>
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-5">
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 bejelentkez2">
			<p>Bejelentkezéshez a felhasználónév/jelszó párosok:<BR>
				adminisztrátor: bogdanorsolya<BR>
				igazgató: ...fejlesztés alatt...<BR>
				osztályfőnök: ...fejlesztés alatt...<BR>
				tanár: galvivien<BR>
				diak: budairoland<BR>
				szulo: szekerestunde</p>
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-5">
		</div>
	</div>	
</div>
</body>
</html>