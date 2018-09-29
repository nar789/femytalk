<?php
	include ("dblib.php");
	
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$r1=$_POST['r1'];
	$r2=$_POST['r2'];
	$region=$r1." ".$r2;
	$upto=$_POST['upto'];
	$url=$_POST['url'];
	$phone=$_POST['phone'];

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"update user set name='$name', sex='$sex', age='$age', region='$region', upto='$upto', img='$url' where phone='$phone'");
	if($result)echo "success";
	else echo "fail";
?>