<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body>
    	<input type=hidden id=rt value=1>
    	<div style="height: auto; background-color:#445061; " class="pb-3">
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
            <div class="pl-2 pr-2">
    		<center><input 
    			id=rname
    			type=text class="mt-3 pl-3"  style="width:100%;
    			height: 40px;
    			font-size: 13px; color:gray;"
    			placeholder="방 제목을 입력해 주세요."></center>
            <?php
                include ("dblib.php");
                $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
                if (!$conn) {
                    echo "error";
                }
                $result=mysqli_query($conn,"select * from user where phone='".$_GET['phone']."'");
                $row=mysqli_fetch_array($result);
                if($row['level']>=3){
            ?>
                <center class="mt-3"><input type=checkbox id=all> <div style="display: inline-block;color:white">전체방을 만드시겠습니까?</div></center>
            <?php
                }
            ?>
            <center class="mt-3" style="width:100%;overflow-x:hidden;"><div style="
                background-color: #f07171; 
    			height: 50px;
    			line-height: 50px;
    			color:white;
    			width:50%;display: inline-block;"
    			onclick="mkroom()"
    			>방만들기</div><div style="
                background-color: #748499; 
    			height: 50px;
    			color:white;
    			line-height: 50px;
    			width:50%;display: inline-block;">닫기</div></center>
            </div>

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