
<?php $this->view('partials/header')?>
    <style>
		nav .logo img {
			width: 140px !important;
			height: 70px !important;
		}
		.owl-carousel .owl-item img {
			width: 90% !important;
		}

	</style>
<div class="page-loader"></div>

<div class="wrapper">

	<?php $this->view('partials/menu' );?>
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
					<div class="h1 title"><small>Category</small>Maths</div>
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

				<!-- === icon item  for student === -->
				<?php if($_SESSION['user_type_role']=='Student')  : ?>
					<?php foreach($teachers_by_student as $teacher) { ?>
					<a href="#">
						<figure>
							<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $teacher->id % 4; ?>.jpg" alt="Alternate Text" />
							<figcaption><?php echo $teacher->name; ?></figcaption>
						</figure>
					</a>
					<?php } ?>
				<?php endif ;?>

				<?php if($_SESSION['user_type_role']=='Teacher')  : ?>
					<?php foreach($students_by_teacher as $student) { ?>
						<a href="#">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $student->id % 4; ?>.jpg" alt="Alternate Text" />
								<figcaption><?php echo $student->name; ?></figcaption>
							</figure>
						</a>
					<?php } ?>
				<?php endif ;?>





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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
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
			<?php if($_SESSION['user_type_role']=='Student')  : ?>
			<?php foreach($exams_by_student as $exam) { ?>
				<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
					<!--logo-item-->
					<div class="stretcher-logo">
						<div class="text">
							<span class="text-intro">Exam  : <?php echo date('d/m/Y',strtotime($exam->date_created)); ?></span>
						</div>
					</div>
					<!--main text-->
					<figure>
						<h4>Exam <?php echo $exam->id ?></h4>
					</figure>
					<!--anchor-->
					<a href="<?php echo base_url(); ?>index.php/student/pass/exam/<?php echo $exam->id ?>">Anchor link</a>
				</li>
			<?php } ?>
			<?php  endif ;?>


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
