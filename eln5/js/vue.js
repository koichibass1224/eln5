const Link ={
	template: 
	` 
	<div>
	<p>ダウンロードリンクはこちら：</p>
	<p>Download main containts from here：</p>
	<a href=https://drive.google.com/drive/folders/1i0L7tqfdb-LfEVatBjEW2OvqB62gE7vg?usp=sharing>click here</a>
	</div>
`
  //``は、改行をそのまま入力できる。
}

const Profile = {
  template:
  `<section>
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
							<img style="width:20%;"src="img/logo.000.png" alt=""><h4>私たちについて</h4>
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
									 <form method="post" action="about/contact_insert.php">

										<div class="uix-controls is-fullwidth">
										  <input type="text" class="js-uix-float-label" name="author">
										  <label>Author</label>
										</div>

										<div class="uix-controls is-fullwidth">
										  <input type="email" class="js-uix-float-label" name="email">
										  <label>Email</label>
										</div>

										<div class="uix-controls uix-controls__textarea is-fullwidth">
										  <textarea name="comments" rows="2" class="js-uix-float-label"></textarea>
										  <label>Comments</label>
										</div>

										<div class="uix-controls">
										  <button type="submit" class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">Submit</button>
										</div>  
									</form>
							</div>
							<!-- .col-lg-6.col-md-6 end -->             
						</div>
						<!-- .row end -->
				</div>
        <!-- .container end -->
</section>
`
}

const Posts = {
	template:
	'<div><p>サービスに共感してくださった方は、ぜひDonationをお願いいたします。</p></div><div id="paypal-button-container">aa</div>'
}

const router = new VueRouter({
routes:[
  {
    path:'/users/:userId',
    component: User,
    children:[
    {
        path:'user',
        component: Link
      },
      {
        path:'profile',
        component: Profile
      },
      {
        path:'posts',
        component: Posts
      }
    ]
    //children内の配列。
  }

]
})

const app = new Vue({
  router: router
}).$mount('#app')
