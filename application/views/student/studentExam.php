
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

			#sortlistOrder{
				margin-left: 20%;
			}
			.div-after-label{
				margin-top: 7% !important;
			}

		}
		 .owl-carousel .owl-item img {
			width: 90% !important;
		}

		 /* drag style  */
		.example-parent {
			border: 2px solid #DFA612;
			color: black;
			display: flex;
			font-family: sans-serif;
			font-weight: bold;
		}

		.example-origin {
			flex-basis: 100%;
			flex-grow: 1;
			padding: 10px;
		}

		.example-draggable {
			background-color: #4AAE9B;
			font-weight: normal;
			margin-bottom: 10px;
			margin-top: 10px;
			padding: 10px;
		}

		.example-dropzone {
			background-color: #6DB65B;
			flex-basis: 50%;
			flex-grow: 1;
			padding: 10px;
		}
		ul.stepper.horizontal .step .step-content .step-actions{
			position: relative !important;
		}


		/*  style drag and drop */
		/* (A) LIST STYLES */
		.slist, .correspList {
			list-style: none;
			padding: 0;
			margin: 0;
		}
		.slist li, .correspList li {
			margin: 10px;
			padding: 15px;
			border: 1px solid #dfdfdf;
			background: #f5f5f5;
		}
		.correspList li {
			  margin: 10px;
			  padding: 15px;
			  border: 1px solid #ec5252;
			  background: #f5f5f5;
		  }

		/* (B) DRAG-AND-DROP HINT */
		.slist li.hint {
			border: 1px solid #ffc49a;
			background: #feffb4;
		}
		.slist li.active {
			border: 1px solid #ffa5a5;
			background: #ffe7e7;
		}

		.card-options:hover{
			cursor: pointer;
		}

		/* selected card choice */

		.activated-card{
			border: 3px solid #ec5252;
			box-shadow: 0 0 5px 5px #ec5252;

		}
		.div-after-label{
			margin-top: 15%;
		}
	</style>
<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->
	<?php $this->view('partials/menu')?>

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
			<form id="msform" method="post" action="<?php echo base_url(); ?>index.php/student/add-exam	">
				<input type="text" value="<?php echo $idExam; ?>" name="idExam" class="form-control"  hidden>
				<input type="text" value="<?php echo $idTeacher; ?>" name="idTeacher" class="form-control"  hidden>

				<ul class="stepper horizontal " id="horizontal">

					<?php foreach($listQuestionsSingleChoice as $question) { ?>
						<li class="step step-4">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<h5><?php echo $question->title; ?></h5>
								<label>Select the correct answer</label>
								<div class="row">

									<div class="col-md-6 com-xs-12">
										<div class="card blue-grey darken-1 card-options" id="step-4" alt="<?php echo $question->option_1; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/square.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_1; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card blue-grey darken-1 card-options" id="step-4" alt="<?php echo $question->option_2; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/traingle.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />  <?php echo $question->option_2; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card blue-grey darken-1 card-options" id="step-4" alt="<?php echo $question->option_3; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/cercle.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_3; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card blue-grey darken-1 card-options" id="step-4" alt="<?php echo $question->option_4; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/xbox.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_4; ?></p>
											</div>
										</div>
									</div>

									<div class="input-field col s12" >

										<select class="browser-default " name="select-options-cards-<?php echo $question->quest_multi_id; ?>" id="select-options-cards"  alt="<?php echo $question->quest_multi_id; ?>" style="margin-top:7%;" hidden>
											<option value=""  disabled selected>Choose the type of question</option>
											<option value="<?php echo $question->option_1; ?>"><?php echo $question->option_1; ?></option>
											<option value="<?php echo $question->option_2; ?>"><?php echo $question->option_2; ?></option>
											<option value="<?php echo $question->option_3; ?>"><?php echo $question->option_3; ?></option>
											<option value="<?php echo $question->option_4; ?>"><?php echo $question->option_4; ?></option>
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
					<?php } ?>
					<?php foreach($listQuestionsLongText as $question) { ?>
						<li class="step ">
							<div data-step-label="" class="step-title waves-effect waves-dark"></div>
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
												<label style="text-align:left"><?php echo $question->title; ?></label>
												<input type="text" name="long-text-<?php echo $question->quest_long_text_id; ?>" class="form-control" placeholder="Your answer" >
											</div>
										</div>
									</div>
								</div>
								<div class="step-actions">
									<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								</div>
							</div>
						</li>
					<?php } ?>

					<?php foreach($listQuestionsTawsil as $question) { ?>
						<li class="step">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<div class="row" >
									<div class="input-field col s12">
										<label >Link the correct options</label>
										<div style="margin-top: 7%;">
											<div class="row">
												<ul id="sortlist" class="col-md-6 col-xs-6 sortlist">
													<li alt="<?php echo $question->option_1; ?>">
														<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />
														<?php echo $question->option_1; ?>
														<img src="<?php echo base_url(); ?>assets/images/link.png" alt="Alternate Text" style="width:25px;float:right;"/>
													</li>
													<li alt="<?php echo $question->option_2; ?>">												<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />
														<?php echo $question->option_2; ?>
														<img src="<?php echo base_url(); ?>assets/images/link.png" alt="Alternate Text" style="width:25px;float:right;"/>
													</li>
													<li alt="<?php echo $question->option_3; ?>">												<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />
														<?php echo $question->option_3; ?>
														<img src="<?php echo base_url(); ?>assets/images/link.png" alt="Alternate Text" style="width:25px;float:right;"/>
													</li>
													<li alt="<?php echo $question->option_4; ?>">												<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />
														<?php echo $question->option_4; ?>
														<img src="<?php echo base_url(); ?>assets/images/link.png" alt="Alternate Text" style="width:25px;float:right;"/>
													</li>
												</ul>

												<ul id="correspList"  class="correspList col-md-6 col-xs-6">
													<li>
														<?php echo $question->link_option_1; ?>
													</li>
													<li><?php echo $question->link_option_2; ?></li>
													<li><?php echo $question->link_option_3; ?></li>
													<li><?php echo $question->link_option_4; ?></li>
												</ul>

												<input type="text" value="1,2,3,4" name="tawsil-input-<?php echo $question->quest_tawsil_id	; ?>" class="form-control tawsil-input"  hidden>

											</div>



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
					<?php } ?>
					<?php foreach($listQuestionsTartib as $question) { ?>
						<li class="step step-5">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<h5><?php echo $question->title; ?></h5>
								<label>Oder this cards correctly :</label>
								<div class="row justify-content-center">
									<ul id="sortlistOrder" class="col-md-6 col-xs-12 sortlistOrder" >
										<li alt="<?php echo $question->option_to_order_1; ?>">
											<?php echo $question->option_to_order_1; ?>
											<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;float:right;"/>
										</li>
										<li alt="<?php echo $question->option_to_order_2; ?>">
											<?php echo $question->option_to_order_2; ?>
											<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;float:right;"/>
										</li>
										<li alt="<?php echo $question->option_to_order_3; ?>">
											<?php echo $question->option_to_order_3; ?>
											<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;float:right;"/>
										</li>
										<li alt="<?php echo $question->option_to_order_4; ?>">
											<?php echo $question->option_to_order_4; ?>
											<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;float:right;"/>
										</li>
									</ul>
									<input type="text" value="1,2,3,4" name="tartib-input-<?php echo $question->quest_tartib_id; ?>" class="form-control tartib-input"  hidden>

								</div>
								<div class="step-actions">
									<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
									-->
									<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
									<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
								</div>
							</div>
						</li>
					<?php } ?>

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

		$('.sortlist > li').mouseleave(function() {
			var inputTawsil=$(this).parent().parent().find('.tawsil-input');
			var listTawsil=$(this).parent().find('li');
			var concatTawsilOrder=';'
			listTawsil.each(function(){
				concatTawsilOrder=concatTawsilOrder+$(this).attr('alt')+';';

			});
			inputTawsil.val(concatTawsilOrder);
		});

		$('.sortlistOrder > li').mouseleave(function() {
			var inputTartib=$(this).parent().parent().find('.tartib-input');
			var listTawsil=$(this).parent().find('li');
			var concatTartibOrder=';'
			listTawsil.each(function(){
				concatTartibOrder=concatTartibOrder+$(this).attr('alt')+';';

			});
			inputTartib.val(concatTartibOrder);
		});
		slist(document.getElementById("sortlist"));
		slist(document.getElementById("sortlistOrder"));

		/* treatement card select */
		$('.card-options').click(function (){
			var id=$(this).attr('id');
			var orderValue=$(this).attr('alt');
			$('.'+id+' .card-options').removeClass('activated-card');
			$(this).addClass('activated-card');
			$('.'+id+' #select-options-cards option').removeAttr("selected");
			$('.'+id+' #select-options-cards option[value='+orderValue+']').attr('selected','selected');
		});


	})

	function onDragStart(event) {
		event
			.dataTransfer
			.setData('text/plain', event.target.id);

		event
			.currentTarget
			.style
			.backgroundColor = 'yellow';
	}
	function onDragOver(event) {
		event.preventDefault();
	}

	function onDrop(event) {
		const id = event
			.dataTransfer
			.getData('text');

		const draggableElement = document.getElementById(id);
		const dropzone = event.target;
		dropzone.appendChild(draggableElement);
		event
			.dataTransfer
			.clearData();
	}

	/* drag js func */
	function slist (target) {
		// (A) SET CSS + GET ALL LIST ITEMS
		if(target){
			target.classList.add("slist");
			let items = target.getElementsByTagName("li"), current = null;

			// (B) MAKE ITEMS DRAGGABLE + SORTABLE
			for (let i of items) {
				// (B1) ATTACH DRAGGABLE
				i.draggable = true;

				// (B2) DRAG START - YELLOW HIGHLIGHT DROPZONES
				i.ondragstart = e => {
					current = i;
					for (let it of items) {
						if (it != current) { it.classList.add("hint"); }
					}
				};

				// (B3) DRAG ENTER - RED HIGHLIGHT DROPZONE
				i.ondragenter = e => {
					if (i != current) { i.classList.add("active"); }
				};

				// (B4) DRAG LEAVE - REMOVE RED HIGHLIGHT
				i.ondragleave = () => i.classList.remove("active");

				// (B5) DRAG END - REMOVE ALL HIGHLIGHTS
				i.ondragend = () => { for (let it of items) {
					it.classList.remove("hint");
					it.classList.remove("active");
				}};

				// (B6) DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
				i.ondragover = e => e.preventDefault();

				// (B7) ON DROP - DO SOMETHING
				i.ondrop = e => {
					e.preventDefault();
					if (i != current) {
						let currentpos = 0, droppedpos = 0;
						for (let it=0; it<items.length; it++) {
							if (current == items[it]) { currentpos = it; }
							if (i == items[it]) { droppedpos = it; }
						}
						if (currentpos < droppedpos) {
							i.parentNode.insertBefore(current, i.nextSibling);
						} else {
							i.parentNode.insertBefore(current, i);
						}
					}
				};
			}
		}

	}
</script>

</html>
