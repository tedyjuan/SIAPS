<div class="row">
	<div class="col-12">
		<div class="card ">
			<div class="card-header  d-flex justify-content-between">
				<div class="col-md-6">
					<h5><?= $judul; ?></h5>
				</div>
				<div class="col-md-6 text-end">
					<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $load_grid; ?>')">
						<i class="fa-solid fa-refresh"></i>
						Refresh
					</a>
				</div>
			</div>
			<div class="card-body">
				<form name="forms_edit" id="forms_edit" method="POST" data-parsley-validate="" enctype="multipart/form-data">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="row">
							<div class="mb-3">
								<label class="form-label " for="judul_blog">Visi</label>
								<textarea class="form-control editor" name="visi" id="visi" data-parsley-required="true" data-parsley-errors-container=".err_visi"><?= $grid->szVisi; ?></textarea>
								<span class="text-danger err_visi"></span>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label " for="desc_text">Misi</label>
							<textarea class="form-control editor" name="misi" id="misi" data-parsley-required="true" data-parsley-errors-container=".err_misi"><?= $grid->szMisi; ?></textarea>
							<span class="text-danger err_misi"></span>
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
<script>
	$('.editor').trumbowyg('destroy');
	$('#trumbowyg-icons').remove();
	$('.editor').trumbowyg({
		autogrow: true
	});
	$('#btnsubmit').click(function() {
		var form = $("#forms_edit");
		var uuid = "<?= $grid->uuid; ?>";

		// Validasi form dengan Parsley
		form.parsley().validate();

		if (form.parsley().isValid()) {
			// Buat FormData dari form
			var formData = new FormData(form[0]);
			formData.append('uuid', uuid); // Tambahkan UUID ke formData

			$.ajax({
				url: '<?= $url_update; ?>',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false, // Penting untuk FormData
				contentType: false, // Penting untuk FormData
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {
					if (data.hasil === 'true') {
						swet_sukses(data.pesan);
					} else {
						swet_gagal(data.pesan);
					}

					// Reload form setelah submit berhasil/gagal
					loadform('admin/master/C_visi_misi');
				}
			});
		}
	});
</script>
