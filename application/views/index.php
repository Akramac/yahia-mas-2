
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

				<?php foreach($allCategories as $key => $cat) { ?>
				<div id="idImgPrim<?php echo $key+1;?>">
					<div class="h1 title"><small>Category</small> <?php echo $cat->name; ?></div>
					<img src="<?php echo base_url(); ?>assets/images/sliders/math.jpg" alt="Alternate Text" />
				</div>
				<?php } ?>
			</div>

			<!-- === tabsy links === -->

			<div class="tabsy-links">

				<div class="row">
					<?php foreach($allCategories as $key => $cat) { ?>
						<figure class="col-xs-6 col-sm-6 col-md-2 current" data-image="idImgPrim<?php echo $key+1;?>">
						<a href="#" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title"><?php echo $cat->name; ?></span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>
					<?php } ?>

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
				<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Student')  : ?>
					<?php foreach($teachers_by_student as $teacher) { ?>
					<a href="#">
						<figure>
							<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $teacher->id % 4; ?>.jpg" alt="Alternate Text" />
							<figcaption><?php echo $teacher->name; ?></figcaption>
						</figure>
					</a>
					<?php } ?>
				<?php endif ;?>

				<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Teacher')  : ?>
					<?php foreach($students_by_teacher as $student) { ?>
						<a target="_blank" href="<?php echo base_url(); ?>index.php/teacher/list/exam-by-teacher/<?php echo $student->id; ?>">
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
					<!--<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>-->
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

			<!-- === if student === -->
			<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Student')  : ?>
			<?php foreach($exams_by_student as $exam) { ?>
				<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
					<!--logo-item-->
					<div class="stretcher-logo">
						<div class="text">
							<span class="text-intro">Exam  : <?php echo $exam->title; ?><br>
								<?php echo date('d/m/Y h:i:s',strtotime($exam->date_created)); ?></span>
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
			<!-- === if teacher === -->
			<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Teacher')  : ?>
				<?php foreach($exams_by_student as $exam) { ?>
					<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
						<!--logo-item-->
						<div class="stretcher-logo">
							<div class="text">
								<span class="text-intro">Exam  : <?php echo $exam->title; ?> <br>
									<?php echo date('d/m/Y h:i:s',strtotime($exam->date_created)); ?></span>
							</div>
						</div>
						<!--main text-->
						<figure>
							<h4>Exam <?php echo $exam->exam_id ?></h4>
						</figure>
						<!--anchor-->
						<a href="#">Anchor link</a>
					</li>
				<?php } ?>
				<!-- === stretcher exams more=== -->

				<li class="stretcher-item more">
					<div class="more-icon">
						<span data-title-show="Show more" data-title-hide="+"></span>
					</div>
					<a href="#"></a>
				</li>
			<?php  endif ;?>


		</ul>
	</section>

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->


	<!-- ========================  Blog Block ======================== -->

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
