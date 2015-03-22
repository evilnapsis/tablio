<?php
if(isset($_POST)){
	//print_r($_POST);

	$tbl = TblData::getById($_POST["tbl_id"]);
	$cols = ColData::getAllByTblId($tbl->id);
	$entry = new EntryData();
	$entry->tbl_id = $tbl->id;
	$e = $entry->add();

	 if(count($cols)>0){
		foreach($cols as $c){
			$name = "f-".$c->id;
		if(isset($_POST[$name])){
			$row = new RowData();
			$row->val = $_POST[$name];
			$row->col_id = $c->id;
			$row->entry_id = $e[1];
			$row->add();
		}	
		}

	 }
Core::redir("./index.php?view=playtable&tbl_id=$_POST[tbl_id]");


}
?>