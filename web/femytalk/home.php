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
            while($row=mysqli_fetch_array($result))
            {
                echo "<div ";
                echo "onclick='enter(".$row['id'].")'";
                echo "style='height: 60px; border-bottom:1px solid #d1d1d1; ";
                echo "'";
                echo "class='pl-3'>";
                echo "<div class='mt-3'>";
                echo "<p style='font-weight: bold; margin:0px; padding:0px;'>";
                echo "[";
                if($row['type']==1){
                    echo "오붓한방";
                }
                if($row['type']==2){
                    echo "왁자지껄";
                }
                if($row['type']==3){
                    echo "아주큰방";
                }
                echo "] ";
                echo $row['name'];
                echo "</p>";
                echo "<p style='font-size: 12px; color:#b3b4bd;";
                echo "margin-top:-5px; padding:0px;";
                echo "'>";
                echo "방장:";
                $r=json_decode($row['member']);
                $result2=mysqli_query($conn,"select * from user where phone='".$r[0]->phone."'");
                $row2=mysqli_fetch_array($result2);
                echo $row2['name']."(".$row2['sex'].",".$row2['age'].",".$row2['upto'].")";
                echo "</p>";
                echo "</div>";
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