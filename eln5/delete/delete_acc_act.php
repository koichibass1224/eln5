<?php
//1.passwordのpostデータ受信とsessionデータ処理
session_start();
$u_name = $_SESSION['u_name'];
$u_id = $_SESSION["u_id"];
$u_pw = $_POST["u_pw"];

// var_dump($u_pw);

//session idのチェック
include("funcs.php"); //今は同じ階層なのでこの書き方でOK
loginCheck();

//2.DB接続
try {
    $pdo = new PDO('mysql:dbname=MR_database;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}


//3.sessionデータのIDと名前が一致するユーザーがデータベースにあるか確認・データ取得SQL作成
$sql = "SELECT * FROM mrdb_user_table WHERE u_name=:u_name and id=:u_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_name', $u_name);
$stmt->bindValue(':u_id', $u_id);
$res = $stmt->execute(); //エラー対策

//SQL実行時にエラーがある場合
if ($res == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:" . $error[2]);
} else {
    $val = $stmt->fetch();
    $old_id = $val["id"];
    $old_uname = $val["u_name"];
    $old_umail = $val["u_mail"];
    $old_upw = $val["u_pw"];
    $old_indate = $val["indate"];
    // echo $old_id . $old_uname . $old_umail . $old_upw . $old_upw . $old_indate;
    if (password_verify($_POST['u_pw'], $old_upw)) {

        //old_user_tabel入力処理
        $stmt2 = $pdo->prepare("INSERT INTO old_user_table(id,old_id,old_u_name,old_u_mail,old_u_pw,old_indate,indate)
VALUES(NULL,:a1,:a2,:a3,:a4,:a5,sysdate())");
        $stmt2->bindValue(':a1', $old_id, PDO::PARAM_INT);
        $stmt2->bindValue(':a2', $old_uname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt2->bindValue(':a3', $old_umail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt2->bindValue(':a4', $old_upw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $stmt2->bindValue(':a5', $old_indate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $status2 = $stmt2->execute();

        //delete処理
        $stmt3 = $pdo->query('SET foreign_key_checks = 0');
        $stmt3 = $pdo->prepare("DELETE FROM mrdb_user_table WHERE id= :id");
        $stmt3->bindValue(':id', $u_id, PDO::PARAM_INT);
        $stmt3 = $pdo->query('SET foreign_key_checks = 1');
        $status3 = $stmt3->execute();
    } else {
        echo "Password is not correct";
    }
}

//４．データ登録処理後
if ($status2 == false || $status3 == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error2 = $stmt2->errorInfo();
    $error3 = $stmt3->errorInfo();
    exit("QueryError:" . $error2[2] . $error3[2]);
} else {
    //delete_success.phpへリダイレクト
    header("Location: login.php");
    exit;
}
