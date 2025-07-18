<!-- filepond css -->
<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/filepond.css" rel="stylesheet">
<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/image-preview.min.css" rel="stylesheet">
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
					<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $url_tambah; ?>')">
						<i class="fa-solid fa-refresh"></i>
						Refresh
					</a>
				</div>
			</div>
			<div class="card-body">
				<form name="forms_add" id="forms_add" method="POST" data-parsley-validate="" enctype="multipart/form-data">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="mb-3">
							<label class="form-label " for="nama_slider">Nama Slider</label>
							<input type="text" class="form-control" id="nama_slider" name="nama_slider" placeholder="Input nama slider" data-parsley-required="true" data-parsley-errors-container=".err_name">
							<span class="text-danger err_name"></span>
						</div>
						<div class="mb-3">
							<label class="form-label " for="slider_warna">Slider highlight</label>
							<input type="text" class="form-control" id="slider_warna" name="slider_warna" placeholder="Input Slider highlight" data-parsley-required="true" data-parsley-errors-container=".err_slider2">
							<span class="text-danger err_slider2"></span>
						</div>
						<div class="mb-3">
							<label class="form-label " for="long_text">Long Text Slider</label>
							<input type="text" class="form-control" id="long_text" name="long_text" placeholder="Long Text Slider" data-parsley-required="true" data-parsley-errors-container=".err_longtext">
							<span class="text-danger err_longtext"></span>
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
<script>
	$('#btnsubmit').click(function() {
		var form = $("#forms_add");
		form.parsley().validate();

		// Ambil file dari FilePond instance
		var files = FilePond.find(document.querySelector('#gambar')).getFiles();

		if (files.length === 0) {
			swet_gagal('Foto tidak boleh kosong');
			return;
		}

		if (form.parsley().isValid()) {
			var formData = new FormData(form[0]);
			// Tambahkan file manual dari FilePond
			formData.append('gambar', files[0].file);
			$.ajax({
				url: '<?= $url_insert; ?>',
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
