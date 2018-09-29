<?php
	include ("dblib.php");
	$id=$_GET['id'];
	$ban=$_GET['ban'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"update chat set ban='$ban' where id=$id");
?>