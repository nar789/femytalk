<?php
	include ("dblib.php");
	
	$p=$_GET['p'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	

	$result=mysqli_query($conn,"select * from user where phone='$p'");
	$row=mysqli_fetch_array($result);
	echo "{\"name\":\"".$row['name']."\",\"sex\":\"".$row['sex']."\",\"age\":\"".$row['age']."\",\"region\":\"".$row['region']."\",\"upto\":\"".$row['upto']."\",\"img\":\"".$row['img']."\",\"phone\":\"".$row['phone']."\"}";
	//while($row=mysqli_fetch_array($result)){}
?>