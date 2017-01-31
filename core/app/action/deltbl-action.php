<?php

$s = TblData::getById($_GET["tbl_id"]);
$s->del();

Core::redir("./?view=opensys&sys_id=".$s->sys_id);

?>