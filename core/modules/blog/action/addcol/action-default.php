<?php
if(isset($_POST)){
$p = new ColData();
$p->name = $_POST['name'];
$p->label = $_POST['label'];
$p->placeholder = $_POST['placeholder'];
$p->type = $_POST['type'];
$p->position = $_POST['position'];
$p->width = $_POST['width'];
$p->ref_table_field = $_POST['ref_table_field'];
if($_POST["ref_table_field"]==""){
	$p->ref_table_field="NULL";
}

$p->suggest = $_POST['suggest'];

//$p->user_id = $_SESSION['user_id'];
$required =0;
 if(isset($_POST['is_required'])){ $required=1; }

$p->is_required = $required;
 $p->tbl_id = $_POST["tbl_id"];
$p->add();

// setcookie("added",$p->title);

 print "<script>window.location='./index.php?view=edittable&tbl_id=$_POST[tbl_id]';</script>";
}
?>