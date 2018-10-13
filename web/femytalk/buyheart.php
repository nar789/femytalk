<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/buyheart.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="background-color: white;">
        <script type="text/javascript">
            <?php
                echo "var p=\"".$_GET['p']."\";";
            ?>
        </script>
        <div style="background-color: black; height: 40px; width: 100%;color: white;
        line-height: 40px;"
        class="pl-3 pr-3">
            <p style="color:white; display: inline-block;font-size: 12px;">현재 보유중인 하트</p>
            <p style="display: inline-block; 
            float:right;color: white;font-size: 12px;" >개</p>
            <p style="color:#f05c54;font-size: 14px;display: inline-block;float:right;"
            class="mr-1" id=heart-cnt
            >?</p>
        </div>

        <div class="container pt-1" >

                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 100개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">30,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 200개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">50,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 400개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">80,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">1Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">80하트</div>
                </div>

                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">2Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">150하트</div>
                </div>

                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy()">

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">3Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">250하트</div>
                </div>
               

               



            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/buyheart.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
