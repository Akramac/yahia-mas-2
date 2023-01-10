
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
	/* style timer */
	.uploader {
		display: block;
		clear: both;
		margin: 0 auto;
		width: 100%;
		max-width: 600px;
	}
	.uploader label {
		float: left;
		clear: both;
		width: 100%;
		padding: 2rem 1.5rem;
		text-align: center;
		background: #fff;
		border-radius: 7px;
		border: 3px solid #eee;
		transition: all 0.2s ease;
		user-select: none;
	}
	.uploader label:hover {
		border-color: #454cad;
	}
	.uploader label.hover {
		border: 3px solid #454cad;
		box-shadow: inset 0 0 0 6px #eee;
	}
	.uploader label.hover #start i.fa {
		transform: scale(0.8);
		opacity: 0.3;
	}
	.uploader #start {
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #start.hidden {
		display: none;
	}
	.uploader #start i.fa {
		font-size: 50px;
		margin-bottom: 1rem;
		transition: all 0.2s ease-in-out;
	}
	.uploader #response {
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #response.hidden {
		display: none;
	}
	.uploader #response #messages {
		margin-bottom: 0.5rem;
	}
	.uploader #file-image {
		display: inline;
		margin: 0 auto 0.5rem auto;
		width: auto;
		height: auto;
		max-width: 180px;
	}
	.uploader #file-image.hidden {
		display: none;
	}
	.uploader #notimage {
		display: block;
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #notimage.hidden {
		display: none;
	}
	.uploader progress, .uploader .progress {
		display: inline;
		clear: both;
		margin: 0 auto;
		width: 100%;
		max-width: 180px;
		height: 8px;
		border: 0;
		border-radius: 4px;
		background-color: #eee;
		overflow: hidden;
	}
	.uploader .progress[value]::-webkit-progress-bar {
		border-radius: 4px;
		background-color: #eee;
	}
	.uploader .progress[value]::-webkit-progress-value {
		background: linear-gradient(to right, #393f90 0%, #454cad 50%);
		border-radius: 4px;
	}
	.uploader .progress[value]::-moz-progress-bar {
		background: linear-gradient(to right, #393f90 0%, #454cad 50%);
		border-radius: 4px;
	}
	.uploader input[type="file"] {
		display: none;
	}
	.uploader div {
		margin: 0 0 0.5rem 0;
		color: #5f6982;
	}
	.uploader .btn {
		display: inline-block;
		margin: 0.5rem 0.5rem 1rem 0.5rem;
		clear: both;
		font-family: inherit;
		font-weight: 700;
		font-size: 14px;
		text-decoration: none;
		text-transform: initial;
		border: none;
		border-radius: 0.2rem;
		outline: none;
		padding: 0 1rem;
		height: 36px;
		line-height: 36px;
		color: #fff;
		transition: all 0.2s ease-in-out;
		box-sizing: border-box;
		background: #454cad;
		border-color: #454cad;
		cursor: pointer;
	}


	/* style countdown */

	.countdown {
		display: grid;
		margin: 1em auto;
		width: 20em;
		height: 20em;
	}
	.countdown::after {
		grid-column: 1;
		grid-row: 1;
		place-self: center;
		font: 5em/ 2 ubuntu mono, consolas, monaco, monospace;
		animation: num 20s steps(1) infinite;
		content: '0:' counter(s,decimal-leading-zero);
	}
	@keyframes num {
		0% {
			counter-reset: s 20;
		}
		5% {
			counter-reset: s 19;
		}
		10% {
			counter-reset: s 18;
		}
		15% {
			counter-reset: s 17;
		}
		20% {
			counter-reset: s 16;
		}
		25% {
			counter-reset: s 15;
		}
		30% {
			counter-reset: s 14;
		}
		35% {
			counter-reset: s 13;
		}
		40% {
			counter-reset: s 12;
		}
		45% {
			counter-reset: s 11;
		}
		50% {
			counter-reset: s 10;
		}
		55% {
			counter-reset: s 9;
		}
		60% {
			counter-reset: s 8;
		}
		65% {
			counter-reset: s 7;
		}
		70% {
			counter-reset: s 6;
		}
		75% {
			counter-reset: s 5;
		}
		80% {
			counter-reset: s 4;
		}
		85% {
			counter-reset: s 3;
		}
		90% {
			counter-reset: s 2;
		}
		95% {
			counter-reset: s 1;
		}
		100% {
			counter-reset: s 0;
		}
	}
	svg {
		grid-column: 1;
		grid-row: 1;
	}
	[r] {
		fill: none;
		stroke: silver;
	}
	[r] + [r] {
		transform: rotate(-90deg);
		stroke-linecap: round;
		stroke: #8a9b0f;
		animation: arc 20s linear infinite;
		animation-name: arc, col;
	}
	@keyframes arc {
		0% {
			stroke-dashoffset: 0px;
		}
	}
	@keyframes col {
		0% {
			stroke: #8a9b0f;
		}
		25% {
			stroke: #f8ca00;
		}
		50% {
			stroke: #e97f02;
		}
		75% {
			stroke: #bd1550;
		}
		100% {
			stroke: #490a3d;
		}
	}
	/*  style multi step form */

	/*
Common
*/

	.wizard,
	.tabcontrol
	{
		display: block;
		width: 100%;
		overflow: hidden;
	}

	.wizard a,
	.tabcontrol a
	{
		outline: 0;
	}

	.wizard ul,
	.tabcontrol ul
	{
		list-style: none !important;
		padding: 0;
		margin: 0;
	}

	.wizard ul > li,
	.tabcontrol ul > li
	{
		display: block;
		padding: 0;
	}

	/* Accessibility */
	.wizard > .steps .current-info,
	.tabcontrol > .steps .current-info
	{
		position: absolute;
		left: -999em;
	}

	.wizard > .content > .title,
	.tabcontrol > .content > .title
	{
		position: absolute;
		left: -999em;
	}

	/*
		Wizard
	*/

	.wizard > .steps
	{
		position: relative;
		display: block;
		width: 100%;
	}

	.wizard.vertical > .steps
	{
		display: inline;
		float: left;
		width: 30%;
	}

	.wizard > .steps .number
	{
		font-size: 1.429em;
	}

	.wizard > .steps > ul > li
	{
		width: 25%;
	}

	.wizard > .steps > ul > li,
	.wizard > .actions > ul > li
	{
		float: left;
	}

	.wizard.vertical > .steps > ul > li
	{
		float: none;
		width: 100%;
	}

	.wizard > .steps a,
	.wizard > .steps a:hover,
	.wizard > .steps a:active
	{
		display: block;
		width: auto;
		margin: 0 0.5em 0.5em;
		padding: 1em 1em;
		text-decoration: none;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}

	.wizard > .steps .disabled a,
	.wizard > .steps .disabled a:hover,
	.wizard > .steps .disabled a:active
	{
		background: #eee;
		color: #aaa;
		cursor: default;
	}

	.wizard > .steps .current a,
	.wizard > .steps .current a:hover,
	.wizard > .steps .current a:active
	{
		background: #2184be;
		color: #fff;
		cursor: default;
	}

	.wizard > .steps .done a,
	.wizard > .steps .done a:hover,
	.wizard > .steps .done a:active
	{
		background: #9dc8e2;
		color: #fff;
	}

	.wizard > .steps .error a,
	.wizard > .steps .error a:hover,
	.wizard > .steps .error a:active
	{
		background: #ff3111;
		color: #fff;
	}

	.wizard > .actions
	{
		position: relative;
		display: block;
		text-align: right;
		width: 100%;
	}

	.wizard.vertical > .actions
	{
		display: inline;
		float: right;
		margin: 0 2.5%;
		width: 95%;
	}

	.wizard > .actions > ul
	{
		display: inline-block;
		text-align: right;
	}

	.wizard > .actions > ul > li
	{
		margin: 0 0.5em;
	}

	.wizard.vertical > .actions > ul > li
	{
		margin: 0 0 0 1em;
	}

	.wizard > .actions a,
	.wizard > .actions a:hover,
	.wizard > .actions a:active
	{
		background: #2184be;
		color: #fff;
		display: block;
		padding: 0.5em 1em;
		text-decoration: none;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}

	.wizard > .actions .disabled a,
	.wizard > .actions .disabled a:hover,
	.wizard > .actions .disabled a:active
	{
		background: #eee;
		color: #aaa;
	}


	/*  style colors form step */

	ul.stepper .step.active::before, ul.stepper .step.done::before
	{
		background-color: #ec5252 !important;
	}
	.blue {
		background-color: #ec5252 !important;
	}

	@media only screen and (min-width: 993px){
		ul.stepper.horizontal .step.active .step-title::before, ul.stepper.horizontal .step.done .step-title::before
		{
			background-color: #ec5252;
		}
	}
	.owl-carousel .owl-item img {
		width: 90% !important;
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

	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="contact section-questions">

		<!-- === Goolge map === -->

		<div id="map" style="background-image:url(<?php echo base_url(); ?>assets/images/backgrounds/wall.jpg)"></div>

		<div class="container">
			<h2 class="title">Exam</h2>
			<p>
				Make your questions by adding part by part and adding the time and also pictures
			</p>
			<form id="msform-teacher">
			<div class="input-1">
			<div data-step-label="" class="step-title waves-effect waves-dark">Question 1</div>
			<div class="step-content">
				<div class="countdown" style="zoom:0.2;">
					<svg viewBox="-50 -50 100 100" stroke-width="10">
						<circle r="45"></circle>
						<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
					</svg>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Question about polynomes :what are 1</label>
								<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Duration of the question</label>
								<input type="time" class="time-pick"  name="usr_time">
							</div>
						</div>
					</div>
				</div>


			</div>

			</div>
				<div class="row" style="justify-content: space-between;">
					<button class=" btn blue" style="float: left;">Finish</button>

					<!-- Modal Trigger -->
					<a class="btn blue  next-inputs text-right waves-effect waves-light  modal-trigger" href="#modal-choice-inputs" style="float: right;" >Modal</a>
					<!--					<button class=" btn blue  next-inputs text-right" >CONTINUE</button>-->
				</div>

					<!--<li class="step">
						<div class="step-title waves-effect waves-dark">Question 3</div>
						<div class="step-content">
							<div class="countdown" style="zoom:0.2;">
								<svg viewBox="-50 -50 100 100" stroke-width="10">
									<circle r="45"></circle>
									<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
								</svg>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<label>Materialize Select</label>
									<select class="browser-default" style="margin-top:7%;">
										<option value=""  disabled selected>Choose the type of question</option>
										<option value="1">text</option>
										<option value="2">multiple choice</option>
										<option value="3">long text</option>
									</select>

								</div>
							</div>
							<div class="step-actions">
								<--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
								--
								<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
							</div>
						</div>
					</li>-->

			</form>

		</div><!--/container-->


		<!-- Modal Structure -->
		<div id="modal-choice-inputs" class="modal" style="height:44%;">
			<div class="modal-content">
				<h4>Choose type of input</h4>
				<div class="input-field col s12">
					<select class="browser-default" id="select-type-input" style="margin-top:7%;">
						<option value=""  disabled selected>Choose the type of question</option>
						<option value="1">text</option>
						<option value="2">multiple choice</option>
						<option value="3">long text</option>
						<option value="4">Image</option>
					</select>

				</div>
			</div>

			<div class="modal-footer">
				<a href="#!" class="modal-action
                    modal-close waves-effect waves-green
                    btn green lighten-1">
					Close
				</a>
			</div>
		</div>
		</div>
	</section>

	<!-- ========================  Stretcher widget ======================== -->

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->


	<!-- ========================  Blog Block ======================== -->

	<!-- ========================  Instagram ======================== -->




	<?php $this->view('partials/footer'); ?>

</div> <!--/wrapper-->
<!-- Compiled and minified JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.0.0/jquery.steps.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>

<script>
	$(document).ready(function(){
/*
		var stepper = document.querySelector('.stepper');
		var stepperInstace = new MStepper(stepper, {
			// options
			firstActive: 0 // this is the default
		})*/
		$('.timepicker').timepicker();
		$('.modal').modal({
			dismissible: false,
			onCloseEnd: function() { // Callback for Modal close
				idInput=$('#select-type-input').children(":selected").attr("value");
				switch (idInput) {
					case "1":
						$('.input-1').append(`<div class="input-2">
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question 2</div>
			<div class="step-content">
				<div class="countdown" style="zoom:0.2;">
					<svg viewBox="-50 -50 100 100" stroke-width="10">
						<circle r="45"></circle>
						<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
					</svg>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Question about polynomes :what are 1</label>
								<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Duration of the question</label>
								<input type="time" onfocus="this.showPicker()" class="time-pick"  name="usr_time">
							</div>
						</div>
					</div>
				</div>
				</div>`);
						break;
					case "2":
						day = "Tuesday";
						break;
					case "3":
						alert('ii');
						break;
					case "4":
						day = "Thursday";
						break;
				}
			}
		});
		$( ".time-pick" ).focus(function() {
			this.showPicker();
		});
		$('.next-inputs').click(function (){


		})
	})
</script>

</html>