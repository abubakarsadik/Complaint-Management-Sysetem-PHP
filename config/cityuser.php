<?php

	$conn = mysqli_connect("localhost","root","","cms_sgd") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM city";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['city_id']}'>{$row['cityname']}</option>";
		}
	}
	else if($_POST['type'] == "user"){

		$sql = "SELECT * FROM user WHERE city = {$_POST['id']} and user.usertype != 'Entery Operator' and user.usertype != 'Admin' ";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		while($row = mysqli_fetch_assoc($query)){
			$name= $row['firstname']." ".$row['lastname'];
		  $str .= "<option value='{$row['user_id']}'>{$name}</option>";
		}
	}
	echo $str;
 ?>
