<?php
	include ("dblib.php");
	$phone=$_GET['phone'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"select count(*) from user where phone='".$phone."'");
	while($row=mysqli_fetch_array($result))
	{
		echo $row[0];
	}
?>