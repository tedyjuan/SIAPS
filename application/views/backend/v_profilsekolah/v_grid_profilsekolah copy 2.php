<div class="row">
	<div class="col-12">
		<div class="card ">
			<div class="card-header  d-flex justify-content-between">
				<div class="col-md-6">
					<h5><?= $judul; ?></h5>
				</div>
				<?php if ($akses == 'ON') { ?>
					<div class="col-md-6 text-end">
						<a href="javascript:void(0)" onclick="loadform('<?= $url_tambah; ?>')" class="btn btn-primary ">
							<i class="fa-solid fa-plus"></i>
							Tambah
						</a>
						<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $load_grid; ?>')">
							<i class="fa-solid fa-refresh"></i>
							Refresh
						</a>
					</div>
				<?php } ?>
			</div>
			<div class="card-body p-0">
				<div class="app-datatable-default overflow-auto">
					<?= add_csrf() ?>
					<table class="display app-data-table default-data-table" id="mytable">
						<thead>
							<tr>
								<th>Nama Sekolah</th>
								<th>Telpon Sekolah</th>
								<th>Email </th>
								<th>Alamat </th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($grid as $row) : ?>
								<tr>
									<td><?= $row->szNameSchool; ?></td>
									<td><?= $row->szPhone; ?></td>
									<td><?= $row->szEmail; ?></td>
									<td><?= $row->szAddress; ?></td>
									<td class="text-center">
										<button type="button" class="btn btn-light-success icon-btn b-r-4" onclick="loadform('admin/master/C_profil_sekolah/edit/<?= $row->uuid; ?>', '')">
											<i class="ti ti-edit text-success"></i>
										</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#mytable').DataTable({
			"order": []
		});
	});
</script>
