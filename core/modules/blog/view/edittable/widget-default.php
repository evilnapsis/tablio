<?php

$tbl = TblData::getById($_GET["tbl_id"]);
$sys = SysData::getById($tbl->sys_id);
$cols = ColData::getAllByTblId($tbl->id);

$tbls = TblData::getAllBySysId($sys->id);

?>
<div class="container">
	<div class="row">
	<div class="col-md-12">

	<div class="row">
	<div class="col-md-6">
	<h2><?php echo $tbl->name; ?> <small>Columnas</small></h2>
</div>
	<div class="col-md-6">
<ol class="breadcrumb">
  <li><a href="./">Inicio</a></li>
  <li><a href="./index.php?view=opensys&sys_id=<?php echo $sys->id;?>"><?php echo $sys->name; ?></a></li>
  <li><a href="#"><?php echo $tbl->name; ?></a></li>
</ol>
</div>
</div>

<div class="toolbar">
	<a data-toggle="modal" href="#myModal" class="btn btn-default"><i class="fa fa-plus"></i></a>
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
<form class="form-horizontal" method="post" action="index.php?action=addcol" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="name" id="titulo" placeholder="Nombre del campo" autocomplete="false" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Label/Placeholder</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="label" id="titulo" placeholder="Label" autocomplete="false">
    </div>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="placeholder" id="titulo" placeholder="Placeholder" autocomplete="false">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
    <select name="type" class="form-control">
    	<option value="string">Cadena de Texto</option>
    	<option value="int">Numero Entero</option>
    	<option value="float">Numero con Decimales</option>
      <option value="multi">Seleccion multiple</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Valores</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="suggest" id="titulo" placeholder="Valores sugeridos" autocomplete="false">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Width/Posicion</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="width" id="titulo" placeholder="Ancho del campo">
    </div>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="position" id="titulo" placeholder="Posicion del campo">
    </div>
  </div>
<?php if(count($tbls)>1):?>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Referencia</label>
    <div class="col-lg-10">
    <select name="ref_table_field" class="form-control">
        <optgroup label="seleccione">
        <option value="">-- SELECCIONE --</option>
        </optgroup>
      <?php foreach($tbls as $t):
      ?>
<?php if($t->id!=$tbl->id):
$cs = ColData::getAllByTblId($t->id);
?>

<?php if(count($cs)>0):?>
        <optgroup label="<?php echo $t->name; ?>">
        <?php foreach ($cs as $c):?>
          <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
        <?php endforeach; ?>
        </optgroup>
<?php endif; ?>
<?php endif; ?>
      <?php endforeach; ?>
    </select>
    </div>
  </div>
<?php endif; ?>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_required"> Campo obligatorio
        </label>
      </div>
    </div>
  </div>
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

	<?php if(count($cols)>0):?>
		<br><br><table class="table table-bordered">
		<?php foreach($cols as $r):?>
			<tr>
			<td style="width:30px;">
      <a data-toggle="modal" href="#edit<?php echo $r->id; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>


  <!-- Modal -->
  <div class="modal fade" id="edit<?php echo $r->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar campo</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" method="post" action="index.php?action=updatecol" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="name" value="<?php echo $r->name;?>" id="titulo" placeholder="Nombre del campo" autocomplete="false" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Label/Placeholder</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="label" value="<?php echo $r->label;?>" id="titulo" placeholder="Label" autocomplete="false">
    </div>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="placeholder" id="titulo" value="<?php echo $r->placeholder;?>" placeholder="Placeholder" autocomplete="false">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
    <?php $ts = array("string"=>"Cadena de Texto","int"=>"Numero Entero","float"=>"Numero con Decimales","multi"=>"Seleccion Multiple")?>
    <select name="type" class="form-control">
<?php foreach($ts as $k =>$v):?>
      <option value="<?php echo $k;?>" <?php if($r->type==$k){ echo "selected"; }?>><?php echo $v;?></option>
<?php endforeach; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Valores</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="suggest" value="<?php echo $r->suggest;?>" id="titulo" placeholder="Valores sugeridos" autocomplete="false">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Width/Posicion</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="width" value="<?php echo $r->width;?>" id="titulo" placeholder="Ancho del campo">
    </div>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="position" value="<?php echo $r->position;?>" id="titulo" placeholder="Posicion del campo">
    </div>
  </div>
<?php if(count($tbls)>1):?>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Referencia</label>
    <div class="col-lg-10">
    <select name="ref_table_field" class="form-control">
        <optgroup label="seleccione">
        <option value="">-- SELECCIONE --</option>
        </optgroup>
      <?php foreach($tbls as $t):
      ?>
<?php if($t->id!=$tbl->id):
$cs = ColData::getAllByTblId($t->id);
?>

<?php if(count($cs)>0):?>
        <optgroup label="<?php echo $t->name; ?>">
        <?php foreach ($cs as $c):?>
          <option value="<?php echo $c->id; ?>" <?php if($r->ref_table_field!=null && ($r->ref_table_field==$c->id)){ echo "selected";}?>><?php echo $c->name; ?></option>
        <?php endforeach; ?>
        </optgroup>
<?php endif; ?>
<?php endif; ?>
      <?php endforeach; ?>
    </select>
    </div>
  </div>
<?php endif; ?>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_required"> Campo obligatorio
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="col_id" value="<?php echo $r->id; ?>">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


      </td>
			<td><?php echo $r->name; ?>
			</td>
		<?php endforeach; ?>
  <?php else:?>
    <br><p class="alert alert-warning">No hay columnas</p>
	<?php endif; ?>
	</div>
	</div>
</div>