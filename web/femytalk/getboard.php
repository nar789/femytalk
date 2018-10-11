<?php
	include ("dblib.php");
	$p=$_GET['p'];
	$id=$_GET['id'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}

	if($id){//detail
		$result=mysqli_query($conn,"select * from board where id=$id");
		
		while($row=mysqli_fetch_array($result)){
			echo json_encode($row);
			break;
		}
		

	}else{//list

		$result=mysqli_query($conn,"select * from board order by time desc");
		$g=array();
		while($row=mysqli_fetch_array($result)){
			array_push($g,$row);
		}
		echo json_encode($g);
	}
	
?>