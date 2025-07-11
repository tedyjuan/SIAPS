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
		<!-- blog single area -->
		<div class="blog-single-area pt-40 pb-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog-single-wrapper">
							<div class="blog-single-content">
								<div class="blog-thumb-img">
									<img src="<?= base_url('uploads/blog/') . $blog->szNameFile ?>" alt="thumb">
								</div>
								<div class="blog-info">
									<div class="blog-meta">
										<div class="blog-meta-left">
											<ul>
												<li><i class="fa-solid fa-layer-group"></i><a href="#"><?= $blog->nm_kat; ?></a></li>
											</ul>
										</div>
										<div class="blog-meta-right">

											<a href="#" class="share-link"><i class="fal fa-calendar-alt"></i><?= date("F j, Y", strtotime($blog->dtmCreated)); ?> </a>
											<a href="#" class="share-link"><i class="fal fa-eye"></i><?= $blog->szViewCount; ?></a>
										</div>
									</div>
									<div class="blog-details">
										<h3 class="blog-details-title mb-20"><?= htmlspecialchars($blog->szTitle, ENT_QUOTES, 'UTF-8') ?></h3>
										<?= $blog->szContent ?>
										<hr>

									</div>
									<div class="blog-author">
										<div class="blog-author-img">
											<img src="<?= base_url('public/eduka/'); ?>assets/img/blog/author.jpg" alt="">
										</div>
										<div class="author-info">
											<h6>Author</h6>
											<h3 class="author-name">Agnes F. Natale</h3>
											<p>It is a long established fact that a reader will be distracted by the abcd readable content of a page when looking at its layout that more less.</p>
											<div class="author-social">
												<a href="#"><i class="fab fa-facebook-f"></i></a>
												<a href="#"><i class="fab fa-linkedin-in"></i></a>
												<a href="#"><i class="fab fa-instagram"></i></a>
												<a href="#"><i class="fab fa-whatsapp"></i></a>
												<a href="#"><i class="fab fa-youtube"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<aside class="sidebar">
							<!-- category -->
							<div class="widget category">
								<h5 class="widget-title">Category</h5>
								<div class="category-list">
									<?php foreach ($grid_kategori as $ktt) : ?>
										<a href="#"><i class="far fa-arrow-right"></i><?= $ktt->szName; ?></a>
									<?php endforeach; ?>

								</div>
							</div>
							<!-- recent post -->
							<div class="widget recent-post">
								<h5 class="widget-title">Recent Post</h5>
								<?php foreach ($recent_post as $rp) : ?>
									<div class="recent-post-single">
										<div class="recent-post-bio">
											<h6><a href="<?= base_url('blog/') . $rp->szSlug; ?>"><?= $rp->szTitle; ?></a></h6>
											<span><i class="far fa-clock"></i><?= date("F j, Y", strtotime($rp->dtmCreated)); ?> </span>
										</div>
									</div>
								<?php endforeach; ?>

							</div>
							<!-- social share -->
							<div class="widget social-share">
								<h5 class="widget-title">Follow Us</h5>
								<div class="social-share-link">
									<a href="#"><i class="fab fa-facebook-f"></i></a>
									<a href="#"><i class="fab fa-linkedin-in"></i></a>
									<a href="#"><i class="fab fa-dribbble"></i></a>
									<a href="#"><i class="fab fa-whatsapp"></i></a>
									<a href="#"><i class="fab fa-youtube"></i></a>
								</div>
							</div>
							<!-- Recent Post -->

						</aside>
					</div>
				</div>
			</div>
		</div>
		<!-- blog single area end -->

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
