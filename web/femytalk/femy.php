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
			echo "<script>";
			echo "var p='".$phone."';";
			echo "</script>";
			$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
			if (!$conn) {
			    echo "error";
			}
			//$result=mysqli_query($conn,"select * from user");
			//$result=mysqli_query($conn,"select * from user where time_to_sec(timediff(now(),loginstate))<3 order by loginstate desc");
			$result=mysqli_query($conn,"select * from user order by loginstate desc");
			if(mysqli_num_rows($result)==0){
				echo "<center><p class='mt-5' style='color:gray;'>접속중인 페미가 없습니다.</p></center>";
			}
			while($row=mysqli_fetch_array($result))
			{
				if($row['phone']==$phone)continue;
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
				//echo "float:right;'>";
				echo "position:absolute;right:15px;'>";
				echo "<div onclick='talk11(\"".$row['phone']."\")' style='width: 50px; height: 50px; display: inline-block;";
				echo "border:1px solid #f59593; font-weight: bold; background-color:white;'";
				echo "class='mr-2'><center style='color:#f59593;'>대 화<br>하 기<center></div>";
				echo "<div style='width: 50px; height: 50px; display: inline-block;";
				echo "border:1px solid #f59593; font-weight: bold; background-color:white;'";
				echo "><center style='color:#f59593;' onclick='addfriend(\"".$phone."\",\"".$row['phone']."\")'>친 구<br>추 가<center></div>";
				echo "</div>";
				echo "</div>";
			}
			
		?>

    	<!--
		<div style='height: 70px; padding-top: 10px;
		border-bottom: 1px solid #d1d1d1;' class='pl-3 pr-3'>
			<div style='width: 50px; height: 50px; border:1px solid #d1d1d1; display: inline-block;'
			class='mr-2'>
				<center><div style='width: 44px; height: 44px; border: 1px solid #d1d1d1;
				margin-top: 2.5px;'>
					<img src='#'>
				</div></center>
			</div>
			<div style='display: inline-block; height: 50px; vertical-align: top;'>
			<p style=' vertical-align: top;color:gray; font-weight: bold;'>하이</p>
			<p style=' vertical-align: bottom;font-size: 12px;color:gray;margin-top:-10px;'>하이</p>
			</div>
			<div style='display: inline-block; height: 50px; vertical-align: top;
			float:right;'>
				<div style='width: 50px; height: 50px; display: inline-block;
				border:1px solid #f59593; font-weight: bold;'
				class='mr-2'><center style='color:#f59593;'>대 화<br>하 기<center></div>
				<div style='width: 50px; height: 50px; display: inline-block;
				border:1px solid #f59593; font-weight: bold;'
				><center style='color:#f59593;'>친 구<br>추 가<center></div>
			</div>
		</div>//-->

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script type="text/javascript" src="js/femy.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>