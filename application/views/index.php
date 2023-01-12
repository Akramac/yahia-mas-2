
<?php $this->view('partials/header')?>
    <style>
		nav .logo img {
			width: 140px !important;
			height: 70px !important;
		}
		/* style profile card */

		.card-profile .background {
			position: absolute;
			top: 0;
			left: 0;
			height: 100vh;
			width: 100vw;
			background: url("https://images.unsplash.com/photo-1447433589675-4aaa569f3e05?ixlib=rb-0.3.5&s=4222852e25e0f57d9485f7889957e99a&auto=format&fit=crop&w=2000&q=80");
			background-size: cover;
			background: #ccc;
			background-position: 0 50%;
			/* background: #deb493; */
		}
		.background:after {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background: rgba(0, 0, 0, 0);
		}
		.outer-div, .inner-div {
			height: 450px;
			max-width: 300px;
			margin: 0 auto;
			position: relative;
		}
		.outer-div {
			perspective: 900px;
			perspective-origin: 50% calc(50% - 18em);
		}
		.inner-div {
			margin: 0 auto;
			border-radius: 5px;
			font-weight: 400;
			color: #071011;
			font-size: 1rem;
			text-align: center;
			transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
			transform-style: preserve-3d;
			/*&:hover .front__face-photo, &:hover .front__footer {
				 opacity: 1;
			}
			*/
		}
		.inner-div:hover .social-icon {
			opacity: 1;
			top: 0;
		}
		.outer-div:hover .inner-div {
			transform: rotateY(180deg);
		}
		.front, .back {
			position: relative;
			top: 0;
			left: 0;
			backface-visibility: hidden;
		}
		.front {
			cursor: pointer;
			height: 100%;
			background: #fff;
			backface-visibility: hidden;
			border-radius: 5px;
			box-shadow: 0 15px 10px -10px rgba(0, 0, 0, 0.5), 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		}
		.front__bkg-photo {
			position: relative;
			height: 150px;
			/* width: 300px; */
			background: url("https://images.unsplash.com/photo-1511207538754-e8555f2bc187?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=88672068827eaeeab540f584b883cc66&auto=format&fit=crop&w=1164&q=80") no-repeat;
			background-size: cover;
			backface-visibility: hidden;
			overflow: hidden;
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		}
		.front__bkg-photo:after {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
		}
		.front__face-photo {
			position: relative;
			top: -60px;
			height: 120px;
			width: 120px;
			margin: 0 auto;
			border-radius: 50%;
			border: 5px solid #fff;
			background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/156905/profile/profile-512.jpg?1530296477") no-repeat;
			background-size: contain;
			overflow: hidden;
			/* backface-visibility: hidden;
			 transition: all 0.6s cubic-bezier(0.8, -0.4, 0.2, 1.7);
			 z-index: 3;
			*/
		}
		.front__text {
			position: relative;
			top: -55px;
			margin: 0 auto;
			font-family: "Montserrat";
			font-size: 18px;
			backface-visibility: hidden;
		}
		.front__text .front__text-header {
			font-weight: 700;
			font-family: "Oswald";
			text-transform: uppercase;
			font-size: 20px;
		}
		.front__text .front__text-para {
			position: relative;
			top: -5px;
			color: #000;
			font-size: 14px;
			letter-spacing: 0.4px;
			font-weight: 400;
			font-family: "Montserrat", sans-serif;
		}
		.front__text .front-icons {
			position: relative;
			top: 0;
			font-size: 14px;
			margin-right: 6px;
			color: gray;
		}
		.front__text .front__text-hover {
			position: relative;
			top: 10px;
			font-size: 10px;
			color: tomato;
			backface-visibility: hidden;
			font-weight: 700;
			text-transform: uppercase;
			letter-spacing: 0.4px;
			border: 2px solid tomato;
			padding: 8px 15px;
			border-radius: 30px;
			background: tomato;
			color: #fff;
		}
		.back {
			transform: rotateY(180deg);
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background-color: white;
			border-radius: 5px;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		.social-media-wrapper {
			font-size: 36px;
		}
		.social-media-wrapper .social-icon {
			position: relative;
			top: 20px;
			margin-left: 5px;
			margin-right: 5px;
			opacity: 0;
			color: #fff;
			transition: all 0.4s cubic-bezier(0.3, 0.7, 0.1, 1.9);
		}
		.social-media-wrapper .social-icon:nth-child(1) {
			transition-delay: 0.6s;
		}
		.social-media-wrapper .social-icon:nth-child(2) {
			transition-delay: 0.7s;
		}
		.social-media-wrapper .social-icon:nth-child(3) {
			transition-delay: 0.8s;
		}
		.social-media-wrapper .social-icon:nth-child(4) {
			transition-delay: 0.9s;
		}
		.fab {
			position: relative;
			top: 0;
			left: 0;
			transition: all 200ms ease-in-out;
		}
		.fab:hover {
			top: -5px;
		}

	</style>
<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->

	<nav>

		<div class="clearfix">

			<a href="index.html" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Yahia-mas" width="30"/></a>

			<!-- ==========  Pre navigation ========== -->

			<div class="navigation navigation-pre clearfix">
				<div class="row">
					<div class="col-md-3">
						<a href="#"><i class="icon icon-heart-pulse"></i> <?= lang('help_center') ?></a>
					</div>
					<div class="col-md-3">
						<a href="#"><i class="icon icon-phone"></i> Contact us</a>
					</div>
					<div class="col-md-3">
						<a href="#"></a>
					</div>
					<div class="col-md-3">
						<a href="#"></a>
					</div>
				</div>
			</div>

			<!-- ==========  Top navigation ========== -->

			<div class="navigation navigation-top clearfix">
				<ul>
					<!--add active class for current page-->
					<li class="left-side"><a href="index.html" class="logo-icon"><!--<img src="<?php /*echo base_url(); */?>assets/images/icon.png" alt="Alternate Text" /></a>--></li>
					<li class="left-side"><a href="<?php echo base_url(); ?>index.php/register?user=teacher"><img alt="teacher" src="<?php echo base_url(); ?>assets/images/teacher.png" width="30" /></a></li>
					<!--

						// Use active class for current state

						<li class="left-side active"><a href="#">Man</a></li>

					-->
					<li class="left-side"><a href="<?php echo base_url(); ?>index.php/register?user=student"><img alt="student" src="<?php echo base_url(); ?>assets/images/57_Student.jpg" width="30" /></a></li>
					<li class="left-side"><a href="<?php echo base_url(); ?>index.php/register?user=admin"><img alt="admin" src="<?php echo base_url(); ?>assets/images/58_Admin.jpg" width="30" /></a></li>
					<li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
					<li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a></li>
					<!--<li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a></li>-->
				</ul>
			</div>

			<!-- ==========  Main navigation ========== -->

			<div class="navigation navigation-main">
				<a href="#" class="open-login"><i class="icon icon-user"></i></a>
				<a href="#" class="open-search"><i class="icon icon-magnifier"></i></a>
				<a href="#" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a>
				<a href="#" class="open-menu"><i class="icon icon-menu"></i></a>
				<div class="floating-menu">
					<!--mobile toggle menu trigger-->
					<div class="close-menu-wrapper">
						<span class="close-menu"><i class="icon icon-cross"></i></span>
					</div>
					<ul>
						<li>
							<a href="#">Home <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul>
												<li class="label">Homepages</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#">Pages <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul>
												<li class="label">Single dropdown</li>
												<li><a href="about.html">About us</a></li>
												<li><a href="contact.html">Contact</a></li>
												<li><a href="login.html">Login & Register</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#">Questions <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul>
												<li class="label">Questions</li>
												<li><a href="#">Q1</a></li>
												<li><a href="#">Q2</a></li>
												<li><a href="#">Q3</a></li>
												<li><a href="#">Q4</a></li>
												<li><a href="#">Q5</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#">Reviews <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul>
												<li class="label">Blog pages</li>
												<li><a href="#">Blog grid</a></li>
												<li><a href="#">Blog list</a></li>
												<li><a href="#">Blog fullpage</a></li>
												<li><a href="#">Blog ideas</a></li>
												<li><a href="#">Article</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>

						<!--<li class="nav-settings">
							<a href="javascript:void(0);"><span class="nav-settings-value">USD</span> <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul class="nav-settings-list">
												<li><a href="javascript:void(0);">USD</a></li>
												<li><a href="javascript:void(0);">EUR</a></li>
												<li><a href="javascript:void(0);">GBP</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>-->
						<li class="nav-settings">
							<a href="javascript:void(0);"><span class="nav-settings-value">ENG</span> <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
							<div class="navbar-dropdown navbar-dropdown-single">
								<div class="navbar-box">
									<div class="box-full">
										<div class="box clearfix">
											<ul class="nav-settings-list">
												<li><a href="javascript:void(0);">ENG</a></li>
												<li><a href="javascript:void(0);">لعربية</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<!-- ==========  Search wrapper ========== -->

			<div class="search-wrapper">
				<input class="form-control" placeholder="Search..." />
				<button class="btn btn-main">Go!</button>
			</div>

			<!-- ==========  Login wrapper ========== -->
			<?php if(!$this->session->userdata('id')):?>
				<div class="login-wrapper">
					<div class="h4">Sign in</div>
					<form method="post" action="<?php echo base_url(); ?>index.php/login/validation">
						<div class="form-group">
							<input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" id="exampleInputEmail1" placeholder="Email">
							<span class="text-danger" style="color:red;"><?php echo form_error('user_email'); ?></span>
						</div>
						<div class="form-group">
							<input type="password" name="user_password"  class="form-control" id="exampleInputPassword1" value="<?php echo set_value('user_password'); ?>" placeholder="Password">
							<span class="text-danger" style="color:red;"><?php echo form_error('user_password'); ?></span>
						</div>
						<div class="form-group">
							<a href="#forgotpassword" class="open-popup">Forgot password?</a>
							<a href="#createaccount" class="open-popup">Don't have an account?</a>
						</div>
						<button type="submit" class="btn btn-block btn-main">Submit</button>
					</form>
				</div>
			<?php else:?>
				<div class="login-wrapper card-profile ">
					<div class="background"></div>

					<div class="outer-div">
						<div class="inner-div">
							<div class="front">
								<div class="front__bkg-photo"></div>
								<div class="front__face-photo"></div>
								<div class="front__text">
									<h3 class="front__text-header">Bobby Korec</h3>
									<p class="front__text-para"><i class="fas fa-map-marker-alt front-icons"></i>Seattle</p>

									<span class="front__text-hover">Hover to Find Me</span>
								</div>
							</div>
							<div class="back">
								<div class="social-media-wrapper">
									<a href="<?php echo base_url(); ?>index.php/change-password" class="social-icon" style="color:black;"><i class="fa fa-key" aria-hidden="true"></i>Change password</a>
									<a href="<?php echo base_url(); ?>index.php/logout" class="social-icon" style="color:black;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
								</div>
							</div>

						</div>
					</div>

				</div>
			<?php endif;?>


			<!-- ==========  Cart wrapper ========== -->

			<div class="cart-wrapper">
				<div class="checkout">
					<div class="clearfix">

						<!--cart item-->

						<div class="row">

							<div class="cart-block cart-block-item clearfix">
								<div class="image">
									<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-1.png" alt="" /></a>
								</div>
								<div class="title">
									<div><a href="product.html">Product item</a></div>
									<small>Product category</small>
								</div>
								<div class="quantity">
									<input type="number" value="2" class="form-control form-quantity" />
								</div>
								<div class="price">
									<span class="final">$ 1.998</span>
									<span class="discount">$ 2.666</span>
								</div>
								<!--delete-this-item-->
								<span class="icon icon-cross icon-delete"></span>
							</div>

							<!--cart item-->

							<div class="cart-block cart-block-item clearfix">
								<div class="image">
									<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-2.png" alt="" /></a>
								</div>
								<div class="title">
									<div><a href="product.html">Product item</a></div>
									<small>Product category</small>
								</div>
								<div class="quantity">
									<input type="number" value="2" class="form-control form-quantity" />
								</div>
								<div class="price">
									<span class="final">$ 1.998</span>
									<span class="discount">$ 2.666</span>
								</div>
								<!--delete-this-item-->
								<span class="icon icon-cross icon-delete"></span>
							</div>

							<!--cart item-->

							<div class="cart-block cart-block-item clearfix">
								<div class="image">
									<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-3.png" alt="" /></a>
								</div>
								<div class="title">
									<div><a href="product.html">Product item</a></div>
									<small>Product category</small>
								</div>
								<div class="quantity">
									<input type="number" value="2" class="form-control form-quantity" />
								</div>
								<div class="price">
									<span class="final">$ 1.998</span>
									<span class="discount">$ 2.666</span>
								</div>
								<!--delete-this-item-->
								<span class="icon icon-cross icon-delete"></span>
							</div>

							<!--cart item-->

							<div class="cart-block cart-block-item clearfix">
								<div class="image">
									<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-4.png" alt="" /></a>
								</div>
								<div class="title">
									<div><a href="product.html">Product item</a></div>
									<small>Product category</small>
								</div>
								<div class="quantity">
									<input type="number" value="2" class="form-control form-quantity" />
								</div>
								<div class="price">
									<span class="final">$ 1.998</span>
									<span class="discount">$ 2.666</span>
								</div>
								<!--delete-this-item-->
								<span class="icon icon-cross icon-delete"></span>
							</div>
						</div>

						<hr />

						<!--cart prices -->

						<div class="clearfix">
							<div class="cart-block cart-block-footer clearfix">
								<div>
									<strong>Discount 15%</strong>
								</div>
								<div>
									<span>$ 159,00</span>
								</div>
							</div>

							<div class="cart-block cart-block-footer clearfix">
								<div>
									<strong>Shipping</strong>
								</div>
								<div>
									<span>$ 30,00</span>
								</div>
							</div>

							<div class="cart-block cart-block-footer clearfix">
								<div>
									<strong>VAT</strong>
								</div>
								<div>
									<span>$ 59,00</span>
								</div>
							</div>
						</div>

						<hr />

						<!--cart final price -->

						<div class="clearfix">
							<div class="cart-block cart-block-footer clearfix">
								<div>
									<strong>Total</strong>
								</div>
								<div>
									<div class="h4 title">$ 1259,00</div>
								</div>
							</div>
						</div>


						<!--cart navigation -->

						<div class="cart-block-buttons clearfix">
							<div class="row">
								<div class="col-xs-6">
									<a href="products-grid.html" class="btn btn-clean-dark">Continue shopping</a>
								</div>
								<div class="col-xs-6 text-right">
									<a href="checkout-1.html" class="btn btn-main"><span class="icon icon-cart"></span> Checkout</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</nav>


	<!-- ========================  Tabsy wrapper ======================== -->

	<section class="tabsy-wrapper tabsy-wrapper-intro">

		<!-- === header title === -->

		<header class="hidden">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h2 class="title">Latest projects</h2>
				</div>
			</div>
		</header>

		<div class="tabsy" style="background-image:url(<?php echo base_url(); ?>assets/images/sliders/physics.jpg)">

			<!-- === tabsy images === -->

			<div class="tabsy-images">
				<div id="idImgPrim1">
					<div class="h1 title"><small>Category</small>Math</div>
					<img src="<?php echo base_url(); ?>assets/images/sliders/math.jpg" alt="Alternate Text" />
				</div>
				<div id="idImgPrim2">
					<div class="h1 title"><small>Category</small>Physics</div>
					<img src="<?php echo base_url(); ?>assets/images/sliders/physics.jpg" alt="Alternate Text" />
				</div>
				<div id="idImgPrim3">
					<div class="h1 title"><small>Category</small>English</div>
					<img src="<?php echo base_url(); ?>assets/images/sliders/math.jpg" alt="Alternate Text" />
				</div>
				<div id="idImgPrim4">
					<div class="h1 title"><small>Category</small> Arabic</div>
					<img src="<?php echo base_url(); ?>assets/images/sliders/physics.jpg" alt="Alternate Text" />
				</div>
			</div>

			<!-- === tabsy links === -->

			<div class="tabsy-links">

				<div class="row">

					<figure class="col-xs-6 col-sm-6 col-md-2 current" data-image="idImgPrim1">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">Maths</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>

					<figure class="col-xs-6 col-sm-6 col-md-2" data-image="idImgPrim2">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">Physics</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>

					<figure class="col-xs-6 col-sm-6 col-md-2" data-image="idImgPrim3">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">English</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>

					<figure class="col-xs-6 col-sm-6 col-md-2" data-image="idImgPrim4">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">Arabic</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>

					<figure class="col-xs-6 col-sm-6 col-md-2" data-image="idImgPrim3">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">Geography</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>

					<figure class="col-xs-6 col-sm-6 col-md-2" data-image="idImgPrim4">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title">History</span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>
				</div> <!--/row-->
			</div> <!--/tabsy-links-->
		</div> <!--/tabsy--> <!--/container-->

	</section>

	<!-- ========================  Icons slider ======================== -->

	<section class="owl-icons-wrapper">

		<!-- === header === -->

		<header class="hidden">
			<h2>Product categories</h2>
		</header>

		<div class="clearfix">

			<div class="owl-icons owl-icons-rounded">

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-1.png" alt="Alternate Text" />
						<figcaption>Teacher 1</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-2.png" alt="Alternate Text" />
						<figcaption>Teacher 2</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-3.png" alt="Alternate Text" />
						<figcaption>Teacher 3</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-4.png" alt="Alternate Text" />
						<figcaption>Teacher 4</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-5.png" alt="Alternate Text" />
						<figcaption>Teacher 5</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-6.png" alt="Alternate Text" />
						<figcaption>Teacher 6</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-7.png" alt="Alternate Text" />
						<figcaption>Teacher 7</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-8.png" alt="Alternate Text" />
						<figcaption>Teacher 8</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/product-9.png" alt="Alternate Text" />
						<figcaption>Teacher 9</figcaption>
					</figure>
				</a>




			</div> <!--/owl-icons-->
		</div> <!--/container-->
	</section>

	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="products">

		<!-- === header title === -->

		<header>
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h2 class="title">Questions</h2>
					<div class="text">
						<p>Most relevant</p>
					</div>
				</div>
			</div>
		</header>

		<div class="row row-clean">

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Question Polynomes</a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<span class="label label-danger">-</span>
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Questions WW2 </a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Questions Planets</a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<span class="label label-info">--</span>
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Questions Vocabulary</a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Question Religion</a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

			<!-- === product-item === -->

			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>
						<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>
					</div>
					<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>
					<div class="figure-grid">
						<div class="image">
							<a href="#productid1" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="width:240px !important;margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Question Odd numbers</a><br>
								<img src="<?php echo base_url(); ?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>

		</div> <!--/row-->
		<!-- === button more === -->

		<div class="wrapper-more">
			<a href="#" class="btn btn-lg">View all</a>
		</div>

		<!-- ========================  Product info popup - quick view ======================== -->

		<div class="popup-main mfp-hide" id="productid1">

			<!-- === product popup === -->

			<div class="product">

				<!-- === popup-title === -->

				<div class="popup-title">
					<div class="h1 title">
						Headphones Wireless
						<small>product category</small>
					</div>
				</div>

				<!-- === product gallery === -->

				<div class="owl-product-gallery">
					<img src="<?php echo base_url(); ?>assets/images/product-10.png" alt="" width="640" />
					<img src="<?php echo base_url(); ?>assets/images/product-10a.png" alt="" width="640" />
				</div>

				<!-- === product-popup-info === -->

				<div class="popup-content">
					<div class="product-info-wrapper">
						<div class="row">

							<!-- === left-column === -->

							<div class="col-sm-6">
								<div class="info-box">
									<strong>Maifacturer</strong>
									<span>Brand name</span>
								</div>
								<div class="info-box">
									<strong>Materials</strong>
									<span>Wood, Leather, Acrylic</span>
								</div>
								<div class="info-box">
									<strong>Availability</strong>
									<span><i class="fa fa-check-square-o"></i> in stock</span>
								</div>
							</div>

							<!-- === right-column === -->

							<div class="col-sm-6">
								<div class="info-box">
									<strong>Available Colors</strong>
									<div class="product-colors clearfix">
										<span class="color-btn color-btn-red"></span>
										<span class="color-btn color-btn-blue checked"></span>
										<span class="color-btn color-btn-green"></span>
										<span class="color-btn color-btn-gray"></span>
										<span class="color-btn color-btn-biege"></span>
									</div>
								</div>
								<div class="info-box">
									<strong>Choose size</strong>
									<div class="product-colors clearfix">
										<span class="color-btn color-btn-biege">S</span>
										<span class="color-btn color-btn-biege checked">M</span>
										<span class="color-btn color-btn-biege">XL</span>
										<span class="color-btn color-btn-biege">XXL</span>
									</div>
								</div>
							</div>

						</div> <!--/row-->
					</div> <!--/product-info-wrapper-->
				</div> <!--/popup-content-->
				<!-- === product-popup-footer === -->

				<div class="popup-table">
					<div class="popup-cell">
						<div class="price">
							<span class="h3">$ 1999,00 <small>$ 2999,00</small></span>
						</div>
					</div>
					<div class="popup-cell">
						<div class="popup-buttons">
							<a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View more</span></a>
							<a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Buy</span></a>
						</div>
					</div>
				</div>

			</div> <!--/product-->
		</div> <!--popup-main--> <!--/container-->

	</section>

	<!-- ========================  Stretcher widget ======================== -->

	<section class="stretcher-wrapper">

		<!-- === stretcher header === -->

		<header>
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h1 class="h2 title">List of Exams</h1>
					<div class="text">
						<p>Visit old exams or add a new one</p>
					</div>
				</div>
			</div>
		</header>

		<!-- === stretcher === -->

		<ul class="stretcher">

			<!-- === stretcher item === -->

			<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
				<!--logo-item-->
				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 12-2022</span>
					</div>
				</div>
				<!--main text-->
				<figure>
					<h4>Exam 1</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>
				<!--anchor-->
				<a href="#">Anchor link</a>
			</li>

			<!-- === stretcher item === -->

			<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
				<!--logo-item-->
				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 03-2022</span>
					</div>
				</div>
				<!--main text-->
				<figure>
					<h4>Exam 2</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>
				<!--anchor-->
				<a href="#">Anchor link</a>
			</li>

			<!-- === stretcher item === -->

			<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
				<!--logo-item-->
				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 05-2022</span>
					</div>
				</div>
				<!--main text-->
				<figure>
					<h4>Exam 3</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>
				<!--anchor-->
				<a href="#">Anchor link</a>
			</li>

			<!-- === stretcher item === -->

			<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
				<!--logo-item-->
				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 11-2022</span>
					</div>
				</div>
				<!--main text-->
				<figure>
					<h4>Exam 4</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>
				<!--anchor-->
				<a href="#">Anchor link</a>
			</li>

			<!-- === stretcher item more=== -->

			<li class="stretcher-item more">
				<div class="more-icon">
					<span data-title-show="Show more" data-title-hide="+"></span>
				</div>
				<a href="#"></a>
			</li>

		</ul>
	</section>

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->

	<section class="banner" style="background-image:url(<?php echo base_url(); ?>assets/images/banner-1.jpg)">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 text-center">
				<h2 class="title">Our story</h2>
				<p>
					We believe in creativity as one of the major forces of progress. With this idea.
				</p>
				<p>
					<a href="about.html" class="btn btn-clean">Read more</a>
				</p>
			</div>
		</div>
	</section>

	<!-- ========================  Blog Block ======================== -->

	<section class="blog blog-block blog-intro">

		<div class="container">

			<!-- === blog header === -->

			<header class="hidden">
				<div class="row">
					<div class="col-md-offset-2 col-md-8 text-center">
						<h2 class="title">Check out our featured news</h2>
						<div class="text">
							<p>Keeping things minimal</p>
						</div>
					</div>
				</div>
			</header>

			<div class="row">

				<!-- === blog item === -->

				<div class="col-sm-3">
					<article>
						<a href="products-grid.html">
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/images/project-1.jpg" alt="" />
							</div>
							<div class="entry entry-block">
								<div class="date">2018 Exams</div>
								<!--<div class="title">
									<h2 class="h3">Fashion</h2>
								</div>-->
								<div class="description">
									<p>
										Top picks four your desire
									</p>
								</div>
							</div>
							<div class="show-more">
								<span class="btn btn-clean">Shop now</span>
							</div>
						</a>
					</article>
				</div>

				<!-- === blog item === -->

				<div class="col-sm-3">
					<article>
						<a href="products-grid.html">
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/images/project-2.jpg" alt="" />
							</div>
							<div class="entry entry-block">
								<div class="date">2019 Exams</div>
								<!--<div class="title">
									<h2 class="h3">Electronics</h2>
								</div>-->
								<div class="description">
									<p>
										Explore popular devices
									</p>
								</div>
							</div>
							<div class="show-more">
								<span class="btn btn-clean">Shop now</span>
							</div>
						</a>
					</article>
				</div>

				<!-- === blog item === -->

				<div class="col-sm-3">
					<article>
						<a href="products-grid.html">
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/images/project-3.jpg" alt="" />
							</div>
							<div class="entry entry-block">
								<div class="date">2020 Exams</div>
								<!--<div class="title">
									<h2 class="h3">Sporting goods</h2>
								</div>-->
								<div class="description">
									<p>
										Available for quick shipping
									</p>
								</div>
							</div>
							<div class="show-more">
								<span class="btn btn-clean">Shop now</span>
							</div>
						</a>
					</article>
				</div>

				<!-- === blog item === -->

				<div class="col-sm-3">
					<article>
						<a href="products-grid.html">
							<div class="image">
								<img src="<?php echo base_url(); ?>assets/images/project-4.jpg" alt="" />
							</div>
							<div class="entry entry-block">
								<div class="date">2021 Exams</div>
								<!--<div class="title">
									<h2 class="h3">Home & garden</h2>
								</div>-->
								<div class="description">
									<p>
										Fun to explore
									</p>
								</div>
							</div>
							<div class="show-more">
								<span class="btn btn-clean">Shop now</span>
							</div>
						</a>
					</article>
				</div>

			</div> <!--/row-->

			<!-- === button more === -->

			<div class="wrapper-more">
				<a href="ideas.html" class="btn btn-lg">View all exams</a>
			</div>

		</div> <!--/container-->
	</section>

	<!-- ========================  Instagram ======================== -->

	<section class="instagram">

		<!-- === instagram header === -->

		<header>
			<h2 class="h3 title">
				Follow us<br />
				<i class="fa fa-instagram fa-3x"></i> <br />
				Instagram
			</h2>
			<div class="text">
				<p>@YahiaMas</p>
			</div>
		</header>

		<!-- === instagram gallery === -->

		<div class="gallery clearfix">
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-1.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-2.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-3.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-4.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-5.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-6.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-7.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-8.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-9.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-10.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-11.jpg" alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img src="<?php echo base_url(); ?>assets/images/square-12.jpg" alt="Alternate Text" />
			</a>
		</div> <!--/gallery-->

	</section>





<?php $this->view('partials/footer'); ?>
	<div>
		<?php
		$this->load->view('alert');
		?>
	</div>
</div> <!--/wrapper-->
<script>
	$(document).ready(function(){

	})
</script>

</html>
