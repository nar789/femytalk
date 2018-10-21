<?php
    include ("../dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }
    $id=$_POST['id'];
 
    
    $ret=mysqli_query($conn,"delete from notice where id=$id");
    if($ret)
    	echo "success";
?>
