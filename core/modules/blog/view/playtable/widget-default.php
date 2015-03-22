<?php

$tbl = TblData::getById($_GET["tbl_id"]);
$sys = SysData::getById($tbl->sys_id);
$cols = ColData::getAllByTblId($tbl->id);
$rows = EntryData::getAllByTblId($tbl->id);
//$rows = RowData::getAllByTblId($tbl->id);
?>
<div class="container">
	<div class="row">
	<div class="col-md-12">

	<div class="row">
	<div class="col-md-6">
	<h2><?php echo $tbl->name; ?> <small>Ejecutar</small></h2>
</div>
	<div class="col-md-6">
<ol class="breadcrumb">
  <li><a href="./">Inicio</a></li>
  <li><a href="./index.php?view=opensys&sys_id=<?php echo $sys->id;?>"><?php echo $sys->name; ?></a></li>
  <li><a href="#"><?php echo $tbl->name; ?></a></li>
</ol>
</div>
</div>

<div class="btn-toolbar">

<div class="btn-group">
	<a data-toggle="modal" href="#myModal" class="btn btn-default"><i class="fa fa-plus"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
</div>
<!--
<div class="btn-group">
    <a  class="btn btn-default"><i class="fa fa-area-chart"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
</div>
-->
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar campo</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" method="post" action="index.php?action=addrow" role="form">

  <?php if(count($cols)>0):?>
    <?php foreach($cols as $r):?>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo $r->label; ?></label>
    <div class="col-lg-10">
<?php if($r->ref_table_field==null || $r->ref_table_field==0):?>
    <?php if($r->type!="multi"):?>
      <input type="text" class="form-control" name="f-<?php echo $r->id; ?>" id="titulo" placeholder="<?php echo $r->placeholder; ?>">
    <?php else:   ?>
      <select class="form-control" name="f-<?php echo $r->id; ?>">
        <option value="">Valor Vacio</option>
        <?php if($r->suggest!=""):
        $ds = explode(",", $r->suggest);
        ?>
<?php foreach($ds as $d):?>
        <option value="<?php echo $d; ?>"><?php echo $d;?></option>
<?php endforeach; ?>
        <?php endif;?>

      </select>
    <?php endif;?>
<?php else:?>
<select name="f-<?php echo $r->id; ?>" class="form-control">
        <option value="">Valor Vacio</option>
  <?php
/// aqui implementamos la seccion para seleccion via referencia
$cx = ColData::getById($r->ref_table_field);
$tx = TblData::getById($cx->tbl_id);
$rxs = EntryData::getAllByTblId($tx->id);
foreach($rxs as $rx):
      $dxs = RowData::getAllByEntryId($rx->id);
    //print_r($dx);
foreach($dxs as $dx){
    if($r->ref_table_field==$dx->col_id){ echo "<option value='".$dx->val."'> ".$dx->val."</option>"; };
  }
//  print_r($rx);
endforeach; 

?>
</select>
<?php endif; ?>

    </div>
  </div>
<?php endforeach; ?>
<?php endif; ?>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="tbl_id" value="<?php echo $tbl->id; ?>">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

	<?php if(count($rows)>0):?>
<br>
<form class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-lg-6 col-md-offset-6">
      
      <input type="hidden" name="view" value="playtable">
      <input type="hidden" name="tbl_id" value="<?php echo $tbl->id;?>">
<div class="input-group">
      <input type="text" name="q" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
    </div>

    </div>
  </div>
</form>



		<table class="table table-bordered">

<thead>
<th></th>
      <?php foreach($cols as $c):?>
        <th><input type="checkbox"> <?php echo $c->name; ?></th>
      <?php endforeach; ?>
<th></th>
</thead>

      <?php foreach($rows as $r):
      $data = RowData::getAllByEntryId($r->id);
      ?>
<?php if($data!=null):
?>
<tr>
<td style="width:10px;"><input type="checkbox"></td>
      <?php $cnt=0;
      foreach($cols as $c):?>
        <td><?php
        if($c->id==$data[$cnt]->col_id){ echo $data[$cnt]->val; }; ?></td>
      <?php $cnt++;
      endforeach; ?>
<td style="width:30px;"><a href="./index.php?view=editentry&entry_id=<?php echo $r->id; ?>" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a></td>
</tr>
<?php endif; ?>
      <?php endforeach; ?>


<?php else:?>
  <br><p class="alert alert-warning">No hay datos</p>
	<?php endif; ?>
	</div>
	</div>
</div>