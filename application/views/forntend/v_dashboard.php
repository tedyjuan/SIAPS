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
	<title>Eduka - School, </title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('public/eduka/'); ?>assets/img/logo/favicon.png">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/all-fontawesome.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('public/eduka/'); ?>assets/css/style.css">

</head>

<body class="home-3">

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
		<!-- hero slider -->
		<div class="hero-section">
			<div class="hero-slider owl-carousel owl-theme">
				<?php if (!empty($slider)) : ?>
					<?php foreach ($slider as $row) : ?>
						<div class="hero-single" style="background: url(<?= base_url('uploads/slider/' . $row->szNameFile); ?>)">
							<div class="container">
								<div class="row align-items-center">
									<div class="col-md-12 col-lg-7">
										<div class="hero-content">
											<h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
												<i class="far fa-book-open-reader"></i>Selamat Datang!
											</h6>
											<h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
												<?= $row->szName; ?><br> <span><?= $row->szHighlightTxt; ?></span>
											</h1>
											<p data-animation="fadeInLeft" data-delay=".75s">
												"<?= $row->szLongTxt; ?>"
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<!-- DEFAULT SLIDE JIKA SLIDER KOSONG -->
					<div class="hero-single" style="background: url(<?= base_url('uploads/slider/default.jpg'); ?>)">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-md-12 col-lg-7">
									<div class="hero-content">
										<h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
											<i class="far fa-book-open-reader"></i>Selamat Datang!
										</h6>
										<h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
											Your Brand<br> <span>Highlight Text</span>
										</h1>
										<p data-animation="fadeInLeft" data-delay=".75s">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum a
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<!-- hero slider end -->
		<!-- feature area -->
		<div class="feature-area pt-100">
			<div class="container">
				<div class="row g-4">
					<div class="col-md-6 col-lg-3">
						<div class="feature-item wow fadeInUp" data-wow-delay=".25s">
							<span class="count">01</span>
							<div class="feature-icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/scholarship.svg" alt="">
							</div>
							<div class="feature-content">
								<h4 class="feature-title">Beasiswa</h4>
								<p>Sudah menjadi fakta yang umum diketahui bahwa pembaca akan terganggu.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="feature-item active wow fadeInDown" data-wow-delay=".25s">
							<span class="count">02</span>
							<div class="feature-icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/teacher.svg" alt="">
							</div>
							<div class="feature-content">
								<h4 class="feature-title">Guru Terampil</h4>
								<p>Sudah menjadi fakta yang umum diketahui bahwa pembaca akan terganggu.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="feature-item wow fadeInUp" data-wow-delay=".25s">
							<span class="count">03</span>
							<div class="feature-icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/library.svg" alt="">
							</div>
							<div class="feature-content">
								<h4 class="feature-title">Fasilitas Perpustakaan Buku</h4>
								<p>Sudah menjadi fakta yang umum diketahui bahwa pembaca akan terganggu.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="feature-item wow fadeInDown" data-wow-delay=".25s">
							<span class="count">04</span>
							<div class="feature-icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/money.svg" alt="">
							</div>
							<div class="feature-content">
								<h4 class="feature-title">Harga Terjangkau</h4>
								<p>Sudah menjadi fakta yang umum diketahui bahwa pembaca akan terganggu.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- feature area end -->
		<!-- enroll area-->
		<div class="enroll-area pt-80 pb-80">
			<div class="container">
				<div class="col-lg-12">
					<div class="row g-5 align-items-center">
						<div class="col-lg-6">
							<div class="enroll-left wow fadeInLeft" data-wow-delay=".25s">
								<div class="enroll-form">
									<div class="portfolio-item">
										<div class="portfolio-img">
											<img src="<?= base_url('public/eduka/'); ?>assets/img/guru/guru-600x800.png" alt="" height="200">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="enroll-right wow fadeInUp" data-wow-delay=".25s">
								<div class="skill-content">
									<div class="site-heading mb-3">
										<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> KEPALA SMAN 1 CUKUH BALAK</span>
										<h2 class="site-title text-white">
											Ibu Tuti Kurniawati <span> S.Pd., M.Pd.</span>
										</h2>
									</div>
									<p class="text-white">
										Pembelajaran elearning merupakan bagian dari tuntutan kemajuan teknologi dan komunikasi saat ini. Melalui
										pembelajaran model ini diharapkan pendidik dan peserta didik dapat lebih interaktif dan menyenangkan.
										Alhamdulillah kita patut bersyukur, SMA Negeri 1 cukuh balak menjadi pelopor di Kota Lampung yang menerapkan
										pembelajaran UKBM dalam bentuk eLearning. Oleh karena itu, kami berharap melalui pembelajaran
										elearning ini SMA Negeri 1 cukuh balak menjadi bagian dari pendidikan yang bermutu dan berkualitas
									</p>

									<a href="contact.html" class="theme-btn mt-5">Learn More<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- enroll area end -->




		<!-- about area -->
		<div class="about-area py-120">
			<div class="container">
				<div class="row g-4 align-items-center">
					<div class="col-lg-6">
						<div class="about-left wow fadeInLeft" data-wow-delay=".25s">
							<div class="about-img">
								<div class="row g-4">
									<div class="col-md-6">
										<img class="img-1" src="<?= base_url('public/eduka/'); ?>assets/img/about/01.jpg" alt="">
										<div class="about-experience mt-4">
											<div class="about-experience-icon">
												<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/exchange-idea.svg" alt="">
											</div>
											<b class="text-start">30 Years Of <br> Quality Service</b>
										</div>
									</div>
									<div class="col-md-6">
										<img class="img-2" src="<?= base_url('public/eduka/'); ?>assets/img/about/02.jpg" alt="">
										<img class="img-3 mt-4" src="<?= base_url('public/eduka/'); ?>assets/img/about/03.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-right wow fadeInRight" data-wow-delay=".25s">
							<div class="site-heading mb-3">
								<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> About Us</span>
								<h2 class="site-title">
									Profil Sekolah <span>SMA</span> Negeri 1 CUKUH BALAK
								</h2>
							</div>
							<p class="about-text">
								There are many variations of passages available but the majority have suffered
								alteration in some form by injected humour randomised words which don't look even
								slightly believable. If you are going to use passage.
							</p>
							<div class="about-content">
								<div class="row">
									<div class="col-md-7">
										<div class="about-item">
											<div class="about-item-icon">
												<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/open-book.svg" alt="">
											</div>
											<div class="about-item-content">
												<h5>Edukation Services</h5>
												<p>It is a long established fact that reader will to using content.</p>
											</div>
										</div>
										<div class="about-item">
											<div class="about-item-icon">
												<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/global-education.svg" alt="">
											</div>
											<div class="about-item-content">
												<h5>International Hubs</h5>
												<p>It is a long established fact that reader will to using content.</p>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="about-quote">
											<p>It is a long established fact that a reader will be distracted by the
												content of
												a page when looking at its reader for the long words layout.</p>
											<i class="far fa-quote-right"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="about-bottom">
								<a href="about.html" class="theme-btn">Discover More<i
										class="fas fa-arrow-right-long"></i></a>
								<div class="about-phone">
									<div class="icon"><i class="fal fa-headset"></i></div>
									<div class="number">
										<span>Call Now</span>
										<h6><a href="tel:+21236547898">+2 123 654 7898</a></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- about area end -->


		<!-- counter area -->
		<div class="counter-area pt-60 pb-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/course.svg" alt="">
							</div>
							<div>
								<span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
								<h6 class="title">+ Total Cources </h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/graduation.svg" alt="">
							</div>
							<div>
								<span class="counter" data-count="+" data-to="1900" data-speed="3000">1900</span>
								<h6 class="title">+ Our Students</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/teacher-2.svg" alt="">
							</div>
							<div>
								<span class="counter" data-count="+" data-to="750" data-speed="3000">750</span>
								<h6 class="title">+ Skilled Lecturers</h6>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="counter-box">
							<div class="icon">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/award.svg" alt="">
							</div>
							<div>
								<span class="counter" data-count="+" data-to="30" data-speed="3000">30</span>
								<h6 class="title">+ Win Awards</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- counter area end -->


		<!-- blog area -->
		<div class="blog-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Blog kami</span>
							<h2 class="site-title">Berita & <span>Blog Terbaru </span></h2>
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
												<i class="far fa-eye"></i> <?= $blg->szViewCount; ?>
											</li>
										</ul>
									</div>
									<h4 class="blog-title">
										<a href="<?= base_url('blog/') . $blg->szSlug; ?>"><?= htmlspecialchars($blg->szTitle, ENT_QUOTES, 'UTF-8') ?>
										</a>
									</h4>
									<a class="theme-btn" href="<?= base_url('blog/') . $blg->szSlug; ?>">Read More<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
		<!-- blog area end -->



		<!-- video-area -->
		<div class="video-area  bg py-120">
			<div class="container">
				<div class="row g-4">
					<div class="col-lg-4 wow fadeInLeft" data-wow-delay=".25s">
						<div class="site-heading mb-3">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Latest Video</span>
							<h2 class="site-title">
								Let's Check Our <span>Latest</span> Video
							</h2>
						</div>
						<p class="about-text">
							There are many variations of passages available but the majority have suffered
							alteration in some form by injected humour look even slightly believable.
						</p>
						<a href="about.html" class="theme-btn mt-30">Learn More<i class="fas fa-arrow-right-long"></i></a>
					</div>
					<div class="col-lg-8 wow fadeInRight" data-wow-delay=".25s">
						<div class="video-content" style="background-image: url(<?= base_url('public/eduka/'); ?>assets/img/video/01.jpg);">
							<div class="row align-items-center">
								<div class="col-lg-12">
									<div class="video-wrapper">
										<a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
											<i class="fas fa-play"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- video-area end -->
		<!-- gallery-area -->
		<?php if ($jumlah_foto >= 2): ?>
			<div class="gallery-area py-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 mx-auto">
							<div class="site-heading text-center">
								<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery</span>
								<h2 class="site-title">Kegiatan <span>Sekolah</span></h2>
							</div>
						</div>
					</div>
					<div class="row popup-gallery">
						<?php foreach ($galery as $glly): ?>
							<div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
								<div class="gallery-item">
									<div class="gallery-img">
										<img style="object-fit: cover;" src="<?= base_url('uploads/gallery/' . $glly->szNameFile); ?>" alt="">
									</div>
									<div class="gallery-content">
										<a class="popup-img gallery-link" href="<?= base_url('uploads/gallery/' . $glly->szNameFile); ?>"><i class="fal fa-plus"></i></a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="text-center">
						<a href="<?= base_url('gallery'); ?>" class="theme-btn mt-3 text-center">Learn More<i class="fas fa-arrow-right-long"></i></a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- gallery-area end -->

		<!-- department area -->
		<div class="department-area bg py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> EKSTRAKURIKULER</span>
							<h2 class="site-title">Program <span>Ekstrakurikuler</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="department-slider owl-carousel owl-theme">
					<?php foreach ($ekstrakurikuler as $eskul) : ?>
						<div class="department-item">
							<div class="department-icon">
								<img src="<?= base_url('public/eduka/assets/img/icon/' . $eskul->szIcon); ?>" alt="">
							</div>
							<div class="department-info">
								<h4 class="department-title"><a href=""><?= $eskul->szName; ?></a></h4>
								<p><?= $eskul->szDescription; ?></p>
								<div class="department-btn">
									<a href="">Read More<i class="fas fa-arrow-right-long"></i></a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/assets/img/icon/footbal.svg'); ?>" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="">FOOTBALL</a></h4>
							<p>Mengembangkan minat dan Bakat siswa di bidang olahraga sepak bola </p>
							<div class="department-btn">
								<a href="">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- department area end -->


		<!-- team-area -->
		<div class="team-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Guru dan Pegawai</span>
							<h2 class="site-title">Guru & <span>Pegawai</span></h2>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".25s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/guru1.jpg" alt="thumb">
							</div>
							<div class="team-social">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-whatsapp"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="team-content">
								<div class="team-bio">
									<h5><a href="#">Angela T. Vigil</a></h5>
									<span>Kepala Sekolah</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".50s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/guru2.jpg" alt="thumb">
							</div>
							<div class="team-social">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-whatsapp"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="team-content">
								<div class="team-bio">
									<h5><a href="#">Frank A. Mitchell</a></h5>
									<span>Tenaga Pendidik</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".75s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/guru3.jpg" alt="thumb">
							</div>
							<div class="team-social">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-whatsapp"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="team-content">
								<div class="team-bio">
									<h5><a href="#">Susan D. Lunsford</a></h5>
									<span>Tenaga Pendidik</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay="1s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/guru4.jpg" alt="thumb">
							</div>
							<div class="team-social">
								<a href="#"><i class="fab fa-facebook-f"></i></a>
								<a href="#"><i class="fab fa-whatsapp"></i></a>
								<a href="#"><i class="fab fa-linkedin-in"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="team-content">
								<div class="team-bio">
									<h5><a href="#">Dennis A. Pruitt</a></h5>
									<span>Tenaga Pendidik</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="<?= base_url('gallery'); ?>" class="theme-btn mt-3 text-center">Learn More<i class="fas fa-arrow-right-long"></i></a>
				</div>
			</div>
		</div>
		<!-- team-area end -->


		<!-- testimonial area -->
		<div class="testimonial-area bg pt-80 pb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Testimonials</span>
							<h2 class="site-title">What Our Students <span>Say's</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="testimonial-slider owl-carousel owl-theme">
					<div class="testimonial-item">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
								There are many variations of tend to repeat chunks some all form necessary injected for the going are humour words.
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/testimonial/01.jpg" alt="">
							</div>
							<div class="testimonial-author-info">
								<h4>Anthony Nicoll</h4>
								<p>Student</p>
							</div>
						</div>
						<span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
					</div>
					<div class="testimonial-item">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
								There are many variations of tend to repeat chunks some all form necessary injected for the going are humour words.
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/testimonial/02.jpg" alt="">
							</div>
							<div class="testimonial-author-info">
								<h4>Richard Lock</h4>
								<p>Student</p>
							</div>
						</div>
						<span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
					</div>
					<div class="testimonial-item">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
								There are many variations of tend to repeat chunks some all form necessary injected for the going are humour words.
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/testimonial/03.jpg" alt="">
							</div>
							<div class="testimonial-author-info">
								<h4>Randal Grand</h4>
								<p>Student</p>
							</div>
						</div>
						<span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
					</div>
					<div class="testimonial-item">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
								There are many variations of tend to repeat chunks some all form necessary injected for the going are humour words.
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/testimonial/04.jpg" alt="">
							</div>
							<div class="testimonial-author-info">
								<h4>Edward Miles</h4>
								<p>Student</p>
							</div>
						</div>
						<span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
					</div>
					<div class="testimonial-item">
						<div class="testimonial-rate">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</div>
						<div class="testimonial-quote">
							<p>
								There are many variations of tend to repeat chunks some all form necessary injected for the going are humour words.
							</p>
						</div>
						<div class="testimonial-content">
							<div class="testimonial-author-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/testimonial/05.jpg" alt="">
							</div>
							<div class="testimonial-author-info">
								<h4>Ninal Gordon</h4>
								<p>Student</p>
							</div>
						</div>
						<span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
					</div>
				</div>
			</div>
		</div>
		<!-- testimonial area end -->




		<!-- partner area -->
		<div class="partner-area bg pt-50 pb-50">
			<div class="container">
				<div class="partner-wrapper partner-slider owl-carousel owl-theme">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/01.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/02.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/03.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/04.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/01.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/02.png" alt="thumb">
					<img src="<?= base_url('public/eduka/'); ?>assets/img/partner/04.png" alt="thumb">
				</div>
			</div>
		</div>
		<!-- partner area end -->

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
	<script src="<?= base_url('public/eduka/'); ?>assets/js/counter-up.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/wow.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/owl.carousel.min.js"></script>
	<script src="<?= base_url('public/eduka/'); ?>assets/js/main.js"></script>


</body>

</html>
