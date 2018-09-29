<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body>
    	<input type=hidden id=rt value=1>
    	<div style="height: 150px; background-color:#445061; ">
    		<div 
    		id=rt1
    		onclick="selrt(1)"
    		style="height: 40px;background-color: #445061;width:33.333%;
    		line-height: 40px;
    		font-size: 12px;
    		color:white;
    		text-align: center;
    		display: inline-block;">오붓한방(2명)</div><div 
    		id=rt2
			onclick="selrt(2)"
    		style="height: 40px;background-color: #2d3540;width:33.333%;
    		color:white;
    		line-height: 40px;
    		font-size: 12px;
    		text-align: center;
    		display: inline-block;">왁자지껄(10명)</div><div 
    		id=rt3
			onclick="selrt(3)"
    		style="height: 40px;background-color: #2d3540;width:33.333%;
    		color:white;
    		line-height: 40px;
    		font-size: 12px;
    		text-align: center;
    		display: inline-block;">아주큰방(20명)</div>

    		<center><input 
    			id=rname
    			type=text class="mt-3 pl-3"  style="width:92%;
    			height: 30px;
    			font-size: 13px; color:gray;"
    			placeholder="방 제목을 입력해 주세요."></center>
    		<center class="mt-2">
    			<div style="height: 30px; background-color: #f07171; 
    			height: 40px;
    			line-height: 40px;
    			color:white;
    			width:43%;display: inline-block;" class="mr-3"
    			onclick="mkroom()"
    			>방만들기</div>
    			<div style="height: 30px; background-color: #748499; 
    			height: 40px;
    			color:white;
    			line-height: 40px;
    			width:43%;display: inline-block;">닫기</div>
    		</center>

    	</div>
   		

		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script>
		 	<?php
		 		echo "var p=\"".$_GET['phone']."\";";
		 	?>
		 </script>
		 <script type="text/javascript" src="js/mkroom.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>