<div class="row">

	<div class="col-md-12">
		<div style="font-size:35px;">Nuevo Sistema</div>

<form class="form-horizontal" method="post" action="index.php?action=addsys" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
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
</div>