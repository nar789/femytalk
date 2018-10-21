<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>femytalk</title>
    </head>
    <body style="width:100%;">
        <div class="container pt-5" style="width:100%;">
    	<?php
            include ("../dblib.php");
            $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
            if (!$conn) {
                echo "error";
            }

            $result=mysqli_query($conn,"select * from heart;");
            
            ?>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                          <th scope="col">초기가입 하트 소모량</th>
                          <th scope="col">오붓한방(2명) 하트 소모량</th>
                          <th scope="col">왁자지껄(10명) 하트 소모량</th>
                          <th scope="col">아주큰방(20명) 하트 소모량</th>
                          <th scope="col">수정</th>
                        </tr>
                      </thead>
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                <tr>
            
                <td>
                <?php
                    echo "<input style='width:50px;' id=init value=\"".$row['init']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=r1 value=\"".$row['r1']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=r2 value=\"".$row['r2']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=r3 value=\"".$row['r3']."\">";
                ?>
                </td>
                
                <td>
                <button class="btn btn-primary"
                <?php
                    echo "onclick='update()'";
                ?>
                >수정</button>
                </td>
                </tr>
                <?php
            }
        ?>
  	     </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/heart.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
