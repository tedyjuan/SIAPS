<!DOCTYPE html>
<html lang="en">

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">

	<title>Lock Screen | ki-admin - Premium Admin Template</title>
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('public/admin/'); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

</head>

<body class="sign-in-bg">
	<div class="loader-wrapper" id="preloading">
		<div class="loader_24"></div>
	</div>
	<div class="app-wrapper d-block">
		<div class="main-container">
			<div class="container">
				<div class="row main-content-box">
					<div class="col-lg-7 image-contentbox d-none d-lg-block">
						<div class="form-container">

							<div class="signup-bg-img">
								<img alt="avatar" class="img-fluid" src="<?= base_url('public/admin/'); ?>assets/images/login/06.png">
							</div>
						</div>
					</div>
					<div class="col-lg-5 form-content-box" id="pages_send_email">
						<div class="form-container">
							<form class="app-form" name="form_forgrt" id="form_forgrt" method="post" data-parsley-validate="">
								<?= add_csrf() ?>
								<div class="row">
									<div class="col-12">
										<div class="mb-5 text-center text-lg-start">
											<h2 class="text-white f-w-600">Halaman <span class="text-warning">Lupa Password</span></h2>
											<p>Kami akan kirim email ke akun email kamu</p>
										</div>
									</div>

									<div class="col-12">
										<div class="form-floating mb-3">
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
											<label class="form-label" for="email">Email</label>
											<span class="text-warning" id="err_email"></span>
										</div>
									</div>
									<div class="col-6">
										<?= $captcha_image ?><br>
									</div>
									<div class="col-6">
										<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Input Captcha" required>
										<span class="text-warning" id="err_captcha"></span>
										<br>
									</div>
									<div class="col-12">
										<p>
											Kembali kehalaman <a class="link-white text-decoration-underline " href="<?= base_url('Login'); ?>"> Login!</a>
										</p>
									</div>
									<div class="col-12 mt-3">
										<button type="button" class="btn btn-warning btn-lg w-100 text-white" id="btn_reset_pass" onclick="resetnapp()">Reset Password</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>

		</div>
	</div>

	<script src="<?= base_url('public/admin/'); ?>assets/js/jquery-3.6.3.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/sweetalert/sweetalert.js"></script>

	<script>
		$(document).ready(function() {
			$('#preloading').hide();
		})

		function resetnapp() {
			$("#err_email").html('');
			$("#err_captcha").html('');
			$("#btn_reset_pass").removeClass("btn-warning").addClass("btn-primary");
			var formData = $("form[name=form_forgrt]");
			$.ajax({
				url: "<?= base_url('reset-password'); ?>",
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
							title: 'Success',
							html: data.pesan,
							showConfirmButton: false,
							timer: 1000
						});
						window.location.href = data.redirect_to;
					} else {
						$("#btn_login").removeClass("btn-primary").addClass("btn-warning");
						if (data.param == "validasi") {
							$("#err_email").html(data.err_email);
							$("#err_captcha").html(data.err_captcha);
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Informasi',
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
