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
				<form name="forms_edit" id="forms_edit" method="POST" data-parsley-validate="">
					<?= add_csrf() ?>
					<div class="app-form">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 mb-3">
								<div class="mb-3">
									<label class="form-label" for="kode">Kode</label>
									<input name="nama_old" type="hidden" value="<?= $grid->szName; ?>" readonly>
									<input name="uuid" type="hidden" value="<?= $grid->uuid; ?>" readonly>
									<input class="form-control" id="kode" name="kode" type="text" value="<?= $grid->szCode; ?>" readonly>
								</div>
								<div class="mb-3">
									<label class="form-label " for="singkatan">Singkatan</label>
									<input type="text" class="form-control" id="singkatan" name="singkatan" value="<?= $grid->szAbbreviation; ?>" data-parsley-required="true" data-parsley-errors-container=".err_name">
									<span class="text-danger err_name"></span>
								</div>
								<div class="mb-3">
									<label class="form-label " for="nama_eskul">Nama Ekstrakurikuler </label>
									<input type="text" class="form-control" id="nama_eskul" name="nama_eskul" value="<?= $grid->szName; ?>" data-parsley-required="true" data-parsley-errors-container=".err_tingkatan">
									<span class="text-danger err_tingkatan"></span>
								</div>
								<div class="mb-3">
									<label class="form-label " for="deskripsi">Deskripsi</label>
									<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Input deskripsi" data-parsley-required="true" data-parsley-errors-container=".err_des"><?= $grid->szDescription; ?></textarea>
									<span class="text-danger err_des"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 mb-3">
								<label class="form-label mt-3" for="nama_role"></label>
								<div class="card">
									<div class="card-header">
										<h5>Status Role Akses</h5>
									</div>
									<div class="card-body">
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
											<div class="col-12">
												<label class="form-label" for="icon">Icon</label>
												<div class="input-group mb-3">
													<input type="text" class="form-control set_icon" placeholder="Pilih icon..." name="icon" id="icon" readonly data-parsley-required="true" data-parsley-errors-container=".err_icon">
													<button class="btn btn-info btn-md" data-bs-target="#exampleModalScrollable" data-bs-toggle="modal" type="button">pilih</button>
												</div>
												<span class="text-danger err_icon"></span>
											</div>
										</div>
									</div>
								</div>
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
<?php $this->load->view('backend/v_eskul/modal_icon'); ?>
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
					} else {
						if (data.param == 'validasi') {
							$(".err_name").html(data.err_name);
						} else {
							swet_gagal(data.pesan);
							$(".err_name").html('');
						}
					}
					loadform('admin/master/C_eskul');
				}
			});
		}

	});
</script>
