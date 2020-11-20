<?php
//1. GETでidを取得
$id = $_GET["id"];

session_start();
$id_flg=$_SESSION['id_flg'];

// $id = $_POST["id"];
// $id_flg=$_POST['id_flg'];

// DBに接続
require "../function/functions.php";
$pdo = connectDB();

//3. データ削除SQLを準備
$delete = $pdo->prepare("DELETE FROM profile_image_table WHERE id=:id");
$delete->bindvalue(":id",$id,PDO::PARAM_INT);

//4. SQL実行
$status = $delete->execute();

//5. 一覧ページへ戻す
if ($status == false) { 
    sql_error($delete);
  }else{
    // header("Location: profile_detail.php?id=$id_flg");
    header("Location: profile_detail.php?id=$id_flg");
  }

?>