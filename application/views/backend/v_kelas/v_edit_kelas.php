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
						<input name="nama_old" type="hidden" value="<?= $grid->szName; ?>" readonly>
						<input name="uuid" type="hidden" value="<?= $grid->uuid; ?>" readonly>
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label" for="kode">Kode</label>
									<input class="form-control" id="kode" name="kode" type="text" value="<?= $grid->szCode; ?>" readonly>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="thn_ajaran">Tahun Ajaran</label>
									<input type="text" class="form-control" id="thn_ajaran" name="thn_ajaran" value="<?= $grid->szSchoolYear; ?>" data-parsley-required="true" data-parsley-errors-container=".err_thn_ajaran">
									<span class="text-danger err_thn_ajaran"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="tingkatan_kls">Tingkatan Kelas</label>
									<select style="width: 100%;" class="form-control select2" onchange="updatevalue()" name="tingkatan_kls" id="tingkatan_kls" data-parsley-required="true" data-parsley-errors-container=".err_tingkatan_kls">
										<option value="">Pilih</option>
										<?php foreach ($grid_tingkatan as $row) : ?>
											<option value="<?= $row->szCode; ?>" <?= $grid->szTingkatanKelasId  == $row->szCode ? 'selected' : '' ?> data-post="<?= $row->szAbbreviation ?>"> <?= $row->szAbbreviation . ' - ' . $row->szName; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger err_tingkatan_kls"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="jurusan">Jurusan</label>
									<select style="width: 100%;" class="form-control select2" onchange="updatevalue()" name="jurusan" id="jurusan" data-parsley-required="true" data-parsley-errors-container=".err_jurusan">
										<option value="">pilih</option>
										<?php foreach ($grid_jurusan as $row) : ?>
											<option value="<?= $row->szCode; ?>" <?= $grid->szJurusanId == $row->szCode ? 'selected' : '' ?> data-post="<?= $row->szAbbreviation ?>"> <?= $row->szAbbreviation . ' - ' . $row->szName; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger err_jurusan"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label class="form-label " for="nama_kls">No Kelas</label>
									<input type="number" class="form-control" id="nama_kls" value="<?= $grid->szNumber; ?>" name="nama_kls" min="1" placeholder="Input nama kelas" data-parsley-required="true" data-parsley-errors-container=".err_kelas">
									<span class="text-danger err_kelas"></span>
								</div>
								<div class="mb-3">
									<label class="form-label " for="nama_output">Nama Kelas</label>
									<input type="text" class="form-control" id="nama_output" value="<?= $grid->szName; ?>" name="nama_output" placeholder="Input nama kelas" readonly>
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
					loadform('admin/master/C_kelas');
				}
			});
		}

	});
	$('#nama_kls').on('keyup', function() {
		$("#nama_output").val('');
		let value = $(this).val().replace(/[^0-9]/g, '');
		if (value != '') {
			var jurusan = $('#jurusan option:selected').data('post');
			var tingkatan_kls = $('#tingkatan_kls option:selected').data('post');
			var concate = tingkatan_kls + "-" + jurusan + "-" + value;
			$("#nama_output").val(concate);
		}
	});

	function updatevalue() {
		$("#nama_output").val('');
		var value = $("#nama_kls").val();
		if (value != '') {
			var jurusan = $('#jurusan option:selected').data('post');
			var tingkatan_kls = $('#tingkatan_kls option:selected').data('post');
			var concate = tingkatan_kls + "-" + jurusan + "-" + value;
			$("#nama_output").val(concate);
		}
	}
	$('.select2').select2({
		placeholder: 'Pilih',
	});
</script>
