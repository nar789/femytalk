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
                " class="pl-3 pr-3 mt-2" onclick="buy(1)">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 1000개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">5,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy(2)">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 2200개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">10,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buy(3)">

                    <div style="float:left;width: 60%;" class="mt-2">
                        <div style="font-size: 14px;font-weight: bold;">하트 구매</div>
                        <div style="font-size:12px;">하트 5000개 제공</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">20,000</div>
                </div>
                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buylevel(1)" id=lv1-g>

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">1Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">1000하트</div>
                </div>

                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buylevel(2)" id=lv2-g>

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">2Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">2500하트</div>
                </div>

                <div style="height: 60px; width: 100%; border:1px solid #d1d1d1;border-radius: 10px;
                " class="pl-3 pr-3 mt-2" onclick="buylevel(3)" id=lv3-g>

                    <div style="float:left;width: 60%;height: 60px; line-height: 60px;">
                        <div style="font-size: 15px;font-weight: bold;">3Lv 구매권</div>
                    </div>

                    <div style="float:right;color:#f07171;height: 60px; line-height: 60px;width: 40%;
                    text-align: right;">5000하트</div>
                </div>
               

               



            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/buyheart.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
