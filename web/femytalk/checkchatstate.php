<?php
	include ("dblib.php");
	$id=$_GET['id'];
	$p=$_GET['p'];
	$idx=$_GET['idx'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	$result=mysqli_query($conn,"select * from user where chatid=$id and phone='$p' and time_to_sec(timediff(now(),chatstate))<3");
	if($result){
		$j['idx']=$idx;
		$j['p']=$p;
		$cnt=mysqli_num_rows($result);
		if($cnt!=0){
			$j['ret']="success";
		}
		else{
			$j['ret']="fail";
		}
		echo json_encode($j);
	}
?>