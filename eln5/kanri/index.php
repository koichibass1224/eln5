<?php

 require "../function/functions.php";
 $pdo = connectDB();

$stmt = $pdo->prepare("SELECT * FROM user_table ");
$status = $stmt->execute();

$view="";
if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

    $view .=$result["u_name"].' &emsp; ';
    $view .=$result["u_mail"].' &emsp; ';
    $view .=$result["indate"].'<br>';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <script type="text/javascript" charset="UTF-8"></script>
  </head>
  <body>
  <div>
  <?=$view?>
  </div>
    <p>
      <h2>メール送信フォーム</h2>
    </p>
    <form action="confirm.php" method="post">
      <p>
        送信先
      </p>
      <input type="text" name="to">
      <p>
        メールのタイトル
      </p>
      <input type="text" name="title">
      <p>
        本文
      </p>
      <textarea name="content" cols="50" rows="5">
お世話になっております。ending_life_note運営事務局です。
この度はご愁傷様（ごしゅうしょうさま）でございます。心よりお悔やみ申し上げます
〇〇様のアカウントidおよびpasswordを発行致します。

      </textarea>
      <p>
        <input type="submit" name="send" value="送信">
      </p>
    </form>
  </body>
</html>