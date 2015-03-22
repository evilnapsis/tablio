<?php
$col = ColData::getById($_POST["col_id"]);


$col->name = $_POST['name'];
$col->label = $_POST['label'];
$col->placeholder = $_POST['placeholder'];
$col->type = $_POST['type'];
$col->position = $_POST['position'];
$col->width = $_POST['width'];
$col->ref_table_field = $_POST['ref_table_field'];
if($_POST["ref_table_field"]==""){
	$col->ref_table_field="NULL";
}

$col->suggest = $_POST['suggest'];

//$col->user_id = $_SESSION['user_id'];
$required =0;
 if(isset($_POST['is_required'])){ $required=1; }

$col->is_required = $required;
$col->update();

Core::redir("./index.php?view=edittable&tbl_id=".$col->tbl_id);

?>