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
		<!-- blog area -->
		<div class="blog-area py-100 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Our Blog</span>
							<h2 class="site-title">Latest News & <span>Blog</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php foreach ($blogs as $blg) : ?>
						<div class="col-md-6 col-lg-4">
							<div class="blog-item wow fadeInUp" data-wow-delay=".25s">
								<div class="blog-date"><i class="fal fa-calendar-alt"></i><?= date("F j, Y", strtotime($blg->dtmCreated)); ?></div>
								<div class="blog-item-img">
									<img src="<?= base_url('uploads/blog/') . $blg->szNameFile ?>" alt="Thumb">
								</div>
								<div class="blog-item-info">
									<div class="blog-item-meta">
										<ul>
											<li>
												<i class="fa-solid fa-layer-group"></i> <?= $blg->nm_kat; ?>
											</li>
											<li>
												<i class="far fa-eye"></i> <?= $blg->szViewCount; ?> Views
											</li>
										</ul>

									</div>
									<h4 class="blog-title">
										<a href="<?= base_url('blog/') . $blg->szSlug; ?>">
											<?= htmlspecialchars(ringkasan($blg->szTitle, 80), ENT_QUOTES, 'UTF-8') ?>
										</a>
									</h4>
									<div class="d-flex justify-content-between align-items-center ">
										<a class="badge bg-warning" href="<?= base_url('blog/') . $blg->szSlug; ?>">
											Read More <i class="fas fa-arrow-right-long"></i>
										</a>
										<span class="text-muted"><?= time_ago($blg->dtmCreated); ?></span>
									</div>

								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<!-- pagination -->
				<div class="pagination-area">
					<div aria-label="Page navigation example">
						<?= $pagination ?>
					</div>
				</div>
				<!-- pagination -->

			</div>
		</div>
		<!-- blog area end -->

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
