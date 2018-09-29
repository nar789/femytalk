<?php
	include ("dblib.php");
	
	$name=$_POST['name'];
	$type=$_POST['type'];
	$p=$_POST['p'];

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$c=mt_rand(1,10);
	$member="[{\"phone\":\"".$p."\",\"cnt\":0,\"color\":$c}]";

	$result=mysqli_query($conn,"insert into chat values(null,$type,'$name','$member');");
	echo mysqli_insert_id($conn);
	//while($row=mysqli_fetch_array($result)){}
?>