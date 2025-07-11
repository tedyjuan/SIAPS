<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/filepond.css" rel="stylesheet">
<link href="<?= base_url('public/admin/') ?>assets/vendor/filepond/image-preview.min.css" rel="stylesheet">
<link href="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.css" rel="stylesheet">
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
					<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $url_edit; ?>')">
						<i class="fa-solid fa-refresh"></i>
						Refresh
					</a>
				</div>
			</div>
			<div class="card-body">
				<form name="forms_edit" id="forms_edit" method="POST" data-parsley-validate="" enctype="multipart/form-data">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="row blog-section">
							<div class="col-md-6 col-lg-6 col-xxl-6">
								<label class="form-label " for="gambar">Gambar Lama </label>
								<div class="card blog-card overflow-hidden">
									<a class="glightbox img-hover-zoom" data-glightbox="type: image; zoomable: true;" href="<?= base_url('uploads/blog/' . $grid->szNameFile); ?>">
										<img alt="..." class="card-img-top" src="<?= base_url('uploads/blog/' . $grid->szNameFile); ?>">
									</a>
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-xxl-6">
								<div class="mb-3">
									<label class="form-label " for="gambar">Gambar foto Baru <small class="text-danger text-sm">* 1920 x 1280 / 5MB</small> </label>
									<div class="row file-uploader-box">
										<input class="filepond-file" type="file" id="gambar" name="gambar">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="judul_blog">Judul Blog</label>
									<input type="text" value="<?= $grid->szTitle; ?>" class="form-control" id="judul_blog" name="judul_blog" placeholder="Input nama kegiatan" data-parsley-required="true" data-parsley-errors-container=".err_name">
									<span class="text-danger err_name"></span>
								</div>
								<div class="mb-3">
									<label class="form-label " for="kategori_blog">Kategori Blog</label>
									<select name="kategori_blog" id="kategori_blog" class="form-control select2" data-parsley-required="true" data-parsley-errors-container=".err_kat_blog">
										<option value="">-- Pilih --</option>
										<?php foreach ($kategori as $kat) : ?>
											<option value="<?= $kat->szCode; ?>" <?= $grid->szKategoryId == $kat->szCode ? 'selected' : ''; ?>><?= $kat->szName; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger err_kat_blog"></span>
								</div>
							</div>
							<div class="col-md-6 col-xl-6 col-6">
								<div class="row">
									<label class="form-label mt-3" for="nama_role">Status Blogs</label>
									<div class="row">
										<div class="col-md-6 col-xl-4">
											<div class="check-container">
												<label class="check-box">
													<input name="radio_group" type="radio" value="DRAFT"
														<?= ($grid->szStatus === 'DRAFT') ? 'checked' : ''; ?>>
													<span class="radiomark light-danger ms-2"></span>
													<span class="text-danger">DRAFT</span>
												</label>
											</div>
										</div>
										<div class="col-md-6 col-xl-4">
											<div class="check-container">
												<label class="check-box">
													<input name="radio_group" type="radio" value="PUBLISH"
														<?= ($grid->szStatus === 'PUBLISH') ? 'checked' : ''; ?>>
													<span class="radiomark outline-success ms-2"></span>
													<span class="text-success">PUBLISH</span>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label " for="desc_text">Konten</label>
							<textarea class="form-control editor" name="editor" id="editor" data-parsley-required="true" data-parsley-errors-container=".err_des"><?= $grid->szContent; ?></textarea>
							<span class="text-danger err_des"></span>
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
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/file-encode.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/validate-size.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/validate-type.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/exif-orientation.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/image-preview.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/vendor/filepond/filepond.min.js"></script>
<script src="<?= base_url('public/admin/') ?>assets/js/file_upload.js"></script>

<!-- Glight js -->
<script src="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.js"></script>
<script src="<?= base_url('public/admin/'); ?>assets/js/blog.js"></script>
<script>
	$('#btnsubmit').click(function() {
		var form = $("#forms_edit");
		form.parsley().validate();

		if (form.parsley().isValid()) {
			var formData = new FormData(form[0]);
			var uuid = '<?= $uuid; ?>'; // ambil dari PHP
			formData.append('uuid', uuid); // append UUID ke FormData
			// Ambil file dari FilePond instance
			var files = FilePond.find(document.querySelector('#gambar')).getFiles();
			var panjang = files.length;
			if (panjang != 0) {
				// Tambahkan file manual dari FilePond
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
					showLoader(); // tampilkan loading
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

					// Optional: hancurkan editor jika perlu reload konten
					$('.editor').trumbowyg('destroy');
					$('#trumbowyg-icons').remove();
					loadform('admin/cms/C_blog');
				}
			});
		}
	});
	$('.select2').select2({
		placeholder: 'Pilih',
	});
	$('.editor').trumbowyg('destroy');
	$('#trumbowyg-icons').remove();
	$('.editor').trumbowyg({
		autogrow: true
	});
</script>
</script>
