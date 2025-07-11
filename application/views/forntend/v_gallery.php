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
	<style>
		.gallery-content::before {
			content: "";
			position: absolute;
			left: 10px;
			top: 10px;
			right: 10px;
			bottom: 10px;
			background: var(--theme-color2);
			border-radius: 10px 10px 10px 10px;
			opacity: 0;
			visibility: hidden;
			transition: 0.3s;
		}
	</style>
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
		<!-- event area -->
		<div class="event-area py-80 mb-5">
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

				<div class="row">
					<div class="row popup-gallery">
						<?php foreach ($galery as $gly) { ?>
							<div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
								<span class="badge bg-primary">Kegiatan : <?= $gly->szName; ?></span>
								<div class="gallery-item">
									<div class="gallery-imgs">
										<img style="border-radius: 10px 10px 10px 10px; width:100%" src="<?= base_url('uploads/gallery/' . $gly->szNameFile); ?>" alt="">
									</div>
									<div class="gallery-content">
										<a class="popup-img gallery-link" href="<?= base_url('uploads/gallery/' . $gly->szNameFile); ?>"><i class="fal fa-plus"></i></a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="pagination-area">
					<div aria-label="Page navigation example">
						<?= $pagination ?>
					</div>
				</div>
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
	</script>
</body>

</html>
