<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    </HEAD>
    <BODY>
<div class="container">
  <div class='h2 text-center'>Év végi eredmények</div><BR>
  <?php
/*  if(isset($evvegiiadatok))
    {
    }
    else
    {
    }    */
    $hidden = ['userid' => $userid];
    echo form_open('Osztalyfonok/evvegikesz','',$hidden);?>
  <table class='table table-sm borderless'>
    <tr class='row'>
        <td class='col-md-3 text-center font-weight-bold lead'><?=$diaknev?></td>
        <td class='col-md-1 text-center '>Érdemjegy</td>
    </tr>
    <tr class='row'>
        <td class='col-md-3'>Magyar nyelv és irodalom</td>
        <td class='col-md-1'><input type='text' class='form-control' id='magyarjegy' size='2' readonly></td>
    </tr>
    <tr class='row'>
        <td class='col-md-1'>
            <?php if(isset($elozouserid)):?>
            <a href="<?php echo base_url();?>Osztalyfonok/erettsegi/<?=$elozouserid?>" title='<?=$elozousernev?>'><button type='button' class='btn btn-secondary form-control'><<</button></a>
            <?php endif;?>
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