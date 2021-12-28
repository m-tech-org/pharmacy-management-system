<?php

	include "config.php";
	
	if(isset($_POST['search'])) {
		
		$search=$_POST['valuetosearch'];
		$search_result=mysqli_query($conn,"SET @p0='$search';")or die(mysqli_error($conn));
		$search_result=mysqli_query($conn,"CALL `SEARCH_INVENTORY`(@p0);") or die(mysqli_error($conn));
	}
	else {
			$query="SELECT med_id as medid, med_name as medname,med_qty as medqty,category as medcategory FROM meds";
			$search_result=filtertable($query);
	}
	
	function filtertable($query)
	{	$conn = mysqli_connect("localhost", "root", "", "pharmacydb");
		$filter_result=mysqli_query($conn,$query);
		return $filter_result;
	}
	
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form2.css">
<title> Dashboard Inventory For Customers </title>
</head>

<body>

	<div class="topnav">
		<a href="mainpage.php">Log-In</a>
		<h2 style="font-family:Arial; color:white; text-align:center;"> Pharmacy Management System </h2>
        	
	</div>

	
	<center>
	
	<div class="head">
	<h2> MEDICINE INVENTORY </h2>
	</div>
	
	<form method="post">
	<input type="text" name="valuetosearch" placeholder="Enter any value to Search" style="width:400px; margin-left:250px;">&nbsp;&nbsp;&nbsp;
	<input type="submit" name="search" value="Search">
	<br><br>
	</form>
	
	</center>
	

	<table align="right" id="table1" style="margin-top:20px; margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity Available</th>
			<th>Category</th>
		</tr>
		
	<?php
    include "config.php";
	session_start();
	
		if ($search_result->num_rows > 0) {
		
		while($row = $search_result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["medid"]. "</td>";
			echo "<td>" . $row["medname"] . "</td>";
			echo "<td>" . $row["medqty"]. "</td>";
			echo "<td>" . $row["medcategory"]. "</td>";
		echo "</tr>";
		}
		echo "</table>";
		} 
		
		$conn->close();
	?>
	
</body>

<script>
	
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}
			
</script>

</html>
