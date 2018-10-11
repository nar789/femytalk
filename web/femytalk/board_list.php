<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

</head>
<body style="background-color: #f5f5f5;margin:0px; padding: 0px;">
<script type="text/javascript">
<?php
	echo "var p=\"".$_GET['p']."\";"; //not writer , watcher
?>
</script>
<div style="background-color: gray;background-color: #f5f5f5;" id=card-g>
<?php

	include ("dblib.php");
	$conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if (!$conn) {
	    echo "error";
	}
	$result=mysqli_query($conn,"select * from board order by time desc");
	$i=0;
	$cnt=mysqli_num_rows($result);
	if($cnt==0){
		?>
			<center><p style="color:gray;margin-top: 20px; font-size: 12px;">새로운 게시글을 추가해보세요.</p></center>
		<?php
	}
	while($row=mysqli_fetch_array($result))
	{
?>	
	<div id=card<?=$i?> style="padding:10px;background-color: white;margin-bottom: 20px;" onclick="cardclick(<?=$row['id']?>)" >
		<div style='height: 60px; background-color: white;' class="pb-1 mt-1 mb-2">

					<div style='width: 50px; height: 50px; display: inline-block; 
					border:1px solid #d1d1d1;
					vertical-align:top;
					' class='mr-2'>
						<center><div style='width: 44px; height: 44px; 
						margin-top: 2px;'>
							<img src='http://kirino16.cafe24.com/img/unknown_thumbnail.png' class=img<?=$row['writer']?> style="width: 44px; height: 44px;">
						</div></center>
					</div>
					<div style='display: inline-block;margin-top:8px;'><div style='color:gray; font-weight: bold;display: inline-block; font-size: 15px;' class=info<?=$row['writer']?>></div><div style='color:gray; font-weight: bold;display: inline-block; font-size:13px;' class=info2<?=$row['writer']?>></div>
						<div style='font-size: 13px;color:#d1d1d1;margin-top: 3px;' id=time<?=$i?>></div>
					</div>
		</div>
		<div style='color:gray; font-weight: bold; font-size:12px;background-color: white;height: 30px;text-overflow: ellipsis;overflow:hidden;white-space: nowrap;' id=content<?=$i?>></div>
		<center><div id=imgloader<?=$i?>></div></center>
	</div>
<?php
		$i++;
	}
?>
</div>
<div 
id=plus
onclick="plusclick()" 
style="width:70px; height:70px; background-color: #f07171; border-radius: 100px;text-align: center;
position: fixed; right:20px;bottom:20px;  z-index: 10;"><img style="width: 30px; height: 30px;margin-top: 20px;" src='img/chat_btn_menu.png'></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/board_list.js"></script>
</body>