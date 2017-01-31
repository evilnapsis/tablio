<?php
$e = EntryData::getById($_GET["row_id"]);
$rows = RowData::getAllByEntryId($e->id);
//$tbl_id;
foreach ($rows as $c) {
$c->del();
}
$e->del();
Core::redir("./?view=playtable&tbl_id=".$e->tbl_id);

?>