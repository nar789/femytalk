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

            $result=mysqli_query($conn,"select * from user order by loginstate desc");
            if(mysqli_num_rows($result)==0){
                echo "<center><p class='mt-5' style='color:gray;'>접속중인 페미가 없습니다.</p></center>";
            }
            ?>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">이름</th>
                          <th scope="col">사진</th>
                          <th scope="col">성별</th>
                          <th scope="col">나이</th>
                          <th scope="col">지역</th>
                          <th scope="col">유입경로</th>
                          <th scope="col">폰번호</th>
                          <th scope="col">로그인시간</th>
                          <th scope="col">레벨</th>
                          <th scope="col">하트</th>
                          <th scope="col">수정</th>
                          <th scope="col">삭제</th>
                        </tr>
                      </thead>
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                <tr>
                <td>
                <?php
                    echo $row['id'];
                ?>
                </td>
                <td>
                <?php
                    echo $row['name'];
                ?>
                </td>
                <td>
                <?php
                    echo "<img width=100 height=100 src=".$row['img'].">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=sex".$row['id']." value=\"".$row['sex']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=age".$row['id']." value=\"".$row['age']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input id=region".$row['id']." value=\"".$row['region']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input id=upto".$row['id']." value=\"".$row['upto']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo $row['phone'];
                ?>
                </td>
                <td>
                <?php
                    echo $row['loginstate'];
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=level".$row['id']." value=\"".$row['level']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:50px;' id=heart".$row['id']." value=\"".$row['heart']."\">";
                ?>
                </td>
                <td>
                <button class="btn btn-primary"
                <?php
                    echo "onclick='update(".$row['id'].")'";
                ?>
                >수정</button>
                </td>
                <td>
                <button class="btn btn-danger"
                <?php
                    echo "onclick='del(".$row['id'].")'";
                ?>
                >삭제</button>
                </td>
                </tr>
                <?php
            }
        ?>
  	     </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/user.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
