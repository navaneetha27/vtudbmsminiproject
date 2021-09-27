<?php
require "database/config.php";
if (isset($_GET['uid'])) {
	$uid = $_GET['uid'];
	$appno=$_GET['appno'];

$sql=" delete from appl where uid='$uid' and appno= '$appno'";
$res=mysqli_query($con,$sql);
if ($res == TRUE) {
		header('Location: application1.php');
	}else{
		echo "Error:" ;
	}
}
?>