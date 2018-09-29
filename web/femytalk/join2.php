<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/join.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>

    	<div style="height:250px;
    	background-image: url('img/pat.png');
    	background-size: 20px;
    	">
    		<img src='img/join_btn_back.png' style="width: 20px;" class="ml-3 mt-3">
    		<center><div onclick="photo();" style="width:120px; height: 120px; background-color: #f59593; border-radius: 150px;
    		line-height: 110px;"
    			class="mt-3">
    				<img id=photo2 src="" style="display: none;width: 100%; height: 100%;
    				border-radius: 50px;">
    				<img id=photo src='img/join_thumbnail_camera.png' style="width:50px;">
    				<div id=plus style="width:50px;height:50px;background-color: white;
    				border-radius: 50px;margin-left:80px;margin-top: -40px;">
    					<img src='img/join_thumbnail_btn_add.png' style="width:25px;margin-top: -60px;">
    				</div>
    			</div>
    			<p style="color:white;" class="mt-3">프로필사진</p>
    		</center>
    	</div>
    	<div class="container pt-4">
    		<div style="height:70px;
    		border-bottom: 1px solid #cfcfcf;line-height: 40px;"
    		class="pl-3 pr-3 pt-3 pb-3" 
    		>
    			<p 
    			style="display: inline-block;
    			font-size: 15px;
    			color:gray;font-weight: bold;" class="mr-1">성별</p>
    			<!--<input type=text style="height: 100%; border:0px;">//-->
    			
	    			<select id=sex style="float:right;border:0px;color:#f07171; width:60px;background-color: transparent;
	    			height: 40px;">
	    				<option>여자</option>
	    				<option>남자</option>
	    			</select>
    		</div>

    		<div style="height:70px;
    		border-bottom: 1px solid #cfcfcf;line-height: 40px;"
    		class="pl-3 pr-3 pt-3 pb-3" 
    		>
    			<p 
    			style="display: inline-block;
    			font-size: 15px;
    			color:gray;font-weight: bold;" class="mr-1">닉네임</p>
    			
    			<div style="
    			float:right;
    			background-color:#f07171;
    			height: 40px;
    			color:white;
    			border-radius: 5px;
    			line-height: 40px;
    			width: 60px;
    			font-size: 12px;
    			text-align: center;
    			display: inline-block;
    			" class="ml-2" onclick="namecheck()">중복확인</div>
	    		<input id=name type=text style="border:0px;width: 150px;display: inline-block;
    			float:right; font-size: 12px; color:gray;"
    			placeholder="최대 7글자를 입력하세요.">	
    		</div>

    		<div style="height:70px;
    		border-bottom: 1px solid #cfcfcf;line-height: 40px;"
    		class="pl-3 pr-3 pt-3 pb-3" 
    		>
    			<p 
    			style="display: inline-block;
    			font-size: 15px;
    			color:gray;font-weight: bold;" class="mr-1">나이</p>
    			
    			<select id=age style="float:right;border:0px;color:#f07171; width:60px;background-color: transparent;
	    			height: 40px;">
	    				<option selected="selected">20세</option>
	    				<?php
	    					for($i=21;$i<=70;$i++){
	    						echo "<option>".$i."세</option>";
	    					}
	    				?>
	    			</select>
    			
    		</div>

    		<div style="height:70px;
    		border-bottom: 1px solid #cfcfcf;line-height: 40px;"
    		class="pl-3 pr-3 pt-3 pb-3" 
    		>
    			<p 
    			style="display: inline-block;
    			font-size: 15px;
    			color:gray;font-weight: bold;" class="mr-1">지역</p>

    			<select id=region1 style="float:right;border:0px;color:#f07171; width:60px;background-color: transparent;
	    			height: 40px; width:80px;" class="ml-3">
	    				<option selected="selected">강남구</option>
	    			</select>
    			
    			<select id=region2 style="float:right;border:0px;color:#f07171; width:60px;background-color: transparent;
	    			height: 40px;">
	    				<option selected="selected">서울</option>
	    		</select>
    			
    		</div>

    		<div style="height:70px;
    		border-bottom: 1px solid #cfcfcf;line-height: 40px;"
    		class="pl-3 pr-3 pt-3 pb-3" 
    		>
    			<p 
    			style="display: inline-block;
    			font-size: 15px;
    			color:gray;font-weight: bold;" class="mr-1">유입경로</p>

    			<select id=upto style="float:right;border:0px;color:#f07171; width:60px;background-color: transparent;
	    			height: 40px;width:120px;">
	    				<option selected="selected">인터넷광고</option>
	    		</select>
    			
    		</div>

    		<center><div
    			style="
    			text-align: center;
    			width: 300px;
    			height: 40px;
    			line-height: 40px;
    			color:white;
    			font-weight: bold;
    			background-color:#f07171; 
    			border-radius: 30px;" class="mt-5" onclick="save()">저장하기</div></center>



    	</div>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/join.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
