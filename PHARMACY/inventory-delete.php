<?php
	include "config.php";
	$mid=$_GET['id'];
	$sql="DELETE FROM meds where med_id='$mid'";
	if ($conn->query($sql))
	header("location:inventory-view.php");
	else
	echo "error";
?>
