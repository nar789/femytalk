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
        <center>
        <div class="card mb-3" style="width:70%; padding: 20px;">
            <h5 class="card-title">공지사항 추가</h5>
             <table class="table table-hover" >

                <thead>
                    <tr>
                      <th scope="col">제목</th>
                      <th scope="col">내용</th>
                    </tr>
                  </thead>
                  <tr>
                    <td><input id=title style="width:300px;"></td>
                    <td><textarea id=content style="width:400px;height: 100px;"></textarea></td>
                  </tr>
                </table>
                 <a href="#" onclick="create_notice()" class="btn btn-primary">추가하기</a>
        </div>
        </center>   
        
    	<?php
            include ("../dblib.php");
            $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
            if (!$conn) {
                echo "error";
            }

            $result=mysqli_query($conn,"select * from notice");
            
            ?>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">날짜</th>
                          <th scope="col">제목</th>
                          <th scope="col">내용</th>
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
                    echo $row['dt'];
                ?>
                </td>
                <td>
                <?php
                    echo "<input style='width:300px;' id=title".$row['id']." value=\"".$row['title']."\">";
                ?>
                </td>
                <td>
                <?php
                    echo "<textarea style='width:400px; height:100px;' id=content".$row['id'].">".$row['content']."</textarea>";
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
        <script type="text/javascript" src="js/notice.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
