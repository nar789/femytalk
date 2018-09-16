<?php
	include ("dblib.php");
	$p=$_GET['p'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"select buddy from user where phone='$p'");
	while($row=mysqli_fetch_array($result))
	{
		echo $row[0];
	}
?>