<!DOCTYPE html>
<html lang="en">

<head>
	<!-- meta tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<!-- title -->
	<title>Eduka - School, College, University And Courses HTML5 Template</title>

	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url('public/eduka/'); ?>assets/img/logo/favicon.png">

	<!-- css -->
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/all-fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/style.css">

</head>

<body>

	<!-- preloader -->
	<div class="preloader">
		<div class="loader-book">
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
			<div class="loader-book-page"></div>
		</div>
	</div>
	<!-- preloader end -->

	<?php $this->load->view('forntend/layout/header'); ?>


	<main class="main">

		<!-- breadcrumb -->
		<div class="site-breadcrumb" style="background: url(<?= base_url('public/eduka/'); ?>assets/img/breadcrumb/01.jpg)">
			<div class="container">
				<h2 class="breadcrumb-title">Gallery Kegiatan Sekolah</h2>
				<ul class="breadcrumb-menu">
					<li><a href="index-2.html">Home</a></li>
					<li class="active">Gallery</li>
				</ul>
			</div>
		</div>
		<!-- breadcrumb end -->


		<!-- event area -->
		<div class="event-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery</span>
							<h2 class="site-title">Gallery <span>Kegiatan Sekolah</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="row popup-gallery">
					<div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
						<div class="gallery-item">
							<div class="gallery-img">
								<img style="object-fit: cover;" src="<?= base_url('uploads/gallery/img_1750816987.jpg'); ?>" alt="">
							</div>
							<div class="gallery-content">
								<a class="popup-img gallery-link" href="<?= base_url('uploads/gallery/img_1750816987.jpg'); ?>"><i class="fal fa-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<!-- <div class="event-item">
							<div class="event-location">
								<span><i class="far fa-map-marker-alt"></i> 25/B Milford Road, New York</span>
							</div>
							<div class="event-img">
							</div>
							<div class="event-info">
								<div class="event-meta">
									<span class="event-date"><i class="far fa-calendar-alt"></i>16 June, 2024</span>
									<span class="event-time"><i class="far fa-clock"></i>10.00AM - 04.00PM</span>
								</div>
								<h4 class="event-title"><a href="#">High School Program 2024</a></h4>
								<p>There are many variations of passages the majority have some injected humour.</p>
								<div class="event-btn">
									<a href="#" class="theme-btn">Join Event<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div> -->
					</div>
					<div class="col-lg-4">
						<div class="event-item">
							<div class="event-location">
								<span><i class="far fa-map-marker-alt"></i> 25/B Milford Road, New York</span>
							</div>
							<div class="event-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/event/03.jpg" alt="">
							</div>
							<div class="event-info">
								<div class="event-meta">
									<span class="event-date"><i class="far fa-calendar-alt"></i>16 June, 2024</span>
									<span class="event-time"><i class="far fa-clock"></i>10.00AM - 04.00PM</span>
								</div>
								<h4 class="event-title"><a href="#">High School Program 2024</a></h4>
								<p>There are many variations of passages the majority have some injected humour.</p>
								<div class="event-btn">
									<a href="#" class="theme-btn">Join Event<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="event-item">
							<div class="event-location">
								<span><i class="far fa-map-marker-alt"></i> 25/B Milford Road, New York</span>
							</div>
							<div class="event-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/event/04.jpg" alt="">
							</div>
							<div class="event-info">
								<div class="event-meta">
									<span class="event-date"><i class="far fa-calendar-alt"></i>16 June, 2024</span>
									<span class="event-time"><i class="far fa-clock"></i>10.00AM - 04.00PM</span>
								</div>
								<h4 class="event-title"><a href="#">High School Program 2024</a></h4>
								<p>There are many variations of passages the majority have some injected humour.</p>
								<div class="event-btn">
									<a href="#" class="theme-btn">Join Event<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="event-item">
							<div class="event-location">
								<span><i class="far fa-map-marker-alt"></i> 25/B Milford Road, New York</span>
							</div>
							<div class="event-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/event/05.jpg" alt="">
							</div>
							<div class="event-info">
								<div class="event-meta">
									<span class="event-date"><i class="far fa-calendar-alt"></i>16 June, 2024</span>
									<span class="event-time"><i class="far fa-clock"></i>10.00AM - 04.00PM</span>
								</div>
								<h4 class="event-title"><a href="#">High School Program 2024</a></h4>
								<p>There are many variations of passages the majority have some injected humour.</p>
								<div class="event-btn">
									<a href="#" class="theme-btn">Join Event<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="event-item">
							<div class="event-location">
								<span><i class="far fa-map-marker-alt"></i> 25/B Milford Road, New York</span>
							</div>
							<div class="event-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/event/06.jpg" alt="">
							</div>
							<div class="event-info">
								<div class="event-meta">
									<span class="event-date"><i class="far fa-calendar-alt"></i>16 June, 2024</span>
									<span class="event-time"><i class="far fa-clock"></i>10.00AM - 04.00PM</span>
								</div>
								<h4 class="event-title"><a href="#">High School Program 2024</a></h4>
								<p>There are many variations of passages the majority have some injected humour.</p>
								<div class="event-btn">
									<a href="#" class="theme-btn">Join Event<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- pagination -->
				<div class="pagination-area">
					<div aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
								</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- pagination end -->
			</div>
		</div>
		<!-- event area end -->

	</main>


	<?php $this->load->view('forntend/layout/footer'); ?>



	<!-- scroll-top -->
	<a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
	<!-- scroll-top end -->


	<!-- js -->
	<script src="<?= base_url('public/eduka/'); ?>assets/js/jquery-3.7.1.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/modernizr.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/jquery.appear.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/jquery.easing.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/owl.carousel.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/counter-up.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/wow.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/main.js"></script>

</body>

</html>
