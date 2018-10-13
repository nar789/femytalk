<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$push=$_POST['push'];
	
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$result=mysqli_query($conn,"update user set push='$push' where phone='$p'");	
	if($result)
		echo "success";
	else 
		echo "fail";
?>