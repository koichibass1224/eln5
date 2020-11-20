<?php

//session idのチェック
session_start();
$u_name = $_SESSION["u_name"];
$u_mail = $_SESSION["u_mail"];
$_SESSION["chk_ssid"] = session_id();

include("../function/functions.php");
$pdo = connectDB();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM user_table");
$status = $stmt->execute();
$count = $stmt->fetchColumn(); 

    $view .='<h1>あなたは<h3  data-counter-number="';
    $view .=$count;
    $view .='" data-counter-double-digits="true" data-counter-dilimiter="true" data-counter-duration="100">';
    $view .='00</h3>人目の参加者です。</h1>';

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

  <!-- Theme  -->
    <!-- <script src="../js/wp-jquery/jquery.min.js"></script>
	<script src="../js/wp-jquery/jquery.migrate.min.js"></script> -->
    <link rel="stylesheet" href="../css/uix-kit.min.css"/>

  <!-- font awesome  -->
  <!-- <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> -->
<style>
.center{
  width:30%;
  margin:0 auto;
  padding-top:30px;
  text-align:center;
}
.enter{
  margin:0 48%;
}
.logo{width:300px;}</style>
</head>

<section class="box section0" id="section0">
    <div class="center">
            <legend>Welcome : <?=$u_name?>,</br>Your ID = <?=$u_mail?></legend>
            <img class="logo"src="../img/logo.000.png" alt="">
                    <!-- <h1>あなたは
                        <h3  data-counter-number="2000" data-counter-double-digits="true" data-counter-dilimiter="true" data-counter-duration="1000">00</h3>人目の参加者です。</h1> -->
                        <?=$view?>
    </div>
</section>

<section class="box section1" id="section1">
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

<section class="box section2" id="section2">
  <div class="jumbo">
   <fieldset>
    <legend></legend>
      <h1>Profie</h1>
        <h2>自分史を振り返ってみましょう。</h2>
          <p>Let's look back at your personal history.</p>
        <!--画面遷移のinput-->
        <!-- <input class="btn btn-primary" type="button" onclick="location.href='profile/select_profile.php'" value="input"> -->
    </fieldset>
    <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
  </div>
</section>

<section class="box section3" id="section3">
<form method="post" action="select_name.php">
  <div class="jumbo">
   <fieldset>
      <legend></legend>
        <h1>Assets</h1>
          <h2>資産について振り返ってみましょう。</h2>
            <p>Let's look back at your personal assets.</p>
          <!--画面遷移のinput-->
          <!-- <input class="btn btn-primary" type="button" onclick="location.href='asset/select_asset.php'" value="input"> -->
    </fieldset>
    </fieldset>
    <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
  </div>
</form>
</section>

<section class="box section4" id="section4">
<form method="post" action="select_contact.php">
  <div class="jumbo">
   <fieldset>
      <h1>Address_to_contact</h1>
        <h2>友人関係を記録しておきましょう。</h2>
            <p>Make a note of who you want to contact at the end.</p>
          <!--画面遷移のinput-->
          <!-- <input class="btn btn-primary" type="button" onclick="location.href='address/select_address.php'" value="input"> -->
    </fieldset>
    <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
  </div>
</form>
</section>

<section class="box section5" id="section5">
<form method="post" action="select_message.php">
<div class="jumbo">
   <fieldset>
      <h1>Message</h1>
        <h2>あなたの伝えたいメッセージを記入しましょう。</h2>
          <p>Fill in the message to who you love.</p>
        <!--画面遷移のinput-->
        <!-- <input class="btn btn-primary" type="button" onclick="location.href='message/select_message.php'" value="input"> -->
    </fieldset>
    <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
  </div>
</form>
</section>

<section class="box section6" id="section6">
  <div class="jumbo">
  <fieldset>
    <legend></legend>
      <h1>エンディングノートは書き始めるのに遅いも早いもありません。</h1>
        <h2>There is no rule about your age to start writing Ending_note.</h2>
          <p>人はいつか必ず死にます。ただし、いつ死ぬか誰にもわかりません。
          まだあと何十年も生きるかもしれないですし、明日交通事故で亡くなるかもしれません。</br>
          近年の高齢化社会では、生死と向き合うことも必然と増えてきています。</br>
          エンディングノートを作ることで、生死について改めて理解を深めるきっかけにもなるのではないかと私たちは考えます。</br>
          愛するひとのために。いまこの場所からあなたの言葉を　その思いを　残していきましょう。</p>
          <p>Someday load call us to heaven , however we are not able to see when it is . 
          It seems to remain few years or it has possibility to come tomorrow for accident of traffic or something.</br>
          We have to face life and death for these aging society. We think that creating an ending note will give us an opportunity to gain a deeper understanding of life and death.</br>
          For loved ones. Now let's leave your words and thoughts from this place.</p>
    </fieldset>
    <div style="position: relative;" class="uix-mouse-icon uix-mouse-icon--arrow"></div>
  </div>
</section>

<section class="box section7" id="section7">
    <div class="center">
            <legend> <h3><?=$u_name?>さん,ここからがスタートです！</h3></legend></br>
                     <h><?=$u_name?> , Lets start today!</h></br>
                     <img class="logo"src="../img/logo.000.png" alt="">
                 <!--画面遷移のinput-->
                </div>
                 <a class="enter" href='../index.php' >enter</a>
</section>

<div class="pagetop">
    <a href="#section0">▲ page to TOP </a>
</div>


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
</body>
</html>
