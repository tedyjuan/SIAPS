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
				<form name="forms_edit" id="forms_edit" method="POST" data-parsley-validate="">
					<?= add_csrf() ?>
					<input name="uuid" type="hidden" value="<?= $grid->uuid; ?>" readonly>
					<div class="app-form">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 ">
								<div class="mb-3">
									<label class="form-label" for="kode">Nama Sekolah</label>
									<input class="form-control" id="nm_sekolah" name="nm_sekolah" type="text" value="<?= $grid->szNameSchool; ?>" data-parsley-required="true" data-parsley-errors-container=".err_nm_sekolah">
									<span class="text-danger err_nm_sekolah"></span>
								</div>
								<div class="mb-3">
									<label class="form-label" for="kota">Kota</label>
									<input class="form-control" id="kota" name="kota" type="text" value="<?= $grid->szCity; ?>" data-parsley-required="true" data-parsley-errors-container=".err_kota">
									<span class="text-danger err_kota"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 ">
								<div class="mb-3">
									<label class="form-label" for="telpon_sekolah">Telphon sekolah</label>
									<input type="text" class="form-control" id="telpon_sekolah" name="telpon_sekolah" value="<?= $grid->szPhone; ?>" data-parsley-required="true" data-parsley-errors-container=".telpon_sekolah">
									<span class="text-danger telpon_sekolah"></span>
								</div>

								<div class="mb-3">
									<label class="form-label" for="email_sekolah">Email</label>
									<input type="email" class="form-control" id="email_sekolah" name="email_sekolah" value="<?= $grid->szEmail; ?>" data-parsley-required="true" data-parsley-errors-container=".email_sekolah">
									<span class="text-danger email_sekolah"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="mb-3">
									<label class="form-label" for="alamat_sekolah">Alamat</label>
									<textarea class="form-control" id="alamat_sekolah" name="alamat_sekolah" data-parsley-required="true" data-parsley-errors-container=".alamat_sekolah"><?= $grid->szAddress; ?></textarea>
									<span class="text-danger alamat_sekolah"></span>
								</div>
							</div>
						</div>

						<div>
							<button type="button" id="btnsubmit" class="btn btn-primary"> <i class="fa-solid fa-paper-plane fa-fw"></i> Change to Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$('#btnsubmit').click(function() {
		var form = $("#forms_edit");
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
