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
        <div style="background-color: #F17171;
        height: 50px;line-height: 50px;
        color:white;font-weight: bold; font-size:20px;" class="pl-3 pr-3">페미톡<img src='img/setup.png' style="
        width:30px;float:right;margin-top:10px;"></div>
        <div style="background-color: #F59593; width:100%; height:1px;"></div>
        <div style="height: 90px; background-color: #f17171;padding-top:10px;">
            <center>
                <div class="nav-btn mr-3" style="display: inline-block;" onclick="menuclick(1)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/mainmenu_on_01.png' style="width: 30px;" id=i1> 
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">홈</p>
                </div>
                <div class="nav-btn mr-3" style="display: inline-block;" onclick="menuclick(2)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/mainmenu_off_02.png' style="width: 30px;" id=i2>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">페미</p>
                </div>
                <div class="nav-btn mr-3" style="display: inline-block;" onclick="menuclick(3)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/mainmenu_off_03.png' style="width: 30px;" id=i3>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">MY페미</p>
                </div>
                <div class="nav-btn mr-3" style="display: inline-block;" onclick="menuclick(4)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/mainmenu_off_04.png' style="width: 30px;" id=i4>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">페미판</p>
                </div>
                <div class="nav-btn" style="display: inline-block;" onclick="menuclick(5)">
                    <div class="circle" style="width:50px;height:50px;background-color: #F59593; border-radius:50px;padding-top:8px;">
                        <center>
                            <img src='img/mainmenu_off_05.png' style="width: 30px;" id=i5>
                        </center>
                    </div>
                    <p style="color:white;font-size:12px;">방만들기</p>
                </div>
            </center>
        </div>

        <div style="height:40px;width:45%;margin:0px;padding:0px; border-top: 1px solid #d1d1d1;
        border-bottom: 1px solid #d1d1d1; border-right:1px solid #d1d1d1;
        display: inline-block;background-color:#f5f5f5; line-height: 40px; font-size: 12px;">
            <img src='img/btn_bubble.png' style="height:25px;" class="ml-3 mr-1">
            0
            </div><div style="height:40px;width:45%;margin:0px;padding:0px; border-top: 1px solid #d1d1d1;
        border-bottom: 1px solid #d1d1d1; border-right:1px solid #d1d1d1; line-height: 40px;
        font-size: 12px;
        display: inline-block;background-color:#f5f5f5">
            <img src='img/btn_charge.png' style="height:25px;" class="ml-3 mr-1">
            충전
        </div><div style="
        height:40px;width:10%;margin:0px;padding:0px; line-height: 40px; border-top: 1px solid #d1d1d1;
        font-size: 12px;
        border-bottom: 1px solid #d1d1d1; 
        display: inline-block;background-color:#f5f5f5">
            <center><img src='img/btn_refresh.png' style="height:25px;"></center>
        </div>
        
        <iframe 
        id=ifr
        src='home.php' style="border:0px; width:100%; height:100%;" id=ifr
        onload="resize(this)"
        ></iframe>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
