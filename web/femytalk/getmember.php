<?php
	include ("dblib.php");
	
	$id=$_GET['id'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	

	$result=mysqli_query($conn,"select member from chat where id=$id");
	$row=mysqli_fetch_array($result);
	echo $row[0];
	//while($row=mysqli_fetch_array($result)){}
?>