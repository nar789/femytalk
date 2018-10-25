<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$heart=$_POST['heart'];
	
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$r_c=mysqli_query($conn,"select * from user where phone='$p'");	
	$row_c=mysqli_fetch_array($r_c);
	if($row_c['heart']-intval($heart)>=0)
	{
		$result=mysqli_query($conn,"update user set heart=heart-$heart where phone='$p'");	
		if($result)
			echo "success";
		else 
			echo "fail";
	}else{
		echo "fail";
	}
?>