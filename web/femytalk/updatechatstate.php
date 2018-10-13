<?php
	include ("dblib.php");
	$id=$_GET['id'];
	$p=$_GET['p'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"update user set chatstate=now(),chatid=$id where phone='$p'");
	if($result)
		echo "success";
?>