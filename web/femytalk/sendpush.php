<?php
  include ("dblib.php");
  $p1=$_POST['p1'];
  $p2=$_POST['p2'];

  define("GOOGLE_API_KEY", "AAAAmZ4PWSc:APA91bE8mFkEo7vB_D0u_2mSmRJV1dlNzYB85ENsz9i1wialeZ1d86NWF9CauxGaxPC9CIIfurU_p_6yV5jV9kBKhqiernYAFYPgpPNHEP9Bs62EW2TpwMgrAqFGQUO0ucCPNvDYCsMD");
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