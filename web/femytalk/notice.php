<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/notice.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="background-color: white;">
        <div class="container">
        <?php
            include ("dblib.php");
            $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
            if (!$conn) {
                echo "error";
            }
            $result=mysqli_query($conn,"select * from notice order by dt desc");
            while($row=mysqli_fetch_array($result)){
        ?>
        
            <div style="height:50px;width: 100%; 
            border-bottom: 1px solid #d1d1d1;
            font-size: 12px;
            background-color: white;line-height: 50px;" class="pl-2"
        <?php
            echo "onclick=\"content(".$row['id'].")\"";
            ?>
            >
                <div style="display: inline-block;color: #ffce47;"
                class="mr-2">
                <?php
                    echo $row['dt'];
                ?>
                </div>
                <div style="display: inline-block;
                font-size: 12px;
                font-weight: bold;">
                    <?php
                        echo $row['title'];
                    ?>
                </div>
            </div>
            <div 
            <?php
                echo "id=content".$row['id'];
            ?>
            style="height:150px;width: 100%; 
            display: none;
            border-bottom: 1px solid #d1d1d1;"
            >
                <textarea style="border:0px;font-size: 12px;width: 100%;height: 100%;margin:0px;text-align: center;" disabled="disabled"><?php
echo $row['content'];
?></textarea>
            </div>
        <?php
            }
        ?>
    </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/notice.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
