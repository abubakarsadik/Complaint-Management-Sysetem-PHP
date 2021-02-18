<?php

	$conn = mysqli_connect("localhost","root","","cms_sgd") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM category";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['category_id']}'>{$row['categoryname']}</option>";
		}
	}else if($_POST['type'] == "mcat"){

		$sql = "SELECT * FROM subcategory WHERE category_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['subcategory_id']}'>{$row['subcategoryname']}</option>";
		}
	}

	echo $str;
 ?>
