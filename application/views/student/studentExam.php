
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
		/* style uploader */
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

	<section class="owl-icons-wrapper">

		<!-- === header === -->

		<header class="hidden">
			<h2>Product categories</h2>
		</header>

		<div class="clearfix">

			<div class="owl-icons owl-icons-rounded ">

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img  src="<?php echo base_url(); ?>assets/images/avatars/teacher1.jpg" alt="Alternate Text"/>
						<figcaption>Teacher 1</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img class="teachers-avatar" src="<?php echo base_url(); ?>assets/images/avatars/teacher2.jpg" alt="Alternate Text" />
						<figcaption>Teacher 2</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher3.jpg" alt="Alternate Text" />
						<figcaption>Teacher 3</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher4.jpg" alt="Alternate Text" />
						<figcaption>Teacher 4</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher3.jpg" alt="Alternate Text" />
						<figcaption>Teacher 5</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher4.jpg" alt="Alternate Text" />
						<figcaption>Teacher 6</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher1.jpg" alt="Alternate Text" />
						<figcaption>Teacher 7</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher1.jpg" alt="Alternate Text" />
						<figcaption>Teacher 8</figcaption>
					</figure>
				</a>

				<!-- === icon item === -->

				<a href="#">
					<figure>
						<img src="<?php echo base_url(); ?>assets/images/avatars/teacher2.jpg" alt="Alternate Text" />
						<figcaption>Teacher 9</figcaption>
					</figure>
				</a>




			</div> <!--/owl-icons-->
		</div> <!--/container-->
	</section>

	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="contact section-questions">

		<!-- === Goolge map === -->

		<div id="map" style="background-image:url(<?php echo base_url(); ?>assets/images/backgrounds/wall.jpg)"></div>

		<div class="container">

			<!--<div class="row">

				<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

					<div class="contact-block">


						<div class="contact-info">
							<div class="row">
								<div class="col-md-offset-1 col-md-10 text-center">
									<h2 class="title">Exam</h2>
									<p>
										Answer  question 1
									</p>
									<div class="countdown" style="zoom:0.5;">
										<svg viewBox="-50 -50 100 100" stroke-width="10">
											<circle r="45"></circle>
											<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
										</svg>
									</div>
									<div class="contact-form-wrapper">
										<div class="row">
											<div class="col-md-12" hidden>
												<div class="form-group">
													<label style="text-align:left">Question about polynomes :what are 1</label>
													<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
												</div>
											</div>


											<div class="col-md-12" hidden>

												<div class="form-group">
													<label style="text-align:left">Question about polynomes :what are 2</label>
													<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
												</div>
											</div>

											<div class="col-md-12" hidden>
												<div class="form-group">
													<label style="text-align:left">Explain what are odd numbers :</label>
													<textarea class="form-control" placeholder="Your message" rows="10"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="input-field col s12">

													<label>Who has discovered Pi ?</label>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 1</span>
														</label>
													</p>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 2</span>
														</label>
													</p>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 3</span>
														</label>
													</p>
												</div>
											</div>
											<div class="col-md-12">
												<form id="file-upload-form" class="uploader">
													<input id="file-upload" type="file" name="fileUpload" accept="image/*" />

													<label for="file-upload" id="file-drag">
														<img id="file-image" src="#" alt="Preview" class="hidden">
														<div id="start">
															<i class="fa fa-download" aria-hidden="true"></i>
															<div>Select a file or drag here</div>
															<div id="notimage" class="hidden">Please select an image</div>
															<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
														</div>
														<div id="response" class="hidden">
															<div id="messages"></div>
															<progress class="progress" id="file-progress" value="0">
																<span>0</span>%
															</progress>
														</div>
													</label>
												</form>
											</div>
											<div class="col-md-12 mt-5">
												<div class="col-md-3"><a class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-arrow-left"></i></i></a></div>
												<div class="col-md-3"></div>
												<div class="col-md-3"></div>
												<div class="col-md-3"><a class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-arrow-right"></i></i></a></div>
											</div>
											<div class="col-md-12 text-center">
												<button class="btn waves-effect waves-light" type="submit" name="action" disabled>Submit
													<i class="fa fa-paper-plane"></i>
												</button>
											</div>
										</div>

										<div class="contact-form clearfix" hidden>
											<form action="#" method="post">
												<div class="row">


													<div class="col-md-12">
														<div class="input-field col s12">
															<select>
																<option value=""  disabled selected>Choose the type of question</option>
																<option value="1">text</option>
																<option value="2">multiple choice</option>
																<option value="3">long text</option>
															</select>
															<label>Materialize Select</label>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" value="" class="form-control" placeholder="Your title of the question" required="required">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<p class="range-field">
																<label>Duration</label>
																<input type="range" id="test5" min="0" max="100" />
															</p>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" placeholder="Your question" rows="10"></textarea>
														</div>
													</div>

													<div class="col-md-12 text-center">
														<button class="btn waves-effect waves-light" type="submit" name="action">Submit
															<i class="fa fa-paper-plane"></i>
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div> <--/contact-block->
				</div>--col-sm-8->
			</div> -/row->-->
<!--
			<div class="row">
				<div class="col s12">
					<form id="example-form">
						<div>
							<h3>Account</h3>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="input-field col s12">
											<label for="select-quest">Materialize Select</label>
											<select name="select-quest" id="select-quest">
												<option value=""  disabled selected>Choose the type of question</option>
												<option value="1">text</option>
												<option value="2">multiple choice</option>
												<option value="3">long text</option>
											</select>

										</div>
									</div>
									<div class="input-field col s6">
										<select multiple>
											<option value="" disabled selected>Choose style(s)</option>
											<option value="1">Option 1</option>
											<option value="2">Option 2</option>
											<option value="3">Option 3</option>
										</select>
										<label>Styles</label>
									</div>
								</div>
							</section>
							<h3>Profile</h3>
							<section>
								<div class="row">
									<div class="input-field col s6">
										<label>Begin date</label>
										<input id="beginDate" type="date" class="datepicker">

									</div>
									<div class="input-field col s6">
										<label>End date</label>
										<input id="endDate" type="date" class="datepicker">

									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input placeholder="Who is organizing the event?" id="organizer" type="text" class="validate">
										<label for="organizer">Organizer</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<label for="select-quest">Materialize Select</label>
										<select name="select-quest" id="select-quest">
											<option value=""  disabled selected>Choose the type of question</option>
											<option value="1">text</option>
											<option value="2">multiple choice</option>
											<option value="3">long text</option>
										</select>
									</div>
									<div class="input-field col s6">
										<input placeholder="contact@myweb.com" id="email" type="text" class="validate">
										<label for="email">Contact email</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12">
										<textarea id="description" class="materialize-textarea" length="140"></textarea>
										<label for="description">Describe the event in a tweet!</label>
									</div>
								</div>
							</section>
						</div>
					</form>
				</div>
			</div>-->
			<form id="msform">
				<ul class="stepper horizontal " id="horizontal">
					<li class="step active">
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
								</div>
							</div>
							<div class="step-actions">
								<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
							</div>
						</div>
					</li>
					<li class="step">
						<div class="step-title waves-effect waves-dark">Question 2</div>
						<div class="step-content">
							<div class="countdown" style="zoom:0.2;">
								<svg viewBox="-50 -50 100 100" stroke-width="10">
									<circle r="45"></circle>
									<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
								</svg>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<label >Who has discovered Pi ?</label>
									<div style="margin-top: 7%;">
										<p>
											<label>
												<input id="indeterminate-checkbox" type="checkbox" />
												<span>Person 1</span>
											</label>
										</p>
										<p>
											<label>
												<input id="indeterminate-checkbox" type="checkbox" />
												<span>Person 2</span>
											</label>
										</p>
										<p>
											<label>
												<input id="indeterminate-checkbox" type="checkbox" />
												<span>Person 3</span>
											</label>
										</p>
									</div>

								</div>
							</div>
							<div class="step-actions">
<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
-->								<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
							</div>
						</div>
					</li>
					<li class="step">
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
								<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
								-->
								<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
							</div>
						</div>
					</li>
					<li class="step ">
						<div class="step-title waves-effect waves-dark">Finish</div>
						<div class="step-content">
							Finish!
							<div class="step-actions">
								<button class="waves-effect waves-dark btn blue" type="submit">SUBMIT</button>
							</div>
						</div>
					</li>
				</ul>

			</form>

		</div><!--/container-->
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

		var stepper = document.querySelector('.stepper');
		var stepperInstace = new MStepper(stepper, {
			// options
			firstActive: 0 // this is the default
		})

	})
</script>

</html>
