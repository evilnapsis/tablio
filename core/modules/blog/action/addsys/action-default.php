<?php
if(isset($_POST)){
$p = new SysData();
$p->name = $_POST['name'];
//$p->user_id = $_SESSION['user_id'];
//$public =0;
// if(isset($_POST['is_public'])){ $public=1; }

//$p->is_public = $public;
 $p->user_id = 1;
$p->add();

// setcookie("added",$p->title);

 print "<script>window.location='./';</script>";
}
?>