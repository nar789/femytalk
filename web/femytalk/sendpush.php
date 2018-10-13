<?php
  include ("dblib.php");
  $p1=$_POST['p1'];
  $p2=$_POST['p2'];

  define("GOOGLE_API_KEY", "AAAAQ5OE9e8:APA91bEk3uVTbEM_s1MbBHstwqRGZ2Xu9a3L2U8_cE5R1m39QYAFHHVPtA3aNAO36Kdu7FbDtDYkO6xu79BPEFOCC0RlvZgzFE-WOD13KuWu3YIXV5Bt5NsF4rUgWZtf4SjB-CtUmFPE");
  echo GOOGLE_API_KEY;

  function send_fcm($message, $v) {
 
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array (
    'Authorization: key='.GOOGLE_API_KEY,
    'Content-Type: application/json'
    );
    $fields = array (
    'data' => array ("message" => $message),
    'notification' => array ("body" => $message,"sound"=>"default")
    );
    $fields['to'] = $v;
     $fields['priority'] = "high";
    $fields = json_encode ($fields);
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
    echo $result = curl_exec ( $ch );
    if ($result === FALSE) {
    //die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close ( $ch );
  
}
  function send_notification ($tokens, $message)
  {
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
       'registration_ids' => $tokens,
       'data' => $message
      );

    $headers = array(
      'Authorization:key ='.GOOGLE_API_KEY,
      'Content-Type: application/json'
      );

     $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
  }

  


  $conn=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
  if (!$conn) {
      echo "error";
  }

  

  $result=mysqli_query($conn,"select * from user where phone='$p2'");
  
  $row=mysqli_fetch_array($result);
  $token=$row['token'];
  
  

  $result=mysqli_query($conn,"select * from user where phone='$p1'");
  $row=mysqli_fetch_array($result);
  $name=$row['name'];



  $msg=$name."님이 1:1대화를 요청했습니다.";

  send_fcm($msg,$token);
  //echo send_notification($token,$msg);
?>