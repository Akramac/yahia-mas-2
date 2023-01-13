<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Mobile Web-app fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">

	<!-- Meta tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/logo--cropped.ico">

	<!--Title-->
	<title><?php echo $title  ?></title>

	<!--CSS bundle -->
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/animate.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/font-awesome.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/linear-icons.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/magnific-popup.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/ion-range-slider.css" />
	<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/theme.css" />

	<!--Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
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
</head>

<body>
