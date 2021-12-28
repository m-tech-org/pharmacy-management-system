<?php
	include "config.php";
	$eid=$_GET['eid'];
	$sql="DELETE FROM employee where e_id='$eid'";
	if ($conn->query($sql))
	header("location:employee-view.php");
	else
	echo "error";
?>