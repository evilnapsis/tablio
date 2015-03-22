<?php

$sys = SysData::getById($_GET["sys_id"]);
?>
<div class="container">
<div class="row">

	<div class="col-md-12">
		<h2>Nueva Tabla <small><?php echo $sys->name; ?></small></h2>

<form class="form-horizontal" method="post" action="index.php?action=addtbl" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
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
</div>
</div>