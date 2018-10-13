<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="background-color: white;">
        <script type="text/javascript">
            <?php
                echo "var go=\"".$_GET['go']."\";";
            ?>
        </script>
        <div style="background-color: #F17171;
        height: 50px;line-height: 50px;
        color:white;font-weight: bold; font-size:20px;" class="pl-3 pr-3"><div onclick="location.href='index.php'" style="display: inline-block;margin:0px;"><img src='img/logo.png' style="height: 20px;"></div><!--<img src='img/setup.png' style="
        width:30px;float:right;margin-top:10px;">//--></div>
        <div style="background-color: #F59593; width:100%; height:1px;"></div>
        <div style="height: 90px; background-color: #f17171;padding-top:10px;">
            <center>
                <div class="nav-btn mr-4" style="display: inline-block;" onclick="menuclick(1)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/setmenu_on_01.png' style="width: 30px;" id=i1> 
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">공지</p>
                </div>
                <div class="nav-btn mr-4" style="display: inline-block;" onclick="menuclick(2)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/setmenu_off_02.png' style="width: 30px;" id=i2>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">하트구매</p>
                </div>
                <div class="nav-btn mr-4" style="display: inline-block;" onclick="menuclick(3)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/setmenu_off_03.png' style="width: 30px;" id=i3>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">프로필</p>
                </div>
                <div class="nav-btn" style="display: inline-block;" onclick="menuclick(4)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/setmenu_off_04.png' style="width: 30px;" id=i4>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;" id=push-text>푸쉬 OFF</p>
                </div>
                
            </center>
        </div>

       
        <iframe id=ifr src='notice.php' style="border:0px; width:100%; height:100%;" id=ifr></iframe>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/setting.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
