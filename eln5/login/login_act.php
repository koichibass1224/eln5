<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1.  connect DB
include("../function/functions.php");
$pdo = connectDB();

//2. get data SQL
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE u_name=:lid");
$stmt->bindValue(':lid', $lid,PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();

//3. error check
if($status==false){
    sql_error($stmt);
}

//4. get data
$val = $stmt->fetch();//fetch=1レコード

//5. 該当レコードがあればSESSIONに値を代入
 if( password_verify($lpw,$val["u_pw"]) ){
  $_SESSION["chk_ssid"]  = session_id() ;
  $_SESSION["u_name"] = $val['u_name'];
      if($val["life_flg"] !=0){
      header("Location: ../kanri/index.php");
        }else{
          header("Location: ../index.php");
        }
}else{
  header("Location: ../top.php");
}
exit();


