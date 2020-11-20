<?php
//session_check
session_start();
if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
  echo"LOGIN Error";
  exit();
}else{
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
}
?>

<?php
session_start();

include("../function/functions2.php");
loginCheck();

$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "../function/functions.php";
 $pdo = connectDB();

$stmt = $pdo->prepare("SELECT * FROM message_table WHERE contributor = '$u_name'");
$status = $stmt->execute();

if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){  
    $view .= '<a href="message_detail.php?id='.$result["id"].'">';
    $view .= $result['ad1'].'</a>'.'<br>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message</title>

<!-- <link rel="stylesheet" href="../css/index.css"> -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="../css/uix-kit.min.css"/>
<link rel="stylesheet" href="../css/index.css"/>

</head>

  <style>
    body{font-family:'serif';}
    canvas {
      position: relative;
      border:3px solid #000;}
    .who{margin-top:100px;}
  </style>
</head>

<body>
<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="message.php">Message1 : メッセージ1</a></li>
								<li  style="width:25%;"><a style="overflow: hidden;" href="message_detail.php"><span>Message2 : メッセージ2</span></a></li>  
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
      <td><textarea name="who" cols="100%" rows="1"></textarea></td>
      <td><textarea name="message"  cols="100%" rows="10"></textarea></td>
        <canvas class="canvas" id="drawarea" width="300" height="300"></canvas><br>
          <input type="button" id="save_btn" value="保存" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary"> 
    </form>
  <div class="who">
  <p>
  メッセージを呼び出す：<br>
  <?=$view?>
  </p>
  </div>

  </div>
  </div>
</div>

<div class="pagetop">
    <a href="../index.php">▲ page to TOP </a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

let canvas_mouse_event = false;
let oldX = 0;
let oldY = 0;
let bold_line = 3;
let color = "#000000";

const can =$("#drawarea")[0];
const ctx = can.getContext("2d");

//mouse_on event
$(can).on("mousedown", function(e){
 oldY = e.offsetY;
 oldX = e.offsetX;
 canvas_mouse_event = true;
});

//draw
$(can).on("mousemove",function(e){
if (canvas_mouse_event == true){
const px = e.offsetX;
const py = e.offsetY;
ctx.strokeStyle = color;
ctx.lineWidth = bold_line;
ctx.beginPath();
ctx.lineJoin= "round";
ctx.lineCan= "round";
ctx.moveTo(oldX,oldY);
ctx.lineTo(px,py);
ctx.stroke();
oldX = px;
oldY = py;
}
});

//finish by mouseup
$(can).on("mouseup",function(){
canvas_mouse_event = false;
});

//save_event
$("#save_btn").on("click",function(){
var canvas = document.getElementById("drawarea");
var message = document.form.message.value; //document.getElementById(""),valueでもok
var who = document.form.who.value; 
var url = canvas.toDataURL();
var url2 = JSON.stringify(url);//JSONで渡さないと呼び込めない。

$.ajax({
  type: 'POST',
  url: 'insert_message.php',
  data: {
    'message' : message,
    'who' : who,
    'sign' : url2,
  },
  /*success: function(data) {
    alert(url);
  }*/
});
});

  </script>

</body>
</html>

