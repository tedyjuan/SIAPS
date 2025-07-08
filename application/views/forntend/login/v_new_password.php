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
							<form class="app-form" name="form_new_password" id="form_new_password" method="post" data-parsley-validate="">
								<div class="row">
									<div class="col-12">
										<div class="mb-4 text-center text-lg-start">
											<h2 class="text-white f-w-600">Halaman <span class="text-warning">New Password</span></h2>
											<p>Input Password Min 6 Karakter </p>
										</div>
									</div>
									<div class="col-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="new_pass" name="new_pass" placeholder="Enter Your Password" required>
											<label class="form-label" for="new_pass">New Password</label>
											<span class="text-warning" id="err_new_pass"></span>
										</div>
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="conf_pass" name="conf_pass" placeholder="Confirm Your Password" required>
											<label class="form-label" for="conf_pass">Confirm Password</label>
											<span class="text-warning" id="err_con_pass"></span>
										</div>
									</div>
									<div class="col-12 mt-3">
										<button type="button" class="btn btn-warning btn-lg w-100 text-white" id="btn_reset_pass" onclick="new_password()">Update New Password</button>
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

		function new_password() {
			$("#err_new_pass").html('');
			$("#err_con_pass").html('');
			var formData = $("form[name=form_new_password]");
			$.ajax({
				url: "<?= base_url('proses-new-password'); ?>?token-otp=" + new URLSearchParams(window.location.search).get('token-otp'),
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
						setInterval(function() {
							window.location.href = data.redirect_to;
						}, 1500);
					} else {
						if (data.param == "validasi") {
							$("#err_new_pass").html(data.err_new_pass);
							$("#err_con_pass").html(data.err_con_pass);
						} else {
							Swal.fire({
								icon: 'info',
								title: 'Informasi..!',
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
