


<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" media="all" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css" />
<style>
	@import url("<?php echo base_url(); ?>assets/css/materialize.css");
	@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
	@import url('https://fonts.googleapis.com/css?family=Roboto');

	nav .logo img {
		width: 140px !important;
		height: 70px !important;
	}
</style>


<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->

	<nav>

		<div class="clearfix">

			<a href="index.html" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Yahia-mas" width="30"/></a>

			<!-- ==========  Pre navigation ========== -->

			<div class="navigation navigation-pre clearfix browser-default">
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
				<ul class="browser-default">
					<!--add active class for current page-->
					<li class="left-side"><a href="index.html" class="logo-icon"><!--<img src="<?php /*echo base_url(); */?>assets/images/icon.png" alt="Alternate Text" /></a>--></li>
					<li class="left-side"><a href="#"><img alt="student" src="<?php echo base_url(); ?>assets/images/58_Admin.jpg" width="30" /></a></li>
					<!--

						// Use active class for current state

						<li class="left-side active"><a href="#">Man</a></li>

					-->
					<li class="left-side"><a href="#"><img alt="student" src="<?php echo base_url(); ?>assets/images/57_Student.jpg" width="30" /></a></li>
					<li class="left-side"><a href="#"><img alt="student" src="<?php echo base_url(); ?>assets/images/58_Admin.jpg" width="30" /></a></li>
					<li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
					<li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a></li>
					<!--<li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a></li>-->
				</ul>
			</div>

			<!-- ==========  Main navigation ========== -->

			<div class="navigation navigation-main" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);">
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

			<div class="login-wrapper">
				<div class="h4">Sign in</div>
				<form>
					<div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group">
						<a href="#forgotpassword" class="open-popup">Forgot password?</a>
						<a href="#createaccount" class="open-popup">Don't have an account?</a>
					</div>
					<button type="submit" class="btn btn-block btn-main">Submit</button>
				</form>
			</div>

			<!-- ==========  Cart wrapper ========== -->
		</div>
	</nav>


	<!-- ========================  Tabsy wrapper ======================== -->

	<!-- ========================  Icons slider ======================== -->


	<!-- ========================  Block banner category ======================== -->
	<section class="contact section-register">
	<div class="container">
	<br />
	<h3 align="center">Complete User Registration and Login System in Codeigniter</h3>
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">Register</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>index.php/register/validation">
				<div class="form-group">
					<label>Enter Your Name</label>
					<input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
					<span class="text-danger"><?php echo form_error('user_name'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Your Valid Email Address</label>
					<input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
					<span class="text-danger"><?php echo form_error('user_email'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
					<span class="text-danger"><?php echo form_error('user_password'); ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="register" value="Register" class="btn btn-info" />
				</div>
			</form>
		</div>
	</div>
</div>

	</section>


	<?php $this->view('partials/footer'); ?>

</div> <!--/wrapper-->
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
	$(document).ready(function(){



	})
</script>

</html>
