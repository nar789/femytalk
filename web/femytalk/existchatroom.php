<?php
	include ("dblib.php");
	
	$id=$_GET['id'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	

	$result=mysqli_query($conn,"select * from chat where id=$id");
	$row=mysqli_fetch_array($result);
	$cnt=mysqli_num_rows($result);
	if($cnt>0){
		echo "exist";
	}else{
		echo "none";
	}
	//while($row=mysqli_fetch_array($result)){}
?>