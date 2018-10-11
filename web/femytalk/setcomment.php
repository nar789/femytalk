<?php
	include ("dblib.php");
	$p=$_POST['p'];
	$content=$_POST['content'];
	$bid=$_POST['bid'];
	$id=$_GET['id'];
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	if($id){//delete
		
		$result=mysqli_query($conn,"delete from comment where id=$id");	
		if($result)echo "success";	

	}else{//insert
		$result=mysqli_query($conn,"insert into comment values(null,$bid,'$p','$content',now())");	
		if($result)echo "success";
	}
?>