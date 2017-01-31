<?php
if(isset($_POST)){
$p = new TblData();
$p->name = $_POST['name'];
//$p->user_id = $_SESSION['user_id'];
//$public =0;
// if(isset($_POST['is_public'])){ $public=1; }

//$p->is_public = $public;
 $p->sys_id = $_POST["sys_id"];
$p->add();

// setcookie("added",$p->title);

 print "<script>window.location='./index.php?view=opensys&sys_id=$_POST[sys_id]';</script>";
}
?>