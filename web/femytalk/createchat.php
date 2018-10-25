<?php
	include ("dblib.php");
	
	$name=$_POST['name'];
	$type=$_POST['type'];
	$p=$_POST['p'];
	$all=$_POST['all'];

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$c=mt_rand(1,10);
	$member="[{\"phone\":\"".$p."\",\"cnt\":0,\"color\":$c}]";

	$result=mysqli_query($conn,"select * from heart");
	$row=mysqli_fetch_array($result);
	$using_heart=0;
	if($all==1)
	{
		$using_heart=$row['allroom'];
		$qur="update user set heart=heart-".$row['allroom']." where phone='$p'";
	}
	else if($type==1)
	{
		$using_heart=$row['r1'];
		$qur="update user set heart=heart-".$row['r1']." where phone='$p'";

	}else if($type==2){
		$using_heart=$row['r2'];
		$qur="update user set heart=heart-".$row['r2']." where phone='$p'";

	}else if($type==3)
	{
		$using_heart=$row['r3'];
		$qur="update user set heart=heart-".$row['r3']." where phone='$p'";
	}


	$result_check=mysqli_query($conn,"select * from user where phone='$p'");
	$row_check=mysqli_fetch_array($result_check);
	if($row_check['heart']-$using_heart>=0)
	{
		mysqli_query($conn,$qur);	
		$result=mysqli_query($conn,"insert into chat values(null,$type,'$name','$member','[]',$all);");
		echo mysqli_insert_id($conn);
	}else{
		echo "fail";
	}
	//while($row=mysqli_fetch_array($result)){}
?>