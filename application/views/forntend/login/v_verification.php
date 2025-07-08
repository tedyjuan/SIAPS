<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from phpstack-1384472-5121645.cloudwaysapps.com/template/html/ki-admin/template/two_step_verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jun 2025 06:11:13 GMT -->

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template"
		name="description">
	<meta content="admin template, ki-admin admin template, dashboard template, flat admin template, responsive admin template, web app"
		name="keywords">
	<meta content="la-themes" name="author">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="icon" type="image/x-icon">
	<link href="<?= base_url('public/admin/'); ?>assets/images/logo/favicon.png" rel="shortcut icon" type="image/x-icon">
	<title>Two Step Verification | ki-admin - Premium Admin Template</title>
	<!--font-awesome-css-->
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/fontawesome/css/all.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/" rel="preconnect">
	<link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap"
		rel="stylesheet">
	<!-- tabler icons-->
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/tabler-icons/tabler-icons.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap css-->
	<link href="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- App css-->
	<link href="<?= base_url('public/admin/'); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<!-- Responsive css-->
	<link href="<?= base_url('public/admin/'); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
</head>

<body class="sign-in-bg">
	<div class="loader-wrapper" id="preloading">
		<div class="loader_24"></div>
	</div>
	<div class="app-wrapper d-block">
		<!-- <div class="app-content"> -->
		<div class="main-container">
			<!-- Body main section starts -->
			<div class="container">
				<!-- Verify OTP start -->
				<div class="sign-in-content-bg">
					<div class="row main-content-box">
						<div class="col-lg-7 image-contentbox d-none d-lg-block">
							<div class="form-container">
								<div class="signup-bg-img">
									<img alt="" class="img-fluid" src="<?= base_url('public/admin/'); ?>assets/images/login/04.png">
								</div>
							</div>
						</div>
						<div class="col-lg-5 form-content-box" id="pages_verify">
							<div class="form-container">
								<form class="app-form" name="form_verify" id="form_verify" method="post">
									<?= add_csrf() ?>
									<div class="row">
										<div class="col-12">
											<div class="mb-5 text-center text-lg-start">
												<h2 class="text-white">Verify <span class="text-warning">OTP</span></h2>
												<p>Masukkan kode 5 digit yang dikirim ke Id email terdaftar</p>
											</div>
										</div>
										<div class="col-12">
											<div class="verification-box justify-content-lg-start mb-3">
												<div>
													<input class="form-control h-60 w-60 text-center" name="otp1" id="one" maxlength="1" oninput="digitValidate(this); tabChange('one');" type="text">
												</div>
												<div>
													<input class="form-control h-60 w-60 text-center" name="otp2" id="two" maxlength="1" oninput="digitValidate(this); tabChange('two');" type="text">
												</div>
												<div>
													<input class="form-control h-60 w-60 text-center" name="otp3" id="three" maxlength="1" oninput="digitValidate(this); tabChange('three');" type="text">
												</div>
												<div>
													<input class="form-control h-60 w-60 text-center" name="otp4" id="four" maxlength="1" oninput="digitValidate(this); tabChange('four');" type="text">
												</div>
												<div>
													<input class="form-control h-60 w-60 text-center" name="otp5" id="five" maxlength="1" oninput="digitValidate(this); tabChange('five');" type="text">
												</div>
											</div>
											<div class="verification-box justify-content-lg-start mb-3">
											</div>
										</div>
										<div class="col-12 mb-3">
											<p>
												Tidak menerima kode<a class="link-white text-decoration-underline" href="<?= base_url('forgot-password'); ?>"> Kirim ulang!</a>
											</p>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<button type="button" class="btn btn-warning btn-lg w-100 text-white" id="btn_verify" onclick="verifikasi()">Verify</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('public/admin/'); ?>assets/js/jquery-3.6.3.min.js"></script>
	<script src="<?= base_url('public/admin/'); ?>assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#preloading').hide();
		})

		function verifikasi() {
			var formData = $("form[name=form_verify]");
			$.ajax({
				url: "<?= base_url('proses-verify'); ?>?token-otp=" + new URLSearchParams(window.location.search).get('token-otp'),
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
						// window.location.href = data.redirect_to;
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Informasi',
							html: data.pesan,
						});
					}
				},
			});
		}
		const digitValidate = (ele) => {
			ele.value = ele.value.replace(/[^0-9]/g, '');
		};
		const tabChange = (val) => {
			const currentInput = document.getElementById(val);
			if (!currentInput) return;
			if (currentInput.value !== '') {
				const nextInput = document.getElementById(getNextId(val));
				if (nextInput) {
					nextInput.focus();
				}
			}
		};
		const getNextId = (currentId) => {
			switch (currentId) {
				case 'one':
					return 'two';
				case 'two':
					return 'three';
				case 'three':
					return 'four';
				case 'four':
					return 'five';
				default:
					return null;
			}
		};
	</script>
</body>

</html>
