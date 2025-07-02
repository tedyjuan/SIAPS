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
								<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
								<ul class="dropdown-menu fade-down">
									<li><a class="dropdown-item" href="sambutan.html">Sambutan kepala sekolah</a></li>
									<li><a class="dropdown-item" href="visi-misi.html">Visi Dan Misi</a></li>
									<li><a class="dropdown-item" href="bstruktur.html">Struktur Organisasi</a></li>
									<li><a class="dropdown-item" href="sejarah.html">Sejarah Singkat</a></li>
								</ul>
							</li>
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
														<li><a class="dropdown-item" href="academic-single.html">Denah </a></li>
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
