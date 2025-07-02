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
				<form name="forms_add" id="forms_add" method="POST" data-parsley-validate="">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label" for="kode">Kode</label>
									<input class="form-control" id="kode" name="kode" type="text" value="<?= $code; ?>" readonly>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="nm_jabatan">Nama Jabatan</label>
									<input type="text" class="form-control" id="nm_jabatan" name="nm_jabatan" placeholder="Input nama jabatan" data-parsley-required="true" data-parsley-errors-container=".err_name">
									<span class="text-danger err_name"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="lvl_jabatan">Level Jabatan</label>
									<select class="form-control" name="lvl_jabatan" id="lvl_jabatan" data-parsley-required="true" data-parsley-errors-container=".err_lvl_jabatan">
										<option value=""> pilih </option>
										<?php for ($i = 1; $i <= 10; $i++) { ?>
											<option value="<?= $i; ?>"> LEVEL <?= $i; ?> </option>
										<?php } ?>
									</select>
									<span class="text-danger err_lvl_jabatan"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="multilvl_jabatan">Multi Level</label>
									<select class="form-control" name="multilvl_jabatan" id="multilvl_jabatan" data-parsley-required="true" data-parsley-errors-container=".err_multilvl_jabatan">
										<option value=""> pilih </option>
										<option value="YES"> Hanya 1 jabatan </option>
										<option value="NO"> Boleh Banyak Jabatan</option>
									</select>
									<span class="text-danger err_multilvl_jabatan"></span>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label " for="desc_text">Deskripsi</label>
							<textarea class="form-control" name="desc_text" id="desc_text" placeholder="Input Deskripsi" data-parsley-required="true" data-parsley-errors-container=".err_desc"></textarea>
							<span class="text-danger err_desc"></span>
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
	$('#btnsubmit').click(function() {
		var form = $("#forms_add");
		form.parsley().validate();
		if (form.parsley().isValid()) {
			$.ajax({
				url: '<?= $url_insert; ?>',
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
					} else {
						if (data.param == 'validasi') {
							$(".err_name").html(data.err_name);
						} else {
							swet_gagal(data.pesan);
							$(".err_name").html('');
						}
					}
					loadform('admin/master/C_jabatan');
				}
			});
		}

	});
</script>
