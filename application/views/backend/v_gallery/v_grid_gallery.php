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
 					<table class="display app-data-table table table-striped align-middle mb-0" id="mytable">
 						<thead>
 							<tr>
 								<th style="width: 12%;">Kode</th>
 								<th>Nama Kegiatan</th>
 								<th>Deskripsi</th>
 								<th>Foto</th>
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
 									<td><?= $row->szLongTxt; ?></td>
 									<td>
 										<div class="d-flex align-items-center">
 											<div class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-warning me-2 simple-table-avatar">
 												<img alt="" class="img-fluid" src="<?= base_url('uploads/gallery/') . $row->szNameFile ?>">
 											</div>
 										</div>
 									</td>
 									<td>
 										<?php if ($row->szStatus == 'ACTIVE') { ?>
 											<span class="badge text-light-success">ACTIVE</span>
 										<?php } else { ?>
 											<span class="badge text-light-danger">INACTIVE</span>
 										<?php } ?>
 									</td>
 									<td class="text-center">
 										<button type="button" class="btn btn-light-success icon-btn b-r-4" onclick="loadform('admin/cms/C_gallery/edit/<?= $row->uuid; ?>')">
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
