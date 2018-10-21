<?php
    include ("../dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }
    $id=$_POST['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    
    $ret=mysqli_query($conn,"update notice set title='$title', content='$content' where id=$id ");
    if($ret)
    	echo "success";
?>
