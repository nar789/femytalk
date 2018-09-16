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
			$phone=$_GET['phone'];
			$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
			if (!$conn) {
			    echo "error";
			}

			$result=mysqli_query($conn,"select buddy from user where phone='$phone'");
			//$result=mysqli_query($conn,"select * from user order by loginstate desc");
			$row=mysqli_fetch_array($result);
			$r=json_decode($row[0]);
			if(count($r)==0){
				echo "<center><p class='mt-5' style='color:gray;'>추가된 친구가 없습니다.<br>친구를 추가해보세요.</p></center>";
			}else{

				for($i=0;$i<count($r);$i++){
					$fp=$r[$i];


					$result=mysqli_query($conn,"select * from user where phone='$fp'");
					$row=mysqli_fetch_array($result);


					echo "<div style='height: 70px; padding-top: 10px;";
					echo "border-bottom: 1px solid #d1d1d1;' class='pl-3 pr-3'>";
					echo "<div style='width: 50px; height: 50px; border:1px solid #d1d1d1; display: inline-block;'";
					echo "class='mr-2'>";
					echo "<center><img onclick='imgclick(this)' src='".$row['img']."' style='width: 44px; height: 44px; border: 1px solid #d1d1d1;";
					echo "margin-top: 2px;'>";
					echo "</center>";
					echo "</div>";
					echo "<div style='display: inline-block; height: 50px; vertical-align: top;'>";
					echo "<p style=' vertical-align: top;color:gray; font-weight: bold;display:inline-block;'>".$row['name']."</p>";
					echo "<p style='margin-top:2px; padding:0px; display:inline-block; font-size:12px; color:gray; font-weight: bold;'>(";
					echo $row['sex'].",".$row['age'].",".$row['upto'];
					echo ")</p>";
					echo "<p style=' vertical-align: bottom;font-size: 12px;color:gray;margin-top:-10px;'>".$row['region']."</p>";
					echo "</div>";
					echo "<div style='display: inline-block; height: 50px; vertical-align: top;";
					echo "float:right;'>";
					echo "<div style='width: 50px; height: 50px; display: inline-block;";
					echo "border:1px solid #f59593; font-weight: bold;'";
					echo "class='mr-2'><center style='color:#f59593;'>대 화<br>하 기<center></div>";
					echo "<div style='width: 50px; height: 50px; display: inline-block;";
					echo "border:1px solid #f59593; font-weight: bold;'";
					echo "><center style='color:#f59593;' onclick='delfriend(\"".$phone."\",\"".$row['phone']."\")'>친 구<br>삭 제<center></div>";
					echo "</div>";
					echo "</div>";


				}

			}
			
		?>

   

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script type="text/javascript" src="js/my.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>