<!-- filepond css -->
<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/filepond.css" rel="stylesheet">
<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/image-preview.min.css" rel="stylesheet">
<!-- simplebar css-->

<div class="row">
	<div class="col-12">
		<div class="card ">
			<div class="card-header  d-flex justify-content-between">
				<div class="col-md-6">
					<h5><?= $judul; ?></h5>
				</div>
				<div class="col-md-6 text-end">
					<a href="javascript:void(0)" onclick="loadform('<?= $load_grid; ?>')" class="btn btn-primary ">
						<i class="ph-bold  ph-arrow-bend-double-up-left"></i>
						Kembali
					</a>
					<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $load_edit; ?>')">
						<i class="fa-solid fa-refresh"></i>
						Refresh
					</a>
				</div>
			</div>
			<div class="card-body">
				<form name="forms_edit" id="forms_edit" method="POST" data-parsley-validate="" enctype="multipart/form-data">
					<input name="nama_old" type="hidden" value="<?= $grid->szName; ?>" readonly>
					<input name="uuid" type="hidden" value="<?= $grid->uuid; ?>" readonly>
					<input name="kode" type="hidden" value="<?= $grid->szCode; ?>" readonly>
					<input name="old_image" type="hidden" value="<?= $grid->szNameFile ?>">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="nama_slider">Nama Slider</label>
									<input type="text" class="form-control" id="nama_slider" name="nama_slider" value="<?= $grid->szName ?>" data-parsley-required="true" data-parsley-errors-container=".err_name">
									<span class="text-danger err_name"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="slider_warna">Slider highlight</label>
									<input type="text" class="form-control" id="slider_warna" name="slider_warna" value="<?= $grid->szHighlightTxt ?>" data-parsley-required="true" data-parsley-errors-container=".err_slider2">
									<span class="text-danger err_slider2"></span>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="long_text">Long Text Slider</label>
									<input type="text" class="form-control" id="long_text" name="long_text" value="<?= $grid->szLongTxt ?>" data-parsley-required="true" data-parsley-errors-container=".err_longtext">
									<span class="text-danger err_longtext"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="card">
									<div class="card-body">
										<label class="form-label mt-3" for="nama_role">Status Role Akses</label>
										<div class="row">
											<div class="col-md-6 col-xl-4">
												<div class="check-container">
													<label class="check-box">
														<input name="radio_group" type="radio" value="ACTIVE"
															<?= ($grid->szStatus === 'ACTIVE') ? 'checked' : ''; ?>>
														<span class="radiomark outline-success ms-2"></span>
														<span class="text-success">ACTIVE</span>
													</label>
												</div>
											</div>

											<div class="col-md-6 col-xl-4">
												<div class="check-container">
													<label class="check-box">
														<input name="radio_group" type="radio" value="INACTIVE"
															<?= ($grid->szStatus === 'INACTIVE') ? 'checked' : ''; ?>>
														<span class="radiomark light-danger ms-2"></span>
														<span class="text-danger">IN-ACTIVE</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="col-sm-12 col-lg-12 col-12">
								<label class="form-label ">Gambar Lama</label>
								<div class="imagebox">
									<a style="width: 200px; height: 200px; object-fit: cover;" target="_blank" class="glightbox" href="<?= base_url('uploads/slider/' . $grid->szNameFile) ?>">
										<img alt="image" class="img-fluid" src="<?= base_url('uploads/slider/' . $grid->szNameFile) ?>">
									</a>
									<div class="caption-content">
										<p><?= $grid->szNameFile; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label " for="long_text">Gambar foto <small class="text-danger text-sm">* 1920 x 1280 / 5MB</small> </label>
							<div class="row file-uploader-box">
								<input class="filepond-file" type="file" id="gambar" name="gambar">
							</div>
						</div>
						<div>
							<button type="button" id="btnsubmit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- filepond -->
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/file-encode.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/validate-size.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/validate-type.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/exif-orientation.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/image-preview.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/filepond.min.js"></script>
<!-- js -->
<script src="<?= base_url('public/admin/') ?>assets/js/file_upload.js"></script>


<!-- js -->
<script>
	$('#btnsubmit').click(function() {
		var form = $("#forms_edit");
		var files = FilePond.find(document.querySelector('#gambar')).getFiles();

		form.parsley().validate();

		if (form.parsley().isValid()) {
			var formData = new FormData(form[0]);

			// ✅ Tambahkan file hanya jika ada
			if (files.length > 0) {
				formData.append('gambar', files[0].file);
			}

			$.ajax({
				url: '<?= $url_update; ?>',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				contentType: false,
				processData: false,
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {
					if (data.hasil == 'true') {
						swet_sukses(data.pesan);
					} else {
						if (data.param == 'validasi') {
							$(".err_name").html(data.err_name);
						} else {
							swet_gagal(data.pesan);
							$(".err_name").html('');
						}
					}
					loadform('admin/cms/C_slider');
				}
			});
		}
	});
</script>
