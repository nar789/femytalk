<?php
    include ("../dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }

    $id=$_POST['id'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $region=$_POST['region'];
    $upto=$_POST['upto'];
    $level=$_POST['level'];
    $heart=$_POST['heart'];
    $ret=mysqli_query($conn,"update user set sex='$sex', age='$age', region='$region', upto='$upto', level=$level, heart=$heart where id=$id");
    if($ret)
    	echo "success";
?>
