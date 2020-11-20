
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
    
    $ad1 = $result["ad1"];
    $contributor = $result["contributor"];
    $ad2 = $result["ad2"];
    $ad3 = $result["ad3"];
  }
}





//２．データ取得SQL作成 (login中のユーザーが登録したdataのみ表示)
$stmt = $pdo->prepare("SELECT * FROM profile_test_table WHERE contributor = '$u_name'");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

    $view .='<div class="uix-timeline__item">';
    $view .='<div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> ';
    $view .='<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> ';
    $view .='</div>';
    $view .='<div class="uix-timeline__item__info">';
    $view .='<a href="profile_detail.php?id='.$result["id"].'">'.'<h3>'.$result["ad1"].'</h3>'.'</a>';
    $view .='<p>'.$result["ad2"].'</p> ';
    $view .='<span class="uix-timeline__item__date">'.$result["ad3"].'</span> '.'</div>'.'<div class="uix-timeline__line">'.'</div>';
    $view .= '<a style="float:right;" href="profile_delete.php?id='.$result["id"].'">'."[ 削除 ]"."</a>";
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
    <style>
    </style>
</head>
<body>

<div class="uix-breadcrumbs is-fullwidth uix-t-c">
							<ul>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;" href="../index.php">Page top : トップページ</a></li>
								<li class="is-active" style="width:25%;"><a style="overflow: hidden;"href="profile.php">Profile : プロフィール</a></li>
								<li  style="width:25%;"><a style="overflow: hidden;" href="textupload_profile.php"><span>Profile : プロフィール2</span></a></li>  
								<li  style="width:25%;"><a style="overflow: hidden;" href="history_profile.php">Profile : プロフィール3</a></li>  
							</ul>
            </div>
         
<div class="col-md-12" style="margin:0 auto; width:80%;">
 <div class="row content-grid-3">
  <section class="uix-spacing--s">
    <div class="container">
      <div class="row">
    <div class="col-12">
      <div class="uix-team--fullwidth">
        <div class="uix-list-abreast-img">
          <div class="uix-list-abreast-img__item">

      <div class="uix-list-abreast-img__item__left">
        <div class="uix-list-abreast-img__item__img uix-border--circle uix-border--circle-only-img"> 

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
        </div>
      </div>
      <div class="uix-list-abreast-img__item__right">
            <h4><?=$contributor?></h4>
          <div class="uix-list-abreast-img__item-social">
            <em><?=$ad2?></em>
      </div>
      <div class="uix-list-abreast-img__item__desc">
          <p><?=$ad3?></p>
      </div>
          </div>
          
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    </div>

<!-- <div class="col-md-12" style="margin:0 auto; width:80%;">
<img class="logo"src="../img/logo.000.png" alt="">
<h3 class="to_user"><?=$u_name?>'s Data list</h3>
<p>思い出を振り返ってみましょう。あなたの生まれた場所はどこですか？</br>思い出の場所はどこですか？
ひとつづつ記録を残していきましょう。</p>
</div>
<div class="col-md-12" style="margin:0 auto; width:80%;">
      <table class="table">
        <thead>
            <tr>
              <th>出来事</th>
              <th>内容</th>
              <th>日時</th>
            </tr>
        </thead>
        <tbody>
          <tr>
              <td><input type="text" name="ad1"id="ad1"></td>
              <td><input type="text" name="ad2"id="ad2"></td>
              <td><input type="text" name="ad3" id="ad3"value="date:"></td>
          </tr>
        </tbody>
      </table>
               <button type="submit" id="submit" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">保存</button>
    </div> -->

 <!-- Content 
			====================================================== -->
			<section class="uix-spacing--s">
				<div class="container">
						<div class="row">
							<div class="col-12">

                               <div class="uix-timeline__container-wrapper is-vertical">
                                    <div class="uix-timeline__container">
                                        <div class="uix-timeline"> 

                                        <?=$view?>

                                            <div class="uix-timeline__item">
                                                <div class="uix-timeline__item__img uix-border--circle uix-border--circle-only-img"> 
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mM8Z2X3HwAFawJH9fA6+AAAAABJRU5ErkJggg==" alt=""> 
                                                </div>

                                                <div class="uix-timeline__item__info">
                                                    <h3>　　　　</h3>
                                                    <p>　　　</p> 
                                                    <span class="uix-timeline__item__date">date</span> 
                                                </div>
                                                <div class="uix-timeline__line"></div>
                                            </div> 
                                            <!-- /.uix-timeline__item -->

                                        </div> 
                                        <!-- .uix-timeline end -->  
                                    </div>
                                    <!-- /.uix-timeline__container -->
                                </div>
                                <!-- /.uix-timeline__container-wrapper -->
							</div>
						</div>
						<!-- .row end -->
				</div>
				<!-- .container end -->
			</section>

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
  <script src="../js/anime.min.js"></script>



  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 

  <script>
	        $("#submit").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "profile_insert.php",
                data: {
                    ad1:$("#ad1").val() ,
                    ad2:$("#ad2").val() ,
                    ad3:$("#ad3").val() ,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    // alert("Already inputted!");
                    $("#ad1").val("");
                    $("#ad2").val("");
                    $("#ad3").val("");
                  }
                }
            });
        });
	</script> 

</body>
</html>