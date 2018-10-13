 <?php
    
    include ("dblib.php");
    $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
    if (!$conn) {
        echo "error";
    }
    $id=$_GET['id'];
    $result=mysqli_query($conn,"select * from chat where id=$id");
    $row=mysqli_fetch_array($result);

     $r=json_decode($row['member']);

    for($i=0;$i<count($r);$i++){
        
        $result2=mysqli_query($conn,"select * from user where phone='".$r[$i]->phone."'");
        $row2=mysqli_fetch_array($result2);          

        echo "<center id='person".$i."'><div ";
        echo "class='mt-3 pl-3'  style='width:92%;";
        echo "text-align: left;";
        echo "height: 30px;";
        echo "border-bottom: 1px solid black;";
        echo "font-size: 13px; color:white;'";
        echo ">";
        echo "<div style='width:20px;height:20px; border:1px solid black; ";
        echo "display:inline-block;";
        echo "text-align:center;line-height:20px;";
        echo "background-color:white;";
        echo "' class='mr-2' onclick='checkbox_click(\"".$r[$i]->phone."\",".$i.",".count($r).")'>";
        echo "<img src='img/chat_check.png' style='visibility:hidden;width:15px;height:15px;' id='check".$i."'>";
        echo "</div>";
        if($i==0)
            echo "[방장] ";
        echo $row2['name']."/".$row2['sex']."/".$row2['age']."/".$row2['upto'];
        echo "</div></center>";
    }
?>