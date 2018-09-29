<?php
	include ("dblib.php");
	$id=$_GET['id'];
	$p=$_GET['p'];
	$msg=$_GET['msg'];

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	

	$result=mysqli_query($conn,"update user set msg='$msg' where phone='$p'");

	
	$result=mysqli_query($conn,"select member from chat where id=$id");
	$row=mysqli_fetch_array($result);
	$j=json_decode($row[0]);
	for($i=0;$i<count($j);$i++)
	{
		if($j[$i]->phone==$p){
			$j[$i]->cnt=$j[$i]->cnt+1;
			break;
		}
	}
	$j=json_encode($j);
	echo $j;
	$result=mysqli_query($conn,"update chat set member='$j' where id=$id");
	if($result)echo "success";
	//echo "{\"name\":\"".$row['name']."\",\"msg\":\"".$row['msg']."\"}";
	//while($row=mysqli_fetch_array($result)){}
?>