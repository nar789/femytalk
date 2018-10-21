<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/board_detail.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
        <script type="text/javascript">
            <?php
                echo "var p=\"".$_GET['p']."\";"; //not writer just watcher
                echo "var id=\"".$_GET['id']."\";";
                if($_GET['update'])
                    echo "var update=".$_GET['update'].";";
                else
                    echo "var update=0;";
            ?>
        </script>
    </head>
    <body style="background-color: white;overflow: hidden;">
        
         <div style="background-color: #F17171;
        height: 50px;line-height: 50px;
        text-align: center;
        color:white;font-size:17px;" class="pl-3 pr-3" >
       
            <div style="display: inline-block;margin:0px;padding:0px;float:right;
            display: none;" id=my-btn-g>
                <div style="
                width:50px;float:right;font-size: 14px;" onclick="del_btn()">삭제</div>
                <div style="
                width:50px;float:right;font-size: 14px;" onclick="update_btn()">수정</div>
            </div>
            <div style="display: inline-block;margin:0px;padding:0px;float:right;" id=img-btn>
                <div style="
                float:right;font-size: 14px;" onclick="img()">사진삽입</div>
            </div>


            
            <img 
            onclick="back()"
            src='../img/chat_btn_back.png' style="
            width:15px;float:left;margin-top:15px;">
        </div>

        <div id=chat style="overflow-y:scroll;background-color: white;">
            <iframe src=contentimgup.php style="display: none;" id=ifr></iframe>
           <div style="width: 100%;height: 100%;border:0px;outline-style: none;
           background-color: white;" class="mt-2"
           id=content contentEditable="true"></div>
        </div>

        <div id=write-btn style="height: 50px; position: absolute; bottom:0px; background-color:#F17171; width: 100%; color:white;
        line-height: 50px; text-align: center;font-size: 20px; " onclick="save()">
            작성완료
        </div>
<!--
        <div id=msg-g style="height:50px;position: absolute; bottom:0px; border-top:1px solid #ededed;
        background-color: white;
        display: none;
        width:100%;">
            <div style="width: 30px; height: 30px; border:2px solid #bfc0c7; text-align: center; display: inline-block;
            border-radius: 10px;" class="ml-3" onclick="imgclick()">
                <img src='img/chatting_plus.png' style="width: 10px; height: 10px;">
            </div>
            <input
            id=msg
            type=text style="height: 50px; width:200px; border:0px;
            outline-style: none;
            color:#999999;
            display: inline-block;"
            class="pl-1" placeholder="댓글을 남겨주세요." >
            <div 
            onclick="sendmsg()"
            style="height: 30px; display: inline-block; background-color:#F17171; width: 80px;
            border-radius: 10px;color:white; text-align: center; line-height: 30px;
            float:right; margin-top: 10px;" class="mr-3">보내기</div>
        </div>
//-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/board_detail.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
