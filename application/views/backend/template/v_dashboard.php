<!DOCTYPE html>
<html lang="en">

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="la-themes" name="author">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
	<title>Blank | ki-admin - Premium Admin Template</title>
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
	<link href="<?= base_url('public/admin/'); ?>assets/fonts/rubik/rubik.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/animation/animate.min.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/flag-icons-master/flag-icon.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/simplebar/simplebar.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/ionio-icon/css/iconoir.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/datatable/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/select/select2.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/') ?>assets/vendor/trumbowyg/trumbowyg.min.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/datepikar/flatpickr.min.css" rel="stylesheet" type="text/css">

	<style>
		.icon-md {
			font-size: 20px;
		}
	</style>
</head>

<body>
	<script src="<?= base_url('public/admin/'); ?>assets/js/jquery-3.6.3.min.js"></script>
	<div class="app-wrapper">
		<div class="loader-wrapper" id="preloader">
			<div class="loader_24"></div>
		</div>
		<nav>
			<div class="app-logo">
				<a class="logo d-inline-block" href="index.html">
					<img alt="#" src="<?= base_url('public/admin/'); ?>assets/images/logo/1.png">
				</a>
				<span class="bg-light-primary toggle-semi-nav d-flex-center">
					<i class="ti ti-chevron-right"></i>
				</span>
				<div class="d-flex align-items-center nav-profile p-3">
					<span class="h-45 w-45 d-flex-center b-r-10 position-relative bg-danger m-auto">
						<img alt="avatar" class="img-fluid b-r-10" src="<?= base_url('public/admin/'); ?>assets/images/avatar/woman.jpg">
						<span class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
					</span>
					<div class="flex-grow-1 ps-2">
						<h6 class="text-primary mb-0"><?= strtoupper($this->session->userdata('name')); ?></h6>
						<p class="text-muted f-s-12 mb-0"><?= $this->session->userdata('email'); ?></p>
					</div>
					<div class="dropdown profile-menu-dropdown">
						<a aria-expanded="false" data-bs-auto-close="true" data-bs-placement="top" data-bs-toggle="dropdown"
							role="button">
							<i class="ti ti-settings fs-5"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-item">
								<a class="f-w-500" href="profile.html">
									<i class="ph-duotone  ph-user-circle pe-1 f-s-20"></i> Profile Details
								</a>
							</li>
							<li class="dropdown-item">
								<a class="f-w-500" href="setting.html">
									<i class="ph-duotone  ph-gear pe-1 f-s-20"></i> Settings
								</a>
							</li>
							<li class="app-divider-v dotted py-1"></li>
							<li class="dropdown-item">
								<a class="mb-0 text-danger" href="<?= base_url('Login/logout'); ?>">
									<i class="ph-duotone  ph-sign-out pe-1 f-s-20"></i> Log Out
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php $role = $this->session->userdata('role');
			$role_protected = ['ROLE-00001', 'ROLE-00002', 'ROLE-00003', 'ROLE-00004', 'ROLE-00005'];
			switch ($role) {
				case 'ROLE-00001': //SUPERADMIN
					$this->load->view('backend/template/v_navbar_superadmin');
					break;
				case 'ROLE-00002': // ADMIN
					$this->load->view('backend/template/v_navbar_superadmin');
					break;
				case 'ROLE-00003': // SISWA
					$this->load->view('backend/template/v_navbar_siswa');
					break;
				case 'ROLE-00004': // WALI
					$this->load->view('backend/template/v_navbar_wali');
					break;
				case 'ROLE-00005': // admin
					$this->load->view('backend/template/v_navbar_guru');
					break;
				default:
					$this->load->view('backend/template/v_navbar_null');
					break;
			} ?>

			<div class="menu-navs">
				<span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
				<span class="menu-next"><i class="ti ti-chevron-right"></i></span>
			</div>
		</nav>
		<!-- Menu Navigation ends -->
		<div class="app-content" style="box-shadow: none">
			<div class="">
				<!-- Header Section starts -->
				<header class="header-main">
					<div class="container-fluid">
						<div class="row">
							<div class="col-8 col-sm-6 d-flex align-items-center header-left p-0">
								<span class="header-toggle ">
									<i class="ph ph-squares-four"></i>
								</span>
								<div class="header-searchbar w-100">
									<form action="#" class="mx-sm-3 app-form app-icon-form ">
										<div class="position-relative">
											<input aria-label="Search" name="search_nav" id="search_nav" class="form-control" placeholder="Search..."
												type="text">
											<i class="ti ti-search text-dark"></i>
										</div>
									</form>
								</div>
							</div>
							<div class="col-4 col-sm-6 d-flex align-items-center justify-content-end header-right p-0">
								<ul class="d-flex align-items-center">
									<li class="header-dark">
										<div class="sun-logo head-icon bg-light-dark rounded-circle f-s-22 p-2">
											<i class="ph ph-moon-stars"></i>
										</div>
										<div class="moon-logo head-icon bg-light-dark rounded-circle f-s-22 p-2">
											<i class="ph ph-sun-dim"></i>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</header>
				<!-- Header Section ends -->
				<!-- Body main section starts -->
				<main>
					<div id="contentdata"></div>

				</main>
				<div class="go-top">
					<span class="progress-value">
						<i class="ti ti-arrow-up"></i>
					</span>
				</div>
				<footer>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-9 col-12">
								<p class="footer-text f-w-600 mb-0">Teddy Juanda © <?= date("Y"); ?> 💖
									V1.0.0</p>
							</div>
							<div class="col-md-3">
								<div class="footer-text text-end">
									<a class="f-w-500 text-primary" href="#"> Need Help <i
											class="ti ti-help"></i></a>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<!-- Footer Section ends-->
			</div>
		</div>
	</div>
	<div id="customizer"></div>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/simplebar/simplebar.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/phosphor/phosphor.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/js/script.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/js/customizer.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/custom/loadpages.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/parsleyjs/parsley.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/parsleyjs/id.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/sweetalert/sweetalert.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/select/select2.min.js"></script>
	<script src="<?= base_url('public/admin/') ?>assets/vendor/trumbowyg/trumbowyg.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/datepikar/flatpickr.js"></script>


	<script>
		const BASE_URL = "<?= base_url(); ?>";
		<?php if (isset($url_hapus) && !empty($url_hapus)): ?>
			var URL_HAPUS = "<?= $url_hapus; ?>";
		<?php endif; ?>
		$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
			if (jqxhr.status === 401) {
				try {
					let json = JSON.parse(jqxhr.responseText);
					if (json.session_expired) {
						// alert(json.message);
						swet_gagal(json.message);
						setTimeout(function() {
							window.location.href = json.redirect;
						}, 2000); // 2000 ms = 2 detik delay
					}
				} catch (e) {
					console.error("Response bukan JSON:", e);
				}
			}
		});
		$('.editor').trumbowyg('destroy');
		$('#trumbowyg-icons').remove();
	</script>
</body>

</html>
