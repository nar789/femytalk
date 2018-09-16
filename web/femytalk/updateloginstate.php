<?php
	include ("dblib.php");
	$phone=$_GET['phone'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"update user set loginstate=now() where phone='$phone'");
	
?>