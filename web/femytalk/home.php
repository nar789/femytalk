<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    
    <body>
        
        <?php
            include ("dblib.php");
            $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
            if (!$conn) {
                echo "error";
            }

            $result=mysqli_query($conn,"select * from chat order by id desc");
            if(mysqli_num_rows($result)==0){
        ?>
            <center><p style='color:gray;' class="pt-5">존재하는 채팅방이 없습니다.</p></center>
        <?php
            }
            while($row=mysqli_fetch_array($result))
            {
                if($row['type']==4)
                {
                    $r=json_decode($row['name']);
                    if($r->p1!=$_GET['phone'] && $r->p2!=$_GET['phone'])
                        continue;
                }

                $r=json_decode($row['member']);
                $cur=0;
                for($i=0;$i<count($r);$i++)
                {
                    $result4=mysqli_query($conn,"select * from user where chatid=".$row['id']." and phone='".$r[$i]->phone."' and time_to_sec(timediff(now(),chatstate))<3");    
                    $cnt=mysqli_num_rows($result4);
                    if($cnt>0)
                        $cur=$cur+1;
                }
                if($cur==0)
                {
                    mysqli_query($conn,"delete from chat where id=".$row['id']);
                    continue;
                }

                if($row['type']==1 || $row['type']==4)
                    $max=2;
                else if($row['type']==2)
                    $max=10;
                else if($row['type']==3)
                    $max=20;


                echo "<div ";
                if($max>$cur){
                    if($row['allroom']==1)
                    {
                        echo "onclick='enter(".$row['id'].",0)'";    
                    }else{
                        $r=json_decode($row['member']);
                        $result2=mysqli_query($conn,"select * from user where phone='".$r[0]->phone."'");
                        $row2=mysqli_fetch_array($result2);
                        echo "onclick='enter(".$row['id'].",".$row2['level'].")'";
                    }
                }
                echo "style='height: 60px; border-bottom:1px solid #d1d1d1; ";
                echo "'";
                echo "class='pl-3'>";
                echo "<p style='background-color:skyblue;'>";
                echo "<p style='font-weight: bold; margin:0px; padding:0px;font-size:16px;'>";
                if($row['type']!=4)
                {
                    echo "[";
                    if($row['allroom']==1){
                        echo "전체";
                    }else{
                        $r=json_decode($row['member']);
                        $result2=mysqli_query($conn,"select * from user where phone='".$r[0]->phone."'");
                        $row2=mysqli_fetch_array($result2);
                        echo $row2['level']."Lv";
                    }
                    echo "] ";
                }
                if($row['type']==4)
                {
                    $r=json_decode($row['name']);
                    if($r->p1==$_GET['phone'])
                    {
                        $result3=mysqli_query($conn,"select * from user where phone='".$r->p2."'");
                        $row3=mysqli_fetch_array($result3);
                        echo $row3['name']."님과의 1:1대화";
                    }else{
                        $result3=mysqli_query($conn,"select * from user where phone='".$r->p1."'");
                        $row3=mysqli_fetch_array($result3);
                        echo $row3['name']."님과의 1:1대화";
                    }
                }else
                    echo $row['name'];
                echo "</p>";
                echo "<p style='font-size: 12px; color:#b3b4bd;";
                echo "padding:0px;";
                echo "'>";


                

                echo "[".$cur."/".$max."]";
                //echo "[1/2] ";


                $r=json_decode($row['member']);
                $result2=mysqli_query($conn,"select * from user where phone='".$r[0]->phone."'");
                $row2=mysqli_fetch_array($result2);
                echo $row2['name'];
                //echo $row2['name']."(".$row2['sex'].",".$row2['age'].",".$row2['upto'].")";
                echo "</p>";
                echo "</p>";
                echo "</div>";
            }
        ?>

        <!--
        <div 
        style='height: 60px; border-bottom:1px solid #d1d1d1; 
        '
        class='pl-3 mt-1'>
            <div class='mt-3'>
            <p style='font-weight: bold; margin:0px; padding:0px;'>asdfsdf</p>
            <p style='font-size: 12px; color:#b3b4bd;
            margin-top:-5px; padding:0px;
            '>asdfsdf</p>
            </div>
        </div>//-->
         <script>
            <?php
                echo "var p=\"".$_GET['phone']."\";";
            ?>
         </script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script type="text/javascript" src="js/home.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>