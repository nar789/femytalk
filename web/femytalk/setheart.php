<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$heart=$_POST['heart'];
	
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$result=mysqli_query($conn,"update user set heart=heart-$heart where phone='$p'");	
	if($result)
		echo "success";
	else 
		echo "fail";
?>