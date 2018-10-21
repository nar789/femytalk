<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

</head>
<script type="text/javascript">
<?php
	echo "var p=\"".$_GET['p']."\";";
	echo "var time=\"".$_GET['time']."\";";
	echo "var update=\"".$_GET['update']."\";";
?>
</script>
<div style='height: 70px; padding-top: 10px;' class="mb-3">
			<div style='width: 50px; height: 50px; display: inline-block; 
			border:1px solid #d1d1d1;
			vertical-align:top;
			' class='mr-2'>
				<center><div style='width: 44px; height: 44px; 
				margin-top: 2px;'>
					<img src='http://kirino16.cafe24.com/img/unknown_thumbnail.png' id=img style="width: 44px; height: 44px;">
				</div></center>
			</div>
			<div style='display: inline-block;height: 40px;margin-top: 5px;'>
				<div style='color:gray; font-weight: bold;display: inline-block;' id=info></div>
				<div style='color:gray; font-weight: bold;display: inline-block; font-size:13px;' id=info2></div>
				<div style='font-size: 12px;color:#d1d1d1; margin-top: 2px;margin-left: 2px;' id=time></div>
			</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/writer.js"></script>