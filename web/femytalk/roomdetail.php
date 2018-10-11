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
            $id=$_GET['id'];
            $result=mysqli_query($conn,"select * from chat where id=$id");
            $row=mysqli_fetch_array($result);
        ?>

        <script>
            <?php
                echo "var id=\"".$_GET['id']."\";";
                echo "var p=\"".$_GET['phone']."\";";
            ?>
         </script>

    	<div style="height: auto; background-color:#445061; " class="pb-3">
    		<div 
    		style="height: 40px;background-color: #2d3540;width:19.5%;
    		line-height: 40px;
    		font-size: 12px;
    		color:white;
    		text-align: center;
    		display: inline-block;">채팅방</div><div 
            class="pl-3"
    		style="height: 40px;background-color: #2d3540;width:80%;
            float:right;
    		color:#9ea1a3;
    		line-height: 40px;
    		font-size: 12px;
    		display: inline-block;"><?php echo $row['name']; ?></div>

             <?php
                $r=json_decode($row['member']);

                for($i=0;$i<count($r);$i++){
                    
                    $result2=mysqli_query($conn,"select * from user where phone='".$r[$i]->phone."'");
                    $row2=mysqli_fetch_array($result2);          

                    echo "<center><div ";
                    echo "class='mt-3 pl-3'  style='width:92%;";
                    echo "text-align: left;";
                    echo "height: 30px;";
                    echo "border-bottom: 1px solid black;";
                    echo "font-size: 13px; color:white;'";
                    echo ">";
                    if($i==0)
                        echo "[방장] ";
                    echo $row2['name']."/".$row2['sex']."/".$row2['age']."/".$row2['upto'];
                    echo "</div></center>";
                }
            ?>


           <!--
    		<center><div
    			
    			class="mt-3 pl-3"  style="width:92%;
                text-align: left;
    			height: 30px;
                border-bottom: 1px solid black;
    			font-size: 13px; color:white;"

    			>[방장] 매너남/남/25/검색</div></center>
                <center><div
                
                class="mt-3 pl-3"  style="width:92%;
                text-align: left;
                height: 30px;
                border-bottom: 1px solid black;
                font-size: 13px; color:white;"

                >[방장] 매너남/남/25/검색</div></center>//-->

    		<center class="mt-3">
    			<div style="background-color: #f07171; 
    			height: 50px;
    			line-height: 50px;
    			color:white;
                font-size: 17px;
    			width:43%;display: inline-block;" class="mr-3"
    			onclick="enter(<?php echo $_GET['id']; ?>,p)"
    			>입장하기</div>
    			<div onclick="history.back()" style="height: 30px; background-color: #748499; 
    			height: 50px;
    			color:white;
    			line-height: 50px;
                font-size: 17px;
    			width:43%;display: inline-block;">닫기</div>
    		</center>

    	</div>
   		

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 
		 <script type="text/javascript" src="js/roomdetail.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>