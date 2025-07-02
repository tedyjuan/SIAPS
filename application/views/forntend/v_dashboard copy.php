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


	<!-- header area -->
	<header class="header">
		<div class="main-navigation">
			<nav class="navbar navbar-expand-lg">
				<div class="container position-relative">
					<a class="navbar-brand" href="index-2.html">
						<img src="<?= base_url('public/eduka/'); ?>assets/img/logo/logo.png" alt="logo">
					</a>
					<div class="mobile-menu-right">
						<div class="search-btn">
							<button type="button" class="nav-right-link search-box-outer"><i
									class="far fa-search"></i></button>
						</div>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="main_nav">
						<ul class="navbar-nav">
							<li class="nav-item "><a class="nav-link active" href="<?= base_url('/'); ?>">Beranda</a></li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Kesiswaan</a>
								<ul class="dropdown-menu fade-down">
									<li><a class="dropdown-item" href="blog.html">OSIS</a></li>
									<li><a class="dropdown-item" href="blog-single.html">Event SMA</a></li>
									<li><a class="dropdown-item" href="blog-single.html">Tata Tertib</a></li>
									<li><a class="dropdown-item" href="blog-single.html">Direktori Siswa</a></li>
								</ul>
							</li>
							<li class="nav-item mega-menu dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Sarpras & TU</a>
								<div class="dropdown-menu fade-down">
									<div class="mega-content">
										<div class="container-fluid">
											<div class="row">
												<div class="col-12 col-sm-4 col-md-3">
													<h5>Informasi</h5>
													<div class="menu-about">
														<a href="#" class="menu-about-logo"><img src="<?= base_url('public/eduka/'); ?>assets/img/logo/logo-light.png" alt=""></a>
														<p>pengertian sapras</p>
													</div>
												</div>
												<div class="col-12 col-sm-4 col-md-3">
													<h5>Sarana Prasarana</h5>
													<ul class="mega-menu-item">
														<li><a class="dropdown-item" href="academic-single.html">Sarana Prasarana</a></li>
														<li><a class="dropdown-item" href="academic-single.html">Denah SMA</a></li>
													</ul>
												</div>
												<div class="col-12 col-sm-4 col-md-3">
													<h5>Tata Usaha</h5>
													<ul class="mega-menu-item">
														<li><a class="dropdown-item" href="academic-single.html">Struktur Organisasi TU</a></li>

													</ul>
												</div>

											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="nav-item"><a class="nav-link" href="<?= base_url('Login'); ?>">Blogs</a></li>
							<li class="nav-item"><a class="nav-link" href="<?= base_url('Login'); ?>">Login</a></li>
						</ul>
						<div class="nav-right">
							<div class="search-btn">
								<button type="button" class="nav-right-link search-box-outer"><i
										class="far fa-search"></i></button>
							</div>
							<div class="nav-right-btn mt-2">
								<a href="#" class="theme-btn"><span class="fal fa-pencil"></span>Daftar Masuk</a>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- header area end -->


	<!-- popup search -->
	<div class="search-popup">
		<button class="close-search"><span class="far fa-times"></span></button>
		<form action="#">
			<div class="form-group">
				<input type="text" name="search-field" id="search_pop" placeholder="Search Here..." required>
				<button type="submit"><i class="far fa-search"></i></button>
			</div>
		</form>
	</div>
	<!-- popup search end -->



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


		<!-- course-area -->
		<div class="course-area py-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="site-heading text-center">
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Our Courses</span>
							<h2 class="site-title">Let's Check Our <span>Courses</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".25s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Drama</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/01.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Acting And Drama</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".50s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Design</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/02.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Art And Design</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".75s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Science</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/03.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Biology And Conservation</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".25s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Science</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/04.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Science And Engineering</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".50s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Health</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/05.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Health Administration</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="course-item wow fadeInUp" data-wow-delay=".75s">
							<div class="course-img">
								<span class="course-tag"><i class="far fa-bookmark"></i> Finance</span>
								<img src="<?= base_url('public/eduka/'); ?>assets/img/course/06.jpg" alt="">
								<a href="course-single.html" class="btn"><i class="far fa-link"></i></a>
							</div>
							<div class="course-content">
								<div class="course-meta">
									<span class="course-meta-left"><i class="far fa-book"></i> 10 Lessons</span>
									<div class="course-rating">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<span>(4.0)</span>
									</div>
								</div>
								<h4 class="course-title">
									<a href="course-single.html">Accounting And Finance</a>
								</h4>
								<p class="course-text">
									There are many variations of passages orem psum available but the majority have
									suffer alteration in some form by injected.
								</p>
								<div class="course-bottom">
									<div class="course-bottom-left">
										<span><i class="far fa-users"></i>75 Seats</span>
										<span><i class="far fa-clock"></i>04 Years</span>
									</div>
									<span class="course-price">$750</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- course-area -->


		<!-- video-area -->

		<!-- video-area end -->
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
		<!-- gallery-area -->
		<?php if ($jumlah_foto >= 2): ?>
			<div class="gallery-area py-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 mx-auto">
							<div class="site-heading text-center">
								<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery</span>
								<h2 class="site-title">Kegiatan <span>Sekolah</span></h2>
								<a href="<?= base_url('gallery');?>" class="theme-btn mt-3">Learn More<i class="fas fa-arrow-right-long"></i></a>
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
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Department</span>
							<h2 class="site-title">Browse Our <span>Department</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="department-slider owl-carousel owl-theme">
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/monitor.svg" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="academic-single.html">Business And Finance</a></h4>
							<p>There are many variations of passages the majority have some injected humour.</p>
							<div class="department-btn">
								<a href="academic-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/law.svg" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="academic-single.html">Law And Criminology</a></h4>
							<p>There are many variations of passages the majority have some injected humour.</p>
							<div class="department-btn">
								<a href="academic-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/data.svg" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="academic-single.html">IT And Data Science</a></h4>
							<p>There are many variations of passages the majority have some injected humour.</p>
							<div class="department-btn">
								<a href="academic-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/health.svg" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="academic-single.html">Health And Medicine</a></h4>
							<p>There are many variations of passages the majority have some injected humour.</p>
							<div class="department-btn">
								<a href="academic-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="department-item">
						<div class="department-icon">
							<img src="<?= base_url('public/eduka/'); ?>assets/img/icon/art.svg" alt="">
						</div>
						<div class="department-info">
							<h4 class="department-title"><a href="academic-single.html">Art And Design</a></h4>
							<p>There are many variations of passages the majority have some injected humour.</p>
							<div class="department-btn">
								<a href="academic-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
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
							<span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Our Teachers</span>
							<h2 class="site-title">Meet With Our <span>Teachers</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of
								a page when looking at its layout.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".25s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/01.jpg" alt="thumb">
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
									<span>Associate Professor</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".50s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/02.jpg" alt="thumb">
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
									<span>Associate Professor</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay=".75s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/03.jpg" alt="thumb">
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
									<span>CEO & Founder</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="team-item wow fadeInUp" data-wow-delay="1s">
							<div class="team-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/team/04.jpg" alt="thumb">
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
									<span>Associate Professor</span>
								</div>
							</div>
							<span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
						</div>
					</div>
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


		<!-- blog area -->
		<div class="blog-area py-120">
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
					<div class="col-md-6 col-lg-4">
						<div class="blog-item wow fadeInUp" data-wow-delay=".25s">
							<div class="blog-date"><i class="fal fa-calendar-alt"></i> June 18, 2024</div>
							<div class="blog-item-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/blog/01.jpg" alt="Thumb">
							</div>
							<div class="blog-item-info">
								<div class="blog-item-meta">
									<ul>
										<li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
										<li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
									</ul>
								</div>
								<h4 class="blog-title">
									<a href="blog-single.html">There are many variations passage have suffered available.</a>
								</h4>
								<a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="blog-item wow fadeInUp" data-wow-delay=".50s">
							<div class="blog-date"><i class="fal fa-calendar-alt"></i> June 18, 2024</div>
							<div class="blog-item-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/blog/02.jpg" alt="Thumb">
							</div>
							<div class="blog-item-info">
								<div class="blog-item-meta">
									<ul>
										<li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
										<li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
									</ul>
								</div>
								<h4 class="blog-title">
									<a href="blog-single.html">There are many variations passage have suffered available.</a>
								</h4>
								<a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="blog-item wow fadeInUp" data-wow-delay=".75s">
							<div class="blog-date"><i class="fal fa-calendar-alt"></i> June 18, 2024</div>
							<div class="blog-item-img">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/blog/03.jpg" alt="Thumb">
							</div>
							<div class="blog-item-info">
								<div class="blog-item-meta">
									<ul>
										<li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
										<li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
									</ul>
								</div>
								<h4 class="blog-title">
									<a href="blog-single.html">There are many variations passage have suffered available.</a>
								</h4>
								<a class="theme-btn" href="blog-single.html">Read More<i class="fas fa-arrow-right-long"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- blog area end -->


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



	<!-- footer area -->
	<footer class="footer-area">
		<div class="footer-widget">
			<div class="container">
				<div class="row footer-widget-wrapper pt-100 pb-70">
					<div class="col-md-6 col-lg-4">
						<div class="footer-widget-box about-us">
							<a href="#" class="footer-logo">
								<img src="<?= base_url('public/eduka/'); ?>assets/img/logo/logo-light.png" alt="">
							</a>
							<p class="mb-3">
								We are many variations of passages available but the majority have suffered alteration
								in some form by injected humour words believable.
							</p>
							<ul class="footer-contact">
								<li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
								<li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
								<li><a href="https://live.themewild.com/cdn-cgi/l/email-protection#2d44434b426d48554c405d4148034e4240"><i
											class="far fa-envelope"></i><span class="__cf_email__" data-cfemail="a8c1c6cec7e8cdd0c9c5d8c4cd86cbc7c5">[email&#160;protected]</span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Quick Links</h4>
							<ul class="footer-list">
								<li><a href="#"><i class="fas fa-caret-right"></i> About Us</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> FAQ's</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Testimonials</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Terms Of Service</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Privacy policy</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Update News</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Our Campus</h4>
							<ul class="footer-list">
								<li><a href="#"><i class="fas fa-caret-right"></i> Campus Safety</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Student Activities</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Academic Department</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Planning & Administration</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Office Of The Chancellor</a></li>
								<li><a href="#"><i class="fas fa-caret-right"></i> Facility Services</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="footer-widget-box list">
							<h4 class="footer-widget-title">Newsletter</h4>
							<div class="footer-newsletter">
								<p>Subscribe Our Newsletter To Get Latest Update And News</p>
								<div class="subscribe-form">
									<form action="#">
										<input type="email" class="form-control" name="your_email" id="your_email" placeholder="Your Email">
										<button class="theme-btn" type="submit">
											Subscribe Now <i class="far fa-paper-plane"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="copyright-wrapper">
					<div class="row">
						<div class="col-md-6 align-self-center">
							<p class="copyright-text">
								&copy; Copyright <span id="date"></span> <a href="#"> Eduka </a> All Rights Reserved.
							</p>
						</div>
						<div class="col-md-6 align-self-center">
							<ul class="footer-social">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer area end -->




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
