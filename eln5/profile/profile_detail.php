
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

<!-- < ?php
ini_set('display_errors',1);
//error check
?> -->

<?php
$id = $_GET["id"]; //?id~**を受け取る

include("../function/functions2.php");
loginCheck();

session_start();
$u_name=$_SESSION['u_name'];
$id_flg=$_SESSION['id_flg'];

//1.  DB接続
 require "../function/functions.php";
 $pdo = connectDB();

//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM profile_image_table WHERE contributor = '$u_name' AND 
id_flg = '$id'
");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

    $view .='<div class="grid-item"style="width:300px;height:250px;overflow:hidden;">';
    $view .='<div class="thumbnail">';
    $view .= '<a href="image_delete.php?id='.$result["id"].'">'."[ 削除 ]"."</a>";
    $view .='<a id="img-1" data-toolbar class="overlay-link tml-link " href="upload/'.$result["images"].'" data-caption="'.$result["comment"].'">';
    $view .='<img style="" src="upload/'.$result["images"].'">';
    $view .='<span class="overlay-info animation-fade-in">';
    $view .='<span>'.'<span>';
    $view .=$result["comment"];
    $view .='</span>'.'</span>'.'</span>';
    $view .= '</a>';
    // $view .= '<input type="submit" value="delete" id="delete">';
    $view .='</div>';
    $view .='</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>profile_info_test</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/uix-kit.min.css"/>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/core.min.css" />

    <style>
    </style>
</head>
<body>

<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="#">Profile : プロフィール</a></li>
								<li  class="is-active" style="width:25%;"><a style="overflow: hidden;" href="#"><span>Profile : プロフィール2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="#">Profile : プロフィール3</a></li>  
							</ul>
            </div>
            
<div class="col-md-12" style="margin:0 auto; width:80%;">
    <img class="logo"src="../img/logo.000.png" alt="">
       <h3 class="tuser" style="font-family:'mincho';"><?=$u_name?>'s Album</h3>

            <form method="post" action="fileupload.php" enctype="multipart/form-data">
                <input type="file" name="upfile" accept="image/*" capture="camera">
                <input type="text" name="comment" placeholder="思い出をコメント：fill in your remember.">
                <input style="display:none"type="text" name="id_flg" value=<?=$id?>>
                  <!-- style="display:none" -->
                <input type="submit" class="" value="Fileアップロード">
            </form>
</div>
<!-- <div id="photarea"></div> -->

<div class="row content-grid-3">
							<!-- <div class="grid-item">
								<div class="thumbnail">
									<a id="img-1" data-toolbar class="overlay-link tml-link " href="../img/top_01.jpg" data-caption="This is a caption">
										<img src="../img/top_01.jpg" alt=""/>
										<span class="overlay-info animation-fade-in">
											<span>
												<span>
													This is a overlay-caption
												</span>
											</span>
										</span>
									</a>
								</div>
              </div> -->
              <?=$view?>
</div>

 <div class="pagetop">
    <a href="../index.php">▲ page to TOP </a>
</div>
			

<!-- Your Plugins & Theme Scripts  end -->
<script src="../js/uix-kit.min.js"></script>

<script src="../js/axios.min.js?ver=0.19.2"></script>
<script src="../js/jquery.waitforimages.min.js"></script>
<script src="../js/TweenMax.min.js"></script>
  <script src="../js/video.min.js"></script>
  <script src="../js/template7.min.js"></script>
  <script src="../js/pixi.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 

  <!-- <script>
	        $("#delete").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "image_delete.php",
                data: {
                  id:<?=$id?>,
                  // id_flg:$id_flg,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    alert("Already inputted!");
                  }
                }
            });
        });
	</script> -->

</body>
</html>