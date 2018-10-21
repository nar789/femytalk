<?php
    include ("../dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }

    $title=$_POST['title'];
    $content=$_POST['content'];
    
    $ret=mysqli_query($conn,"insert into notice values(null,'$title','$content',now())");
    if($ret)
    	echo "success";
?>
