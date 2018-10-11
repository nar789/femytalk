<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$content=$_POST['content'];
	$id=$_POST['id'];
	$isdel=$_POST['isdel'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	if($id){//update or delete
		if($isdel==1){//delete
			$result=mysqli_query($conn,"delete from board where id=$id");	
			if($result)echo "success";	
		}else{//update
			$result=mysqli_query($conn,"update board set content='$content',time=now() where id=$id");	
			if($result)echo "success";	
		}

	}else{//insert
		$result=mysqli_query($conn,"insert into board values(null,'$p','$content',now())");	
		if($result)echo "success";
	}
?>