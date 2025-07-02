<div class="container-fluid">
	<!-- Breadcrumb start -->
	<div class="row m-1">
		<div class="col-12 ">
			<h4 class="main-title">Setting</h4>
			<ul class="app-line-breadcrumbs mb-3">
				<li class="">
					<a class="f-s-14 f-w-500" href="#">
						<span>
							<i class="ph-duotone  ph-stack f-s-16 "></i> Master
						</span>
					</a>
				</li>
				<li class="active">
					<a class="f-s-14 f-w-500" href="javascript:;" onclick="loadform('<?= $load_grid; ?>')">Master Profil Sekolah</a>
				</li>

			</ul>
		</div>
	</div>
	<!-- Breadcrumb end -->

	<!-- setting-app start -->
	<div class="row">
		<div class="col-lg-4 col-xxl-3">
			<div class="card">
				<div class="card-header">
					<h5>Settings</h5>
				</div>
				<div class="card-body">
					<div class="vertical-tab setting-tab">
						<ul class="nav nav-tabs app-tabs-primary " id="v-bg" role="tablist">
							<li class="nav-item" role="presentation">
								<button aria-controls="profile-tab-pane" aria-selected="true"
									class="nav-link active" data-bs-target="#profile-tab-pane"
									data-bs-toggle="tab" id="profile-tab" role="tab"
									type="button"><i
										class="ph-bold  ph-user-circle-gear pe-2"></i>
									Profile Sekolah
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button aria-controls="notification-tab-pane" aria-selected="false"
									class="nav-link"
									data-bs-target="#notification-tab-pane" data-bs-toggle="tab"
									id="notification-tab"
									role="tab" type="button"><i
										class="ph-bold  ph-notification pe-2"></i>Slider Images
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button aria-controls="Connection-tab-pane" aria-selected="false"
									class="nav-link"
									data-bs-target="#Connection-tab-pane" data-bs-toggle="tab"
									id="Connection-tab"
									role="tab" type="button"><i
										class="ph-bold  ph-graph pe-2"></i>Connection
								</button>
							</li>
						</ul>
					</div>

				</div>
			</div>

		</div>

		<div class="col-lg-8 col-xxl-9">
			<div class="tab-content">
				<div aria-labelledby="profile-tab" class="tab-pane fade active show"
					id="profile-tab-pane"
					role="tabpanel" tabindex="0">
					<div class="card setting-profile-tab">
						<div class="card-header">
							<h5>Identitas Sekolah</h5>
						</div>
						<div class="card-body">
							<div class="profile-tab profile-container">
								<form class="app-form" id="form_profil" name="form_profil" method="post">
									<?= add_csrf() ?>
									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label class="form-label">Nama Sekolah</label>
												<input class="form-control" id="nm_sekolah" name="nm_sekolah" value="<?= $grid->szNameSchool; ?>" type="text">
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input class="form-control" id="email_sekolah" name="email_sekolah" value="<?= $grid->szEmail; ?>" type="email">
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<label class="form-label">Alamat</label>
												<textarea class="form-control" id="alamat_sekolah" name="alamat_sekolah"><?= $grid->szAddress; ?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label">Kota</label>
												<input class="form-control" id="kota" name="kota" type="text" value="<?= $grid->szCity; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label">Telpon Sekolah</label>
												<input class="form-control" id="kota" name="kota" type="text" value="<?= $grid->szPhone; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label">Profinsi</label>
												<input class="form-control" id="profinsi_sekolah" name="profinsi_sekolah" value="<?= $grid->szCity; ?>" type="text">
											</div>
										</div>


										<div class="col-12">
											<div class="text-end">
												<button class="btn btn-primary" type="button" id="btn_profil"><i class="fa-solid fa-paper-plane fa-fw"></i> Change To Update</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div aria-labelledby="notification-tab" class="tab-pane fade" id="notification-tab-pane"
					role="tabpanel" tabindex="0">

					<div class="card ">
						<div class="card-header">
							<h5>Slider Images</h5>
						</div>
						<div class="card-body">
							<div class="notification-content">
								<div class="col-12">
									<ul class="notified-contet share-menu-list">

										<li>
											<div class="share-menu-item mb-4">
												<span
													class="share-menu-img text-outline-primary h-45 w-45 d-flex-center b-r-10">
													<i
														class="ph-bold  ph-device-mobile-speaker f-s-30"></i>
												</span>
												<div class="share-menu-content">
													<h6 class="mb-0 txt-ellipsis-1">Mobile push
														notification</h6>
													<p class="mb-0 txt-ellipsis-1 text-secondary">
														Receive the all
														notifications via your mobile app</p>
												</div>
												<div class="form-check form-switch d-flex mt-1">

													<input checked
														class="form-check-input  form-check-primary ms-3 fs-3 me-3"
														id="basic-switch-6" type="checkbox">
													<label class="form-check-label pt-2"
														for="basic-switch-6"></label>
												</div>
											</div>


										</li>
										<li>
											<div class="share-menu-item mb-4">
												<span
													class="share-menu-img text-outline-success h-45 w-45 d-flex-center b-r-10">
													<i class="ph-bold  ph-desktop f-s-30"></i>
												</span>
												<div class="share-menu-content">
													<h6 class="mb-0 txt-ellipsis-1">desktop push
														notification</h6>
													<p class="mb-0 txt-ellipsis-1 text-secondary">
														Receive the all
														notifications via your desktop app</p>
												</div>
												<div class="form-check form-switch d-flex mt-1">

													<input checked
														class="form-check-input  form-check-primary ms-3 fs-3 me-3"
														id="basic-switch-4" type="checkbox">
													<label class="form-check-label pt-2"
														for="basic-switch-4"></label>
												</div>
											</div>


										</li>
										<li>
											<div class="share-menu-item mb-4">
												<span
													class="share-menu-img text-outline-danger h-45 w-45 d-flex-center b-r-10">
													<i class="ph-bold  ph-watch f-s-30"></i>
												</span>
												<div class="share-menu-content">
													<h6 class="mb-0 txt-ellipsis-1">Smartwatch push
														notification
													</h6>
													<p class="mb-0  txt-ellipsis-1 text-secondary">
														Receive the all
														notifications via your smartwatch app</p>
												</div>
												<div class="form-check form-switch d-flex mt-1">

													<input checked
														class="form-check-input  form-check-primary ms-3 fs-3 me-3"
														id="basic-switch-5" type="checkbox">
													<label class="form-check-label pt-2"
														for="basic-switch-5"></label>
												</div>
											</div>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div aria-labelledby="Connection-tab" class="tab-pane fade" id="Connection-tab-pane"
					role="tabpanel" tabindex="0">
					<div class="row">
						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/geethub.png">
											</span>
											<h5 class="ms-5 mt-1">GitHub</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-7" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-7"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">https://github.com/tedyjuan</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>


						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/google.png">
											</span>
											<h5 class="ms-5 mt-1">Google</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-9" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-9"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">The core mission of Google
										is to organize the world's information.</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>


						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/drive.png">
											</span>
											<h5 class="ms-5 mt-1">Drive</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-11" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-11"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">Google Drive is a
										comprehensive file storage and service.</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/drop-box.png">
											</span>
											<h5 class="ms-5 mt-1">Drop Box</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-12" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-12"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">The service is designed to
										safeguard files malfunctions</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/facebook.png">
											</span>
											<h5 class="ms-5 mt-1">Facebook</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-13" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-13"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">Facebook's journey from a
										university network to a global social media.</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/instagram.png">
											</span>
											<h5 class="ms-5 mt-1">Instagram</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-14" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-14"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">Instagram's mission is to
										bring people closer to the things and people.</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/twitter.png">
											</span>
											<h5 class="ms-5 mt-1">Twitter</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary  fs-3"
												id="basic-switch-15" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-15"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4">Twitter, now known as X,
										is a social media different platform</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>



						<div class="col-md-6 col-xxl-4">
							<div class="card conection-setting">
								<div class="card-body">
									<div class="conection-item">
										<div class="position-relative">
											<span class="position-absolute">
												<img alt=""
													class="w-35 h-35"
													src="<?= base_url('public/admin/'); ?>assets/images/setting-app/linkdin.png">
											</span>
											<h5 class="ms-5 mt-1">Linkedin</h5>
										</div>
										<div class="form-check form-switch d-flex mt-1">

											<input checked=""
												class="form-check-input  form-check-primary fs-3"
												id="basic-switch-17" type="checkbox">
											<label class="form-check-label pt-2"
												for="basic-switch-17"></label>
										</div>
									</div>

									<p class="text-secondary f-s-16 mt-4"> LinkedIn boasts over 1
										billion registered members globally.</p>
								</div>
								<div class="card-footer text-end text-d-underline link-primary">
									<a href="#">Update</a>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>
	<!--setting app end -->
</div>
<script>
	$('#btn_profil').click(function() {
		var form = $("#form_profil");
		form.parsley().validate();
		if (form.parsley().isValid()) {
			$.ajax({
				url: '<?= $url_update; ?>',
				type: 'POST',
				method: 'POST',
				dataType: 'JSON',
				data: form.serialize(),
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {
					if (data.hasil == 'true') {
						swet_sukses(data.pesan);
						loadform('<?= $load_grid; ?>');
					} else {
						if (data.param == 'validasi') {
							$(".email_sekolah").html(data.email_sekolah);
						} else {
							swet_gagal(data.pesan);
							$(".email_sekolah").html('');
						}
					}
				}
			});
		}

	});
</script>
