<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/chat.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="background-color: white;">
        

         <div style="background-color: #F17171;
        height: 50px;line-height: 50px;
        text-align: center;
        color:white;font-size:17px;" class="pl-3 pr-3" >
        <div style="display:inline-block;">
            
            <?php
                include ("dblib.php");
                $id=$_GET['id'];
                $p=$_GET['p'];
                $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
                if (!$conn) {
                    echo "error";
                }
                $result=mysqli_query($conn,"select name from chat where id=$id");
                $row=mysqli_fetch_array($result);
                echo $row[0];
                echo "<script>";
                $result=mysqli_query($conn,"select name from user where phone='$p'");
                $row=mysqli_fetch_array($result);
                echo "var mynick=\"".$row[0]."\";";
                echo "</script>"
            ?>

        </div>
        
        <img src='img/chat_btn_menu.png' style="
        width:20px;float:right;margin-top:15px;">
        <img 
        onclick="back()"
        src='img/chat_btn_back.png' style="
        width:15px;float:left;margin-top:15px;"></div>

        <div id=chat style="overflow:scroll;">
            <!--
            <div>
                <center>
                    <div
                    class="mt-3 mb-3 sys"
                     >찡찡이 님이 입장하셨습니다.</div>
                </center>
            </div>

            <div class="mt-1 msg">
                <div class="my-name">찡찡이▶</div>
                <div class="ml-2 my-msg">안녕하세요~</div>
            </div>


            <div class="mt-1 msg">
                <div class="you-name">매너남p▶</div>
                <div class="ml-2 you-msg">어서오세요~</div>
            </div>//-->
        </div>

        <div style="height:50px;position: absolute; bottom:0px; border-top:1px solid #ededed;
        width:100%;">
            <input
            id=msg
            type=text style="height: 50px; width:250px; border:0px;
            color:#999999;
            display: inline-block;"
            class="pl-3" placeholder="대화 입력" >
            <div 
            onclick="sendmsg()"
            style="height: 30px; display: inline-block; background-color:#F17171; width: 80px;
            border-radius: 10px;color:white; text-align: center; line-height: 30px;
            float:right; margin-top: 10px;" class="mr-3">보내기</div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        <?php
            echo "var id=".$_GET['id'].";";
            echo "var p='".$_GET['p']."';";
        ?>
        </script>
        <script type="text/javascript" src="js/chat.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
