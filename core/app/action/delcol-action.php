<?php

$s = ColData::getById($_GET["id"]);
$s->del();

Core::redir("./?view=edittable&tbl_id=".$s->tbl_id);

?>