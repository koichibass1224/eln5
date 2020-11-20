<?php

//session idのチェック
session_start();
$u_name = $_SESSION["u_name"];
$u_mail = $_SESSION["u_mail"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ending_note_index</title>
  <link rel="stylesheet" href="../css/index.css">
   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/uix-kit.min.css"/>

<style>
.logo{width:300px;}

</style>
</head>

<section class="box section6" id="section6">
<div class="jumbo">
        <fieldset>
            <h1>守りたい人。守りたい物の為に。今日からエンディングノート。</h1>
                <h2>Those who you love. For what you want to protect. The ending note will be start from today.</h2>
                <p>あなたの守りたい人は誰でしょうか。あなたの守りたいものは？   
                人はいつか必ず死にます。しかし、いつ死ぬか誰にもわかりません。</br>
                あなたの身体はこの世に残し続けられません。でも、ことばはずっと残り続けます。あなたのことばで、手の届かなくなる前に、大切な言葉を書き残しておきましょう。</br>
                死は誰にでも怖いもの。
                でも恐れず向き合えば、愛する人を、大切なものを守る準備ができれば、きっと少しでも勇気づけられるはずです。</br>
                わたしたちはそう信じています。</p>
                <p>Who is your lover ? And what you want to protect?
                One day someone will definitely die. But no one knows when to die.</br>
                Your body cannot be left in this world. But the words will remain.
                Write down your words before they become out of reach . In your words.
                </br>Death is scary for anyone not only without you.
                However if you never be afraid to face , you'll surely be able to encourage  if you are ready to protect what you love , and who you loved.</br>
                We believe so .</p>

            </fieldset>
            <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
        </div>
</section>

<section class="box section7" id="section7">
	<!-- <section class="uix-spacing--s uix-spacing--no-top"> -->
					<style>
					#map {
						width: 100%;
						height: 250px;
					}
					.container{margin-top:20px;}
					</style>
					<div id="map"></div>
	<!-- </section> -->
				<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6">
              <!-- <img class="logo"src="../img/logo.000.png" alt=""> -->
                <h4>私たちについて</h4>
                <p>about us</p>
								<!-- <hr> -->
								<p> 〒107-0061 東京都港区北青山3-5-6 青朋ビル2F
								<!-- <br />  -->
								<br /> 〒107-0061 seiho building 2F, minato kita-aoyama 3-5-6 , tokyo </p>
								<!-- <hr> -->
								<p> <strong>E:</strong> koichibass1224@gmail.com
								<!-- <br /> <strong>P:</strong> +614 3948 2726 -->
								<br /> </p>
							</div>
							<!-- .col-lg-6.col-md-6 end -->
							<div class="col-lg-6 col-md-6 uix-trans">
							<h4>お問い合わせ</h4>
									 <!-- <form method="post" action="contact_insert.php"> -->

										<div class="uix-controls is-fullwidth">
										  <input type="text" class="js-uix-float-label" name="author" id="author">
										  <label>Author</label>
										</div>

										<div class="uix-controls is-fullwidth">
										  <input type="email" class="js-uix-float-label" name="email" id="email">
										  <label>Email</label>
										</div>

										<div class="uix-controls uix-controls__textarea is-fullwidth">
										  <textarea name="comments" id="comments" rows="2" class="js-uix-float-label"></textarea>
										  <label>Comments</label>
										</div>

										<div class="uix-controls">
										  <button type="submit" id="submit" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">Submit</button>
										</div>  
									<!-- </form> -->
							</div>
							<!-- .col-lg-6.col-md-6 end -->             
						</div>
						<!-- .row end -->
				</div>
        <!-- .container end -->
        
<!-- Footer -->    
<!-- <footer class="uix-footer__container"> -->
  <!-- <div class="uix-footer"> -->
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-6 uix-t-l uix-mobile-tc">
						Copyright &copy; 2020.  |  All rights reserved. Created by <a href="https://stokyo.sakura.ne.jp/profile/index.php">koichi hatakeyama</a>.
						<!-- </div>
						<div class="col-lg-6 col-md-6 uix-t-r uix-mobile-tc">
							<div class="uix-footer__menu">
								<ul>
									<li>
											About　　
									</li>
									<li>
											Licenses　　
									</li>
									<li>
											Download　　
									</li>

									<li>
											Documentation　　
									</li>
								</ul>
							</div>-->

						</div>
					</div> 
</section>

<div class="pagetop">
    <a href="../index.php">▲ page to TOP </a>
</div>

		
	<!-- Google Map API
	============================================= -->
	<script>
	  function initMap() {
		var mapDiv = document.getElementById('map');
		var map = new google.maps.Map(mapDiv, {
			// center: {lat: 44.540, lng: -78.546},
			center: {lat: 35.667492, lng: 139.714048},
      zoom: 18
		});
	  }
	</script>

	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA0kxSY0g5flUWptO4ggXpjhVB-ycdqsDk&ver=2.0&callback=initMap'></script>
  <!-- Google Map API  end -->
  
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- JQuery for scroll  -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-scrollify@1/jquery.scrollify.min.js"></script>

<script>$.scrollify({section:".box"});</script>
<script src="../js/scroll.js"></script>

<!-- Your Plugins & Theme Scripts  end -->
<script src="../js/jquery.waitforimages.min.js"></script>
<script src="../js/TweenMax.min.js"></script>
<script src="../js/uix-kit.min.js"></script>

<script src="js/axios.min.js?ver=0.19.2"></script>
<script src="js/video.min.js?ver=7.5.3"></script>
<script src="js/template7.min.js?ver=1.4.2"></script>
<script src="js/pixi.min.js?ver=5.2.0"></script>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 

<script>
	        $("#submit").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "contact_insert.php",
                data: {
									author:$("#author").val() ,
                  email:$("#email").val() ,
                  comments:$("#comments").val() ,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                      alert("Thank you for comment!");
                    // // $("#ad1").val("");
                    // // $("#ad2").val("");
                    // // $("#ad3").val("");
                  }
                }
            });
        });
	</script> 

</body>
</html>
