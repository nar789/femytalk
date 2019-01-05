<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

</head>
<body style="background-color: #f5f5f5;">
<script type="text/javascript">
<?php
	echo "var p=\"".$_GET['p']."\";"; //not writer , watcher
	echo "var bid=\"".$_GET['bid']."\";";
?>
</script>
<?php

	include ("dblib.php");
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$result=mysqli_query($conn,"select * from comment where board_id=".$_GET['bid']." order by time desc");
	$i=0;
	while($row=mysqli_fetch_array($result))
	{
?>
	<div style='height: 60px; background-color: #f5f5f5;' class="pb-1 mt-1" id=c-g<?=$row['id']?>>

				<div style='width: 50px; height: 50px; display: inline-block; 
				border:1px solid #d1d1d1;
				vertical-align:top;
				' class='mr-2'>
					<center><div style='width: 44px; height: 44px; 
					margin-top: 2px;'>
						<img src='https://femytalk.com/img/unknown_thumbnail.png' class=img<?=$row['writer']?> style="width: 44px; height: 44px;">
					</div></center>
				</div>
				<div style='display: inline-block;height: 50px;vertical-align: top;'><div style='color:gray; font-weight: bold;display: inline-block; font-size: 9px;' class=info<?=$row['writer']?>></div><div style='color:gray; font-weight: bold;display: inline-block; font-size:8px;' class=info2<?=$row['writer']?>></div>
					<div style='color:gray; font-weight: bold; font-size:12px;' id=content<?=$i?>></div>
					<div style='font-size: 11px;color:#d1d1d1;' id=time<?=$i?>></div>
				</div>
				<?php
					if($row['writer']==$_GET['p']){
				?>
					<div style='display:inline-block;float:right;color:gray; font-size:10px;' onclick="del(<?=$row['id']?>)">삭제</div>
				<?php
					}
				?>
	</div>
<?php
		$i++;
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/comment_list.js"></script>
</body>