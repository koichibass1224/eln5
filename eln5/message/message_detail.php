<?php

$id = $_GET["id"];

require "../function/functions.php";
$pdo = connectDB();

$stmt = $pdo->prepare("SELECT * FROM message_table WHERE id=:id");
$stmt ->bindvalue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) { 
  sql_error($stmt);
}else{
  $row = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message_detail</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="../css/uix-kit.min.css"/>
<link rel="stylesheet" href="../css/index.css"/>

  <style>
    body{font-family:'serif';}
    canvas {
      position: relative;
      border:3px solid #000;
    }
  </style>
</head>

<body>
<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="message.php">Message1 : メッセージ1</a></li>
								<li class="is-active"   style="width:25%;"><a style="overflow: hidden;" href="message_detail.php"><span>Message2 : メッセージ2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="#">Message3 : メッセージ3</a></li>  
							</ul>
            </div>
<img src="../img/logo.000.png" style="width:20%;" alt="">

<!--message/input-->
<div class="container profile">
  <div class="row">
    <div class="inbox col-md-12">

 <h1>Message</h1>
  <p>一番大切な人へのメッセージを残しましょう。</p>
  <form name="form">
      <td><textarea name="who" cols="100%" rows="1"><?=$row['ad1']?></textarea></td>
      <td><textarea name="message"  cols="100%" rows="10"><?=$row['ad2']?><?=$message?></textarea></td>
      <canvas class="canvas" id="drawarea" width="300" height="300"></canvas><br>
      <input type="button" id="btn1" value="呼出" onclick="setBase64();" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">
    </div>
  </div>
</div>

<div class="pagetop">
    <a href="../index.php">▲ page to TOP </a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
//load_event
function setBase64(){
  var cvs = document.getElementById('drawarea');
  var ctx= cvs.getContext('2d');

  var img = new Image();
  var url = JSON.parse('<?=$row['ad3']?>');//JSON: data parse
  console.log(url);
  img.src = url;
  img.onload = function(){
  ctx.drawImage(img, 0, 0, 300, 300); //fix to canvas size
  }
}
  </script>

</body>
</html>

