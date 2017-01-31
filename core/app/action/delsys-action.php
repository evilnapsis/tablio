<?php

$s = SysData::getById($_GET["sys_id"]);
$s->del();

Core::redir("./");

?>