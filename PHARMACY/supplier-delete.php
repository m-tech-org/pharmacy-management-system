<?php
	include "config.php";
	$sid=$_GET['id'];
	$sql="DELETE FROM suppliers where sup_id='$sid'";
	if ($conn->query($sql))
	header("location:supplier-view.php");
	else
	echo "error";
?>