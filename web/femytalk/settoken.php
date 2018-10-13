<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$token=$_POST['token'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$result=mysqli_query($conn,"update user set token='$token' where phone='$p'");
	
	if($result)echo "success";
?>