<?php
//1. POSTデータ取得
session_start();
$u_name = $_POST["u_name"];
$u_mail = $_POST["u_mail"];
$b_u_pw = $_POST["u_pw"];
$life_flg = $_POST["life_flg"];

//passwordをhash化する
$u_pw = password_hash("$b_u_pw",PASSWORD_DEFAULT);
$_SESSION["u_name"]   = $u_name;
$_SESSION["u_mail"]   = $u_mail;

//入力チェック(受信確認処理追加)
if (
  !isset($_POST["u_name"])|| $_POST["u_name"] ==""||//nameがpostされてなくて、値が空なら
  !isset($_POST["u_mail"])|| $_POST["u_mail"] ==""||
  !isset($_POST["u_pw"])|| $_POST["u_pw"] ==""||
  !isset($_POST["life_flg"])|| $_POST["life_flg"] ==""
){
  //exit('ParamEroor');
  header('Location: ../top.php');
}

include("../function/functions.php");
$pdo = connectDB();

$stmt = $pdo->prepare("INSERT INTO user_table(id,u_name,u_mail,u_pw,life_flg,indate)
VALUES(NULL,:u_name,:u_mail,:u_pw,:life_flg,sysdate())");
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR); 
$stmt->bindValue(':u_mail', $u_mail, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  if($error[1]==1062){
    echo "'$u_mail' is registered with another account.<br>";
    echo "<a href = \"../top.php\">Back to Top</a><br><br>";
  }
  exit("ErrorNumber:".$error[1]); 
  
}else{
header('Location: acc_registered.php');
}

?>