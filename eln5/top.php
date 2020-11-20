<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ending_life_note</title>

   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
 <!-- <link rel="stylesheet" href="css/top.css"> -->

  <!-- Theme  -->
  <script src="js/wp-jquery/jquery.min.js"></script>
	<script src="js/wp-jquery/jquery.migrate.min.js"></script>
  <link rel="stylesheet" href="css/uix-kit.min.css"/>

  <!-- font awesome  -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <style>
body{
  background-image: url("img/top.jpg");
  background-size: cover;
  background-position: top;
  background-repeat: no-repeat;
  background-color:black;
}
.wrapper{
  position:relative;
  top:50%;
}
/* Animation-1 */
html{
  min-height: 100%;
  overflow: hidden;
}
body{
  height: calc(100vh - 8em);
  padding: 4em;
  color: rgba(255,255,255,.75); 
  background-color: rgb(25,25,25);  
}
.line-1{
    position: relative;
    top: 50%;  
    width: 18em;
    margin: 0 auto;
    border-right: 2px solid rgba(255,255,255,.75);
    font-size: 180%;
    color:white;
    font-family:'serif';
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    transform: translateY(-50%);    
}

/* Animation-2 */
.anim-typewriter{
  animation: typewriter 4s steps(44) 1s 1 normal both,
 blinkTextCursor 500ms steps(44) infinite normal;
}
@keyframes typewriter{
  from{width: 0;}
  to{width: 18em;}
}
@keyframes blinkTextCursor{
  from{border-right-color: rgba(255,255,255,.75);}
  to{border-right-color: transparent;}
}

/*Animation _ fadeIn*/
.fade{
animation: fadeIn 10s ;
animation-delay: 3s ;
animation-fill-mode:forwards;
color:white;
font-family:'serif';
display:block;
}

.fade{
  padding:0 45%;
  display:block;
}
.fade a{
  display:block;
  width:100px;
  height:30px;
  background-color:white;
  text-align:center;
}
@keyframes fadeIn { /*animetion-nameで設定した値を書く*/
0% {opacity: 0} /*アニメーション開始時は不透明度0%*/
100% {opacity: 1} /*アニメーション終了時は不透明度100%*/
}
  </style>
</head>

<body>
<div class="wrapper" >
    <p class="line-1 anim-typewriter">Ending_life_Note</p>
    <div class="fade">
    <a class="" href="javascript:void(0)" data-modal-id="modal-open-2" data-modal-close-onlybtn="false" >Login</a>
</div>

<div id="modal-open-2" class="uix-modal-box" role="dialog" tabindex="-1" aria-hidden="true">
			<button type="button" class="uix-modal-box__close" data-modal-close-trigger="true"></button>
				<div class="uix-modal-box__content" role="document">
					<div class="uix-modal-box__body">
						<div role="note">

<!--Login Panel Demo-->
				<div class="uix-special-login__container">
					<!-- <p class="uix-striking-msg uix-striking-msg--default is-rounded uix-striking-msg--hasarrow uix-striking-msg--hasarrow--reversed uix-striking-msg--inline" >
						switch to register
					</p>  -->
					<div class="uix-special-login__toggle">
						<span>
							<i class="fas fa-qrcode"></i>
							<i class="fas fa-laptop"></i>
						</span> 
          </div>
          

<!--sending form : login-->
					<div class="uix-special-login__form">
            <div>
              <h4>Login to your account</h4>
							<form name="form1" action="login/login_act.php" method="post">

									<div class="uix-controls uix-controls--line is-fullwidth is-iconic">
									  <i class="fa fa-user-o" aria-hidden="true"></i>
									  <input type="text" class="js-uix-float-label" name="lid" id="lid" autocomplete="off">
									  <label>Username</label>
									</div>

									<div class="uix-controls uix-controls--line is-fullwidth is-iconic">
									  <i class="fa fa-lock" aria-hidden="true"></i>
									  <input type="password" class="js-uix-float-label" name="lpw" id="lpw" autocomplete="off">
									  <label>Password</label>
									</div>

									<button type="submit" id="login" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary is-rounded">Login</button>
							</form>
            </div>
          </div>
            

<!-- sending form : create account  -->
					<div class="uix-special-login__form">
            <div>
              <h4>Create an account</h4>
              
                <form method="post" action="login/member_insert.php">
            
									<div class="uix-controls uix-controls--line is-fullwidth is-iconic">
									  <i class="fa fa-user-o" aria-hidden="true"></i>
									  <input type="text" class="js-uix-float-label" name="u_name" id="u_name" autocomplete="off">
									  <label>Username</label>
									</div>

									<div class="uix-controls uix-controls--line is-fullwidth is-iconic">
									  <i class="fa fa-envelope" aria-hidden="true"></i>
									  <input type="email" class="js-uix-float-label" name="u_mail" id="u_mail" autocomplete="off">
									  <label>Email Address</label>
                  </div>			

									<div class="uix-controls uix-controls--line is-fullwidth is-iconic">
									  <i class="fa fa-lock" aria-hidden="true"></i>
									  <input type="text" class="js-uix-float-label" name="u_pw" id="u_pw" autocomplete="off" id="password" onkeyup="setPasswordLevel(this.value);">
                    <label>Password</label>
                  </div>

                      <div class="uix-header__placeholder js-uix-header__placeholder-autoheight"></div>
                      <div class="uix-tooltip">
                        <span data-microtip-position="top" data-microtip-size="auto" role="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>

                  <!-- hidden_button -->
                  <input type="hidden" name="life_flg" id="life_flg" value="0">
                  <button type="submit" id="register" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary is-rounded">Register</button>

                        </span><div class="uix-t-l"id="level">pass is null</div></div>	

							</form>

						</div>
					</div>

          
        <!--="uix-special-login__container"-->
          
<!-- /.uix-special-login__form -->
					<div class="uix-special-login__bottom">
            <a href="#">Forgot your password?</a>
          </div>
  

           <!-- ////////  content  end //////// -->
            </div><!--"uix-modal-box"-->  
        </div><!--"uix-modal-box__content"-->  

      </div><!--"uix-modal-box__body"-->  
</div><!--role="note"-->  


	<!-- Your Plugins & Theme Scripts  end -->
<script src="js/jquery.waitforimages.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/uix-kit.min.js"></script>

<script type="text/javascript" src="login/passwordchecker.js"></script>
<script type="text/javascript">
  function setPasswordLevel(password) {
    var level = getPasswordLevel(password);
    var text = "";
  
    if (level == 1) { text = "weak";
      document.getElementById("level").innerText = text;
    }
    if (level == 2) { text = "little weak";
      document.getElementById("level").innerText = text;
    }
    if (level == 3) { text = "normal";
      document.getElementById("level").innerText = text;
    }
    if (level == 4) { text = "little strong";
      document.getElementById("level").innerText = text;
    }
    if (level == 5) { text = "strong";
      document.getElementById("level").innerText = text;
    }
  }
  </script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->

	<!-- <script>
	        $("#login").on("click",function() {
            $.ajax({
                type: "post",
                url: "login/login_act.php",
                data: {
                    lid:$("#lid").val() ,
                    lpw:$("#lpw").val() ,
                },
                dataType: "html",
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    $("#lid").val("");
                    $("#lpw").val("");
                  }
                }
            });
        });
	</script> -->
<!-- 
<script>
	        $("#register").on("click",function() {
            //Ajax送信開始
            $.ajax({
                type: "post",
                url: "login/member_insert.php",
                data: {
                    u_name:$("#u_name").val() ,
                    u_mail:$("#u_mail").val() ,
                    u_pw:$("#u_pw").val() ,
                    life_flg:$("#life_flg").val() ,
                },
                dataType: "html",
                //通信成功時にsuccess内が実行される！
                success: function(data) {
                  if(data=="false"){
                    alert("エラー");
                  }else{
                    alert("成功！");
                    // $("free").html("登録成功しました！");
                    // $("#lid").val("");
                    // $("#lpw").val("");
                    // $("#naiyou").val("");
                    header('login/member_insert.php');
                  }
                }
            });
        });
	</script> -->

</body>
</html>