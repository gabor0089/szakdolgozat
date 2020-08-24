<!DOCTYPE html>
<HTML>
	<HEAD>
		<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <script>
    function Magyarjegy()
    {
        var a=document.getElementById('magyarszazalek').value;
        if(a<20){document.getElementById('magyarjegy').value = "1";}
        else if(a>=20 && a<40){document.getElementById('magyarjegy').value = "2";}   
        else if(a>=40 && a<60){document.getElementById('magyarjegy').value = "3";}   
        else if(a>=60 && a<80){document.getElementById('magyarjegy').value = "4";}   
        else if(a>=80 && a<=100){document.getElementById('magyarjegy').value = "5";}   
    }
    function Matekjegy()
    {
        var a=document.getElementById('matekszazalek').value;
        if(a<20){document.getElementById('matekjegy').value = "1";}
        else if(a>=20 && a<40){document.getElementById('matekjegy').value = "2";}   
        else if(a>=40 && a<60){document.getElementById('matekjegy').value = "3";}   
        else if(a>=60 && a<80){document.getElementById('matekjegy').value = "4";}   
        else if(a>=80 && a<=100){document.getElementById('matekjegy').value = "5";}   
    }
    function Torijegy()
    {
        var a=document.getElementById('toriszazalek').value;
        if(a<20){document.getElementById('torijegy').value = "1";}
        else if(a>=20 && a<40){document.getElementById('torijegy').value = "2";}   
        else if(a>=40 && a<60){document.getElementById('torijegy').value = "3";}   
        else if(a>=60 && a<80){document.getElementById('torijegy').value = "4";}   
        else if(a>=80 && a<=100){document.getElementById('torijegy').value = "5";}   
    }
    function Nyelvjegy()
    {
        var a=document.getElementById('nyelvszazalek').value;
        if(a<20){document.getElementById('nyelvjegy').value = "1";}
        else if(a>=20 && a<40){document.getElementById('nyelvjegy').value = "2";}   
        else if(a>=40 && a<60){document.getElementById('nyelvjegy').value = "3";}   
        else if(a>=60 && a<80){document.getElementById('nyelvjegy').value = "4";}   
        else if(a>=80 && a<=100){document.getElementById('nyelvjegy').value = "5";}   
    }
    function Szabvaljegy()
    {
        var a=document.getElementById('szabszazalek').value;
        if(a<20){document.getElementById('szabjegy').value = "1";}
        else if(a>=20 && a<40){document.getElementById('szabjegy').value = "2";}   
        else if(a>=40 && a<60){document.getElementById('szabjegy').value = "3";}   
        else if(a>=60 && a<80){document.getElementById('szabjegy').value = "4";}   
        else if(a>=80 && a<=100){document.getElementById('szabjegy').value = "5";}   
    }

    </script>
    </HEAD>
	<BODY>
<div class="container">
  <div class='h2 text-center'>Érettségi eredmények</div><BR>
  <?php
  if(isset($erettsegiadatok))
    {
        $magyarszazalek=$erettsegiadatok['magyarszazalek'];
        $matekszazalek=$erettsegiadatok['matekszazalek'];
        $toriszazalek=$erettsegiadatok['toriszazalek'];
        $nyelvszazalek=$erettsegiadatok['nyelvszazalek'];
        $szabvalszazalek=$erettsegiadatok['szabvalszazalek'];
    }
    else
    {
        $magyarszazalek="";
        $matekszazalek="";
        $toriszazalek="";
        $nyelvszazalek="";
        $szabvalszazalek="";    
    }    
    $hidden = ['userid' => $userid];
    echo form_open('Osztalyfonok/erettsegikesz','',$hidden);?>
  <table class='table table-sm borderless'>
    <tr class='row'>
        <td class='col-md-3 text-center font-weight-bold lead'><?=$diaknev?></td>
        <td class='col-md-2 text-center'>szint</td>
        <td class='col-md-1 text-center '>Százalék</td>
        <td class='col-md-1 text-center '>Érdemjegy</td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>Magyar nyelv és irodalom</td>
        <td class='col-md-2 text-center'>
        <input type='radio' class='erettsegikozep' name='magyar' id='magyark' value='kozep' checked="checked"> <label for='magyark'>középszint</label><BR>
        <input type='radio' class='erettsegiemelt' name='magyar' id='magyare' value='emelt'>  <label for='magyare'>emeltszint</label></td>
        <td class='col-md-1'><input type='text' class='form-control' id='magyarszazalek' name='magyarszazalek' value='<?=$magyarszazalek?>' OnChange='Magyarjegy()' size='2' maxlength='3'></td>
        <td class='col-md-1'><input type='text' class='form-control' id='magyarjegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>Matematika</td>
        <td class='col-md-2 text-center'>
        <input type='radio' class='erettsegikozep' name='matek' id='matekk' value='kozep' checked="checked"> <label for='matekk'>középszint</label><BR>
        <input type='radio' class='erettsegiemelt' name='matek' id='mateke' value='emelt'>  <label for='mateke'>emeltszint</label></td>
        <td class='col-md-1'><input type='text' class='form-control' id='matekszazalek' name='matekszazalek' value='<?=$matekszazalek?>' OnChange='Matekjegy()' size='2' maxlength='3'></td>
        <td class='col-md-1'><input type='text' class='form-control' id='matekjegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>Történelem</td>
        <td class='col-md-2 text-center'>
        <input type='radio' class='erettsegikozep' name='tori' id='torik' value='kozep' checked="checked"> <label for='torik'>középszint</label><BR>
        <input type='radio' class='erettsegiemelt' name='tori' id='torie' value='emelt'>  <label for='torie'>emeltszint</label></td>
        <td class='col-md-1'><input type='text' class='form-control' id='toriszazalek' name='toriszazalek' value='<?=$toriszazalek?>' size='2' OnChange='Torijegy()' maxlength='3'></td>
        <td class='col-md-1'><input type='text' class='form-control' id='torijegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>Idegen nyelv 
        <SELECT name='idegennyelv' class='form-control'>
            <OPTION>angol</OPTION>
            <OPTION>német</OPTION>
            <OPTION>francia</OPTION>
            <OPTION>spanyol</OPTION>
        </SELECT>
        </td>
        <td class='col-md-2 text-center'>
        <input type='radio' class='erettsegikozep' name='nyelv' id='nyelvk' value='kozep' checked="checked"> <label for='nyelvk'>középszint</label><BR>
        <input type='radio' class='erettsegiemelt' name='nyelv' id='nyelve' value='emelt'>  <label for='nyelve'>emeltszint</label></td>
        <td class='col-md-1'><input type='text' class='form-control' id='nyelvszazalek' name='nyelvszazalek' value='<?=$nyelvszazalek?>' size='2' OnChange='Nyelvjegy()' maxlength='3'></td>
        <td class='col-md-1'><input type='text' class='form-control' id='nyelvjegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>
            <SELECT name='szabval' class='form-control'>
                <OPTION>Szabadon választott tantárgy</OPTION>
                <OPTION>informatika</OPTION>
                <OPTION>földrajz</OPTION>
                <OPTION>stb.</OPTION>
            </SELECT>
        </td>
        <td class='col-md-2 text-center'>
        <input type='radio' class='erettsegikozep' name='szab' id='szabk' value='kozep' checked="checked"> <label for='szabk'>középszint</label><BR>
        <input type='radio' class='erettsegiemelt' name='szab' id='szabe' value='emelt'>  <label for='szabe'>emeltszint</label></td>
        <td class='col-md-1'><input type='text' class='form-control' id='szabszazalek' name='szabszazalek' value='<?=$szabvalszazalek?>' size='2' OnChange='Szabvaljegy()' maxlength='3'></td>
        <td class='col-md-1'><input type='text' class='form-control' id='szabjegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-1'>
            <a href="<?php echo base_url();?>Osztalyfonok/erettsegi/<?=$elozouserid?>" title='<?=$elozousernev?>'><button type='button' class='btn btn-secondary form-control'><<</button></a>
        </td>
        <td class='col-md-3'><button type='submit' name='gomb' value='kesz' class='btn btn-success form-control'><b>KÉSZ</b></button></td>
        <td class='col-md-2'><button type='submit' name='gomb' value='modosit' class='btn btn-warning form-control'><b>Módosít</b></button></td>
        <td class='col-md-1'>
            <a href="<?php echo base_url();?>Osztalyfonok/erettsegi/<?=$kovuserid?>" title='<?=$kovusernev?>'><button type='button' class='btn btn-secondary form-control'>>></button></a>
        </td>
    </tr>
    <?php echo form_close();?>
  </table>
</div>
</body>
</html>