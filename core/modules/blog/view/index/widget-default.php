<?php

$syss = SysData::getAll();

?>
<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h2>Sistemas</h2>
<div class="btn-toolbar">

<div class="btn-group">
	<a data-toggle="modal" href="#myModal" class="btn btn-default"><i class="fa fa-plus"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Nuevo Sistema</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" method="post" action="index.php?action=addsys" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="name" id="titulo" placeholder="Escribe un titulo" autocomplete="false" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="hidden" name="view" value="addpost">
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
    </div>
  </div>
</form>


        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<!--
<div class="btn-group">
    <a  class="btn btn-default"><i class="fa fa-area-chart"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
  <a  class="btn btn-default"><i class="fa fa-minus"></i></a>
</div>
-->
</div>

<br>
	<?php if(count($syss)>0):?>
		<table class="table table-bordered">
		<thead>
			<th></th>
			<th>Nombre del sistema</th>
		</thead>
		<?php foreach($syss as $sys):?>
			<tr>
			<td style="width:30px;"><a href="./index.php?view=opensys&sys_id=<?php echo $sys->id; ?>" class="btn btn-sm btn-default"><i class="fa fa-chevron-right"></i></a>
			</td>
			<td><?php echo $sys->name; ?>
			</td>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>
	</div>
</div>