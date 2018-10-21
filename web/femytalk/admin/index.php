<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="width:100%;height:100%;">
    	<div id=nav style='width:20%; border-right:1px solid gray;
    	vertical-align: top;
    	display: inline-block;'>
    		<div class="container pt-3">
    			<h3>페미톡 관리자 페이지</h3>
    			<h5>r3.0</h5>
    			<a onclick='m(1)' href='#'><li >유저목록</li></a>
    			<a onclick='m(2)' href='#'><li >하트소모량</li></a>
    			<a onclick='m(3)' href='#'><li >공지사항</li></a>
                <a onclick='m(4)' href='#'><li >페미판</li></a>
    		</div>
    	</div><iframe id=ifr src='user.php' style="height:100%;
    	width:80%;
    	border:0px;
    	display: inline-block;"></iframe>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
