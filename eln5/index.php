<?php
//session_check
session_start();
if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
  echo"LOGIN Error";
  exit();
}else{
  session_regenerate_id(true);
  $_SESSION["chk_ssid"] = session_id();
  /*$new_sessionid = session_id();
  echo "$new_sessionid";*/
}
?>

<?php
session_start();
$u_name=$_SESSION['u_name'];

//1.  DB接続
 require "function/functions.php";
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

    $view ='<img style=" overflow:hidden;" src="upload_top/'.$result["ad1"].'">';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ending_note_index</title>
	<link rel="stylesheet" href="css/index.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="js/modernizr.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Theme  -->
  <script src="js/wp-jquery/jquery.min.js"></script>
	<script src="js/wp-jquery/jquery.migrate.min.js"></script>
<link rel="stylesheet" href="css/uix-kit.min.css"/>

<!-- font awesome  -->
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<style>
.logo{width:80px;}
#routerlink {margin-right:100px;}

.fadeIn {
    -webkit-animation: fadeIn .10s cubic-bezier(.55,0,.1,1) both;
    animation: fadeIn .10s cubic-bezier(.55,0,.1,1) both;
}
@-webkit-keyframes fadeIn { from { opacity: 0; -webkit-transform: scale(.8); }}
@keyframes fadeIn { from { opacity: 0; -webkit-transform: scale(.8); transform: scale(.8); }}

</style>

</head>

<body>
	<header class="header">
    <ul class="navi">
		<li><img class="logo" src="img/logo.001.png" alt=""></li>
      <li><a href="about/about.php">About </a></li>
      <li><a href="profile/profile.php">Profile</a></li>
      <!-- <li><a href="asset/asset.php">Assets</a></li> -->
      <!-- <li><a href="address/address.php">Address</a></li> -->
      <li><a href="message/message.php">Message</a></li>
      <!-- <li><a href="setting.php">Setting</a></li> -->
      <li><a class="float:right;"href="logout.php">Logout</a>
</li>
    </ul>
  </header>
 
<section>
		   <!-- Content -->
      <div role="banner" class="uix-advanced-slider__wrapper">
			  <div class="uix-advanced-slider__outline uix-advanced-slider uix-advanced-slider--eff-none" 
				  data-draggable="false"
				  data-draggable-cursor="move"	   
				  data-auto="false"
				  data-loop="false"
				  data-timing="10000" 
				  data-count-total="false"
				  data-count-now="false"
				  data-controls-pagination=".my-a-slider-pagination-3" 
				  data-controls-arrows=".my-a-slider-arrows-3">
				   <div class="uix-advanced-slider__inner">



					   <div class="uix-advanced-slider__item">
               <!-- <span style="height:700px; overflow: hidden;"></span> -->
               <img src="img/top_02.jpg" alt="" />
							 <!-- <　?=$view?> -->
							<div class="uix-advanced-slider__txt">
								<div class="uix-core-grid__col-7 uix-typo--color-white">
									<!-- <h3>Beautiful Free &amp; Premium Responsive WordPress Themes</h3>
									<p>Uix Responsive Web UI Frameworks</p> -->
									<h3>自分史を記入しましょう。</h3>
									<p>Fill in your personal information.</p>
									<a href="profile/profile.php" class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--s uix-btn__bg--secondary is-pill is-fill-white">Link To</a>
								</div>

							</div>
					   </div>

					   <!-- <div class="uix-advanced-slider__item">
						   <img src="img/top_03.jpg" alt="" />
							<div class="uix-advanced-slider__txt">
								<div class="uix-core-grid__col-7 uix-typo--color-white">
									<h3>資産を記入しましょう。</h3>
									<p>Fill in about your asset information.</p>
									<a href="asset/asset.php" class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--s uix-btn__bg--secondary is-pill is-fill-white">Link To</a>
								</div>

							</div>   
					   </div> -->

					   <!-- <div class="uix-advanced-slider__item">
						   <img src="img/top_04.jpg" alt="" />
							<div class="uix-advanced-slider__txt">
								<div class="uix-core-grid__col-7 uix-typo--color-white">
									<h3>お友達の情報を記入しましょう。</h3>
									<p>Fill in about your contact information about friends and famiries.</p>
									<a href="address/address.php" class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--s uix-btn__bg--secondary is-pill is-fill-white">Link To</a>
								</div>

							</div>
					   </div>  -->

					   <div class="uix-advanced-slider__item">
						   <img src="img/top_05.jpg" alt="" />
							<div class="uix-advanced-slider__txt">
								<div class="uix-core-grid__col-7 uix-typo--color-white">
									<h3>大切な人へメッセージを残しましょう。</h3>
									<p>Fill in your message to one who you love.</p>
									<a href="message/message.php" class="uix-btn uix-btn__border--thin uix-btn__margin--b uix-btn__size--s uix-btn__bg--secondary is-pill is-fill-white">Link To</a>
								</div>

							</div>
					   </div> 

          </div>
				  <!-- /.uix-advanced-slider__inner -->

				</div>
			   <!-- /.uix-advanced-slider__outline -->

		  </div>
		  <!-- /.uix-advanced-slider__wrapper -->

</section>

<div class="uix-advanced-slider__pagination my-a-slider-pagination-3"></div>
		   <div class="uix-advanced-slider__arrows my-a-slider-arrows-3">
				<a href="#" class="uix-advanced-slider__arrows--prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
				<a href="#" class="uix-advanced-slider__arrows--next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		   </div>
			 
<!-- vue : single app -->
	<!-- <div id="app">
    <router-link to="/">Home</router-link>
		<router-link to="/users/map">Map</router-link>
	</div> -->
	<div id="app" >
    <router-link id="routerlink" to="/users/123/user">Home</router-link>
		<router-link id="routerlink" to="/users/123/profile">Profile</router-link>
    <router-link id="routerlink" to="/users/123/coopelation">Coopelation</router-link>
    <router-link id="routerlink" to="/users/123/posts">Posts</router-link>
    <router-view></router-view>
  </div>



<!-- Footer -->    
<footer class="uix-footer__container">
  <!-- <div class="uix-footer"> -->
	<div class="container">
					<hr>
					
					<div class="row">
						<div class="col-lg-12 col-md-6 uix-t-l uix-mobile-tc">

							Copyright &copy; 2020.  |  All rights reserved. Created by <a href="https://stokyo.sakura.ne.jp/profile/index.php">koichi hatakeyama</a>.
						</div>
						</div>
					</div>

        <!-- </div> -->
        <!-- .container  end -->	
			<!-- </div> -->
</footer>

<!-- Your Plugins & Theme Scripts  end -->
<script src="js/jquery.waitforimages.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/uix-kit.min.js"></script>
  <script src="js/video.min.js"></script>
  <script src="js/template7.min.js"></script>

<!-- paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('body');</script>
<script src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.</script>
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
<script src="js/paypal.js"></script>

<!-- vue router : ajax機能でページ遷移する（SPA）に有効 -->
<script src="https://unpkg.com/vue@2.6.10"></script>
<script src="https://unpkg.com/vue-router@3.0.6"></script>
<script src="js/vue.js"></script>


</body>
</html>