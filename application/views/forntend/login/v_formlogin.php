<!DOCTYPE html>
<html lang="en">

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="la-themes" name="author">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">

	<title>Sign In | Login</title>
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
	<link href="<?= base_url('public/admin/'); ?>assets/fonts/rubik/rubik.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/phosphor/phosphor-bold.css" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

</head>

<body class="sign-in-bg">
	<div class="loader-wrapper" id="preloading">
		<div class="loader_24"></div>
	</div>
	<div class="app-wrapper d-block">
		<!-- Body main section starts -->
		<div class="container main-container">
			<div class="row main-content-box">
				<div class="col-lg-7 image-content-box d-none d-lg-block">
					<div class="form-container">
						<div class="signup-bg-img">
							<img alt="" class="img-fluid" src="<?= base_url('public/admin/'); ?>assets/images/login/01.png">
						</div>
					</div>
				</div>
				<div class="col-lg-5 form-content-box">
					<div class="form-container ">
						<form class="app-form" name="form_login" method="post">
							<?= add_csrf() ?>
							<div class="row">
								<div class="col-12">
									<div class="mb-5 text-center text-lg-start">
										<h2 class="text-white f-w-600">Welcome To <span class="text-warning">SIAP!</span> </h2>
									</div>
								</div>
								<div class="col-12">
									<span id="err_email" class="text-warning err_email"></span>
									<div class="form-floating mb-3">
										<input type="email" class="form-control" name="myemail" id="myemail" placeholder="Email">
										<label for="myemail">Email</label>
									</div>
								</div>
								<div class="col-12">
									<span id="err_userPassword" class="text-warning err_userPassword"></span>
									<div class="form-floating mb-3">
										<input class="form-control" name="floatingInput" id="floatingInput" placeholder="Password email" type="password">
										<label for="floatingInput">Password</label>
									</div>
									<div class="text-end ">
										<a class="text-white f-w-500 text-decoration-underline " href="<?= base_url('forgot-password'); ?>">Forgot password</a>
									</div>
								</div>
								<div class="col-12 mt-3">
									<button type="button" class="btn btn-warning btn-lg w-100 text-white" id="btn_login" onclick="loginapp()">Sign In </button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('public/admin/'); ?>assets/js/jquery-3.6.3.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/sweetalert/sweetalert.js"></script>
	<?php if ($this->session->flashdata('info')) { ?>
		<script>
			Swal.fire({
				type: 'info',
				title: '<?= $this->session->flashdata('info'); ?>',
			})
		</script>
	<?php } ?>
	<script>
		$(document).ready(function() {
			$('#preloading').hide();
		})

		function loginapp() {
			$("#err_email").html('');
			$("#err_userPassword").html('');
			$("#btn_login").removeClass("btn-warning").addClass("btn-primary");
			var formData = $("form[name=form_login]");
			$.ajax({
				url: "<?= base_url('Login/proseslogin') ?>",
				type: 'POST',
				data: formData.serialize(),
				dataType: "JSON",
				beforeSend: function() {
					$('#preloading').show();
				},
				success: function(data) {
					$('#preloading').hide();
					if (data.hasil == "true") {
						Swal.fire({
							icon: 'success',
							title: 'Login berhasil',
							html: data.pesan,
							showConfirmButton: false,
							timer: 1000
						});
						setInterval(function() {
							window.location.href = data.redirecTO;
						}, 1500);
					} else {
						$("#btn_login").removeClass("btn-primary").addClass("btn-warning");
						if (data.param == "validasi") {
							$("#err_email").html(data.err_email);
							$("#err_userPassword").html(data.err_userPassword);
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Login Ditolak',
								html: data.pesan,
							});
						}
					}
				},
			});
		}
	</script>
</body>

</html>
