 <div class="row">
 	<div class="col-12">
 		<div class="card ">
 			<div class="card-header  d-flex justify-content-between">
 				<div class="col-md-6">
 					<h5><?= $judul; ?></h5>
 				</div>
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
 			</div>
 			<div class="card-body p-0">
 				<div class="app-datatable-default overflow-auto">
 					<?= add_csrf() ?>
 					<table class="display app-data-table default-data-table" id="mytable">
 						<thead>
 							<tr>
 								<th>Kode Jabatan</th>
 								<th>Nama Jabatan</th>
 								<th>Level</th>
 								<th>Multi Level</th>
 								<th>Status</th>
 								<th class="text-center">Action</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $no = 1;
								foreach ($grid as $row) : ?>
 								<tr>
 									<td><?= $row->szCode; ?></td>
 									<td><?= $row->szName; ?></td>
 									<td>LEVEL <?= $row->szLevel; ?></td>
 									<td>
 										<?php if ($row->szMultipleLevel == 'YES') { ?>
 											<span class="badge text-light-success">YA</span>
 										<?php } else { ?>
 											<span class="badge text-light-danger">TIDAK</span>
 										<?php } ?>
 									</td>
 									<td>
 										<?php if ($row->szStatus == 'ACTIVE') { ?>
 											<span class="badge text-light-success">ACTIVE</span>
 										<?php } else { ?>
 											<span class="badge text-light-danger">INACTIVE</span>
 										<?php } ?>
 									</td>
 									<td class="text-center">
										<button type="button" class="btn btn-light-success icon-btn b-r-4" onclick="loadform('admin/master/C_jabatan/edit/<?= $row->uuid; ?>')">
											<i class="ti ti-edit text-success"></i>
										</button>
										<button type="button" onclick="hapus('<?= $row->uuid; ?>', '<?= $url_hapus; ?>', '<?= $load_grid; ?>' )" class="btn btn-light-danger icon-btn b-r-4 delete-btn">
											<i class="ti ti-trash"></i>
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
