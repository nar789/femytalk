<?php
    include ("../dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }

    $init=$_POST['init'];
    $r1=$_POST['r1'];
    $r2=$_POST['r2'];
    $r3=$_POST['r3'];
    
    $ret=mysqli_query($conn,"update heart set init=$init, r1=$r1, r2=$r2, r3=$r3 where id=1");
    if($ret)
    	echo "success";
?>
