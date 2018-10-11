<?php
	include ("dblib.php");
	$bid=$_GET['bid'];
	

	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}


	$result=mysqli_query($conn,"select * from comment where board_id=$bid order by time desc");
	$g=array();
	while($row=mysqli_fetch_array($result)){
		array_push($g,$row);
	}
	echo json_encode($g);

?>