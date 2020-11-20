<?php
session_start();
$u_name=$_SESSION['u_name'];

//session idのチェック
session_start();

include("../function/functions2.php");
loginCheck();

//1. POSTデータ取得
$ad1 = $_POST["author"];
$ad2 = $_POST["email"];
$ad3 = $_POST["comments"];

//2. DB接続
require "../function/functions.php";
$pdo = connectDB();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO contact_table(id,ad1,ad2,ad3,ad4,indate)VALUES(NULL,:ad1,:ad2,:ad3,:ad4,sysdate())");
$stmt->bindValue(':ad1', $ad1, PDO::PARAM_STR);
$stmt->bindValue(':ad2', $ad2, PDO::PARAM_STR);
$stmt->bindValue(':ad3', $ad3, PDO::PARAM_STR);
$stmt->bindValue(':ad4', $u_name, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
// if($status==false){
//   $error = $stmt->errorInfo();
//   exit("ErrorMassage:".$error[2]);
// }else{

// //５．index.phpへリダイレクト
//   header("Location: about.php");
// }
?>
