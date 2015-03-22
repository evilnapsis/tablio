<?php
// el archivo autoload inicializa todos lo archivos necesarios para que el framework funcione
include "core/autoload.php";


// cargamos el modulo iniciar.
$lb = new Lb();
$lb->display_errors = false;
$lb->loadModule("blog");

?>