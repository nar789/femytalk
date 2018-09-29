<?php
	include ("dblib.php");
	
	$id=$_GET['id'];
	$member=$_GET['member'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	

	$result=mysqli_query($conn,"update chat set member='$member' where id=$id");
	//while($row=mysqli_fetch_array($result)){}
?>