
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
// $id = $_GET["id"]; //?id~**を受け取る

include("../function/functions2.php");
loginCheck();

session_start();
$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "../function/functions.php";
 $pdo = connectDB();

//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM image_table WHERE contributor = '$u_name'");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

    // $view .='<div class="row content-grid-3"><section class="uix-spacing--s"><div class="container"><div class="row">
    // <div class="col-12"><div class="uix-team--fullwidth"><div class="uix-list-abreast-img"><div class="uix-list-abreast-img__item"><div class="uix-list-abreast-img__item__left">
    // <div class="uix-list-abreast-img__item__img uix-border--circle uix-border--circle-only-img"> ';
    // $view .='<img style="" src="upload/';
    // $view .= $result["ad1"];
    // $view .='">';
    // $view .='</div></div><div class="uix-list-abreast-img__item__right">';
    // $view .='<h4>';
    // $view .= $result["contributor"];
    // $view .='</h4>';
    // $view .='<div class="uix-list-abreast-img__item-social">';
    // $view .= '<em>';
    // $view .= $result["ad2"];
    // $view .='</em>'; 
    // $view .='</div><div class="uix-list-abreast-img__item__desc">';
    // $view .='<p>';
    // $view .= $result["ad3"];
    // $view .='</p></div></div></div>';
    // $view .='</div></div></div></div></div></section></div>';

    $ad1 = $result["ad1"];
    $contributor = $result["contributor"];
    $ad2 = $result["ad2"];
    $ad3 = $result["ad3"];
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>profile_textupload</title>
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
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="profile.php">Profile : プロフィール</a></li>
								<li  class="is-active" style="width:25%;"><a style="overflow: hidden;" href="textupload_profile.php"><span>Profile : プロフィール2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="history_profile.php">Profile : プロフィール3</a></li>  
							</ul>
            </div>
         
            
<div class="col-md-12" style="margin:0 auto; width:80%;">
    <img class="logo"src="../img/logo.000.png" alt="">
       <h3 class="tuser" style="font-family:'mincho';"><?=$u_name?>'s Profile</h3>

            <form method="post" action="fileupload_textprofile.php" enctype="multipart/form-data">
                <input type="file" name="upfile" accept="image/*" capture="camera" value="profile image">
                <input type="text" name="ad2" placeholder="生年月日：about your birthday.">
                <textarea type="text" name="ad3" placeholder="自分自身について：about your profile."></textarea>
                  <!-- style="display:none" -->
                <input type="submit" class="" value="Profile_アップロード">
            </form>

</div>

<div class="row content-grid-3"><section class="uix-spacing--s"><div class="container"><div class="row">
    <div class="col-12"><div class="uix-team--fullwidth"><div class="uix-list-abreast-img"><div class="uix-list-abreast-img__item"><div class="uix-list-abreast-img__item__left">
    <div class="uix-list-abreast-img__item__img uix-border--circle uix-border--circle-only-img"> 

<!-- <img style="" src="upload/<?=$ad1?>"> -->

    							<!-- <div class="grid-item"> -->
								<div class="thumbnail">
									<a id="img-1" data-toolbar class="overlay-link tml-link " href="upload/<?=$ad1?>" data-caption="This is a caption">
										<img src="upload/<?=$ad1?>" alt=""/>
										<span class="overlay-info animation-fade-in">
											<span>
												<span>
													<?=$u_name?>
												</span>
											</span>
										</span>
									</a>
								</div>
              <!-- </div> -->

</div>
</div>
    <div class="uix-list-abreast-img__item__right">

    <h4><?=$contributor?></h4>
    <div class="uix-list-abreast-img__item-social">

    <em><?=$ad2?></em>
    </div><div class="uix-list-abreast-img__item__desc">

    <p><?=$ad3?></p>
    </div></div></div></div></div></div></div></div></section></div>

<!-- <?=$view?> -->

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


</body>
</html>