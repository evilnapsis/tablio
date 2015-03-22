<?php

$sys = SysData::getById($_GET["sys_id"]);
$tables = TblData::getAllBySysId($sys->id)
?>
<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h2><?php echo $sys->name; ?></h2>
<ol class="breadcrumb">
  <li><a href="./">Inicio</a></li>
  <li><a href="./index.php?view=opensys&sys_id=<?php echo $sys->id;?>"><?php echo $sys->name; ?></a></li>
</ol>

<div class="btn-toolbar">
	<a data-toggle="modal" href="#myModal" class="btn btn-default"><i class="fa fa-plus"></i></a>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Nueva Tabla</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" method="post" action="index.php?action=addtbl" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="name" id="titulo" placeholder="Escribe un titulo" autocomplete="false" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="sys_id" value="<?php echo $sys->id; ?>">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
    </div>
  </div>
</form>


        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


	<?php if(count($tables)>0):?>
		<br><table class="table table-bordered">
		<?php foreach($tables as $tbl):?>
			<tr>
			<td style="width:30px;"><a href="./index.php?view=playtable&tbl_id=<?php echo $tbl->id; ?>" class="btn btn-sm btn-default"><i class="fa fa-play"></i></a></td>
			<td style="width:30px;"><a href="./index.php?view=edittable&tbl_id=<?php echo $tbl->id; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a></td>
			<td><?php echo $tbl->name; ?>
			</td>
			<td></td>
		<?php endforeach; ?>
	<?php else:?>
		<br><p class="alert alert-warning">No hay tablas</p>
	<?php endif; ?>
	</div>
	</div>
</div>