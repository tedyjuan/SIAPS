<!-- glight css -->
<link href="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.css" rel="stylesheet">

<div class="container-fluid">
	<div class="row mb-3">
		<h4 class="main-title">Blog</h4>
		<div class="col-4 mt-2 mb-2">
			<ul class="app-line-breadcrumbs mb-3">
				<li class="">
					<a class="f-s-14 f-w-500" href="#">
						<span>
							<i class="ph-duotone  ph-stack f-s-16"></i> CMS
						</span>
					</a>
				</li>
				<li class="active">
					<a class="f-s-14 f-w-500" href="#" onclick="loadform('<?= $load_grid; ?>')">Blog</a>
				</li>
			</ul>
		</div>
		<div class="col-md-8 text-end">
			<button class="btn btn-secondary btn-md" data-bs-target="#modalfilter" data-bs-toggle="modal" type="button">
				<i class="fa-solid fa-search"></i> Filter
			</button>
			<a href="javascript:void(0)" onclick="loadform('<?= $url_tambah; ?>')" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Tambah</a>
			<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $load_grid; ?>')"><i class="fa-solid fa-refresh"></i> Refresh</a>
		</div>
	</div>
	<div class="row blog-section">
		<?= add_csrf() ?>

		<div id="data_grid_blog"></div>
	</div>
	<div aria-hidden="true" class="modal fade" data-bs-backdrop="static" id="modalfilter"
		tabindex="-1">
		<div class="modal-dialog app_modal_sm">
			<div class="modal-content">
				<div class="modal-header bg-primary-800">
					<h1 class="modal-title fs-5 text-white" id="exampleModal2">Filter Blogs</h1>
					<button onclick="resetFilterModal()" aria-label="Close" class="fs-5 border-0 bg-none  text-white" data-bs-dismiss="modal" type="button"><i class="fa-solid fa-xmark fs-3"></i></button>
				</div>
				<div class="modal-body ">
					<form id="filter_form" method="post">
						<div class="app-form">
							<div class="mb-3">
								<label class="form-label">Search By Range Date</label>
								<input type="date" class="form-control flatpiker" name="search_date" id="search_date" placeholder="pilih tanggal">
							</div>
							<div class="mb-3">
								<label>Search By Category</label>
								<select class="form-select select2" name="search_cat" id="search_cat" style="width: 100%;">
									<option value=""></option>
									<?php foreach ($kategori as $kat) : ?>
										<option value="<?= $kat->szCode; ?>"><?= $kat->szName; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="mb-3">
								<label>Search By Status</label>
								<select class="form-control select2" name="search_status" id="search_status" style="width: 100%;">
									<option value=""></option>
									<option value="DRAFT"> DRAFT </option>
									<option value="PUBLISH"> PUBLISH </option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-light-secondary" onclick="resetFilterModal()" data-bs-dismiss="modal" type="button">Close</button>
					<button class="btn btn-light-primary" onclick="searchData()" type="button">Filter</button>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Glight js -->
<script src="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.js"></script>
<script src="<?= base_url('public/admin/'); ?>assets/js/blog.js"></script>
<script>
	$(document).ready(function() {
		data_grid_blog();
	});
	$('.select2').select2({
		placeholder: 'Pilih',
		dropdownParent: $('#modalfilter')
	});

	$(".flatpiker").flatpickr({
		altInput: true,
		altFormat: "F j, Y",
		dateFormat: "Y-m-d",
		mode: "range",

	});

	function resetFilterModal() {
		// Reset form
		$('#filter_form')[0].reset();

		// Reset select2
		$('#filter_form .select2').val(null).trigger('change');

		// Reset flatpickr (semua input)
		document.querySelectorAll('.flatpiker').forEach(function(el) {
			if (el._flatpickr) {
				el._flatpickr.clear();
				el._flatpickr.setDate(null);
			}
		});
	}



	function data_grid_blog(form = null) {
		const url = '<?= $url_gridata; ?>';
		let ajaxOptions = {
			url: url,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				let html = '';
				if (data.hasil == 'true') {
					data.postdata.forEach(function(row) {
						const statusClass = row.szStatus === 'DRAFT' ? 'text-danger' : 'text-primary';
						const imageUrl = '<?= base_url("uploads/blog/"); ?>' + row.szNameFile;
						const detailUrl = 'admin/cms/C_blog/detail/' + row.uuid;
						const editUrl = 'admin/cms/C_blog/edit/' + row.uuid;
						const deleteUrl = '<?= base_url("admin/cms/C_blog/hapus"); ?>';
						const reloadUrl = 'admin/cms/C_blog';

						html += `
					<div class="col-md-6 col-lg-4 col-xxl-3">
						<div class="card blog-card overflow-hidden">
							<a class="glightbox img-hover-zoom" data-glightbox="type: image; zoomable: true;" href="${imageUrl}">
								<img alt="..." class="card-img-top" src="${imageUrl}">
							</a>
							<div class="tag-container">
								<span class="badge text-light-secondary">${row.szName}</span>
							</div>
							<div class="card-body">
								<p class="text-body-secondary"><i class="ti ti-calendar-due"></i> ${row.dtmCreated}</p>
								<a class="bloglink" href="#" onclick="loadform('${detailUrl}')">
									<h5 class="title-text mb-2">${row.szTitle}</h5>
								</a>
								<p class="card-text text-secondary">${stripHtml(row.szContent).substring(0, 100)}...</p>
								<div class="app-divider-v dashed py-3"></div>
								<div class="d-flex justify-content-between align-items-center gap-2 position-relative">
									<div>
										<h6 class="f-w-500 mb-0 ${statusClass}">${row.szStatus}</h6>
										<p class="text-secondary f-s-12 mb-0">${timeAgo(row.dtmCreated)}</p>
									</div>
									<div>
										<div class="btn-group dropdown-icon-none">
											<button class="btn border-0 icon-btn b-r-4 dropdown-toggle" data-bs-toggle="dropdown">
												<i class="ti ti-dots-vertical f-s-18 text-dark"></i>
											</button>
											<ul class="dropdown-menu">
												<li onclick="loadform('${editUrl}')">
													<a class="dropdown-item text-success" href="#"><i class="ti ti-archive"></i>Edit</a>
												</li>
												<li onclick="hapus('${row.uuid}', '${deleteUrl}', '${reloadUrl}')">
													<a class="dropdown-item text-danger" href="#"><i class="ti ti-trash"></i>Delete</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>`;
					});
					// Init ulang GLightbox
				} else {
					html = `<div class="alert alert-light-secondary" role="alert">Data Tidak Di temukan!</div>`;

				}
				$('#data_grid_blog').html(`<div class="row blog-section">${html}</div>`);
				if (typeof GLightbox !== 'undefined') {
					GLightbox({
						selector: '.glightbox'
					});
				}
				hideLoader();
			}
		};

		// Jika ada form filter, kirim POST
		if (form !== null) {
			ajaxOptions.type = 'POST';
			ajaxOptions.data = $(form).serialize();
		} else {
			ajaxOptions.type = 'GET';
		}

		$.ajax(ajaxOptions);
	}


	// Helper untuk hapus HTML tag
	function stripHtml(html) {
		const tmp = document.createElement("DIV");
		tmp.innerHTML = html;
		return tmp.textContent || tmp.innerText || "";
	}

	// Helper untuk tampilkan "time ago"
	function timeAgo(dateString) {
		const now = new Date();
		const then = new Date(dateString);
		const seconds = Math.floor((now - then) / 1000);

		let interval = Math.floor(seconds / 31536000);
		if (interval > 1) return interval + " tahun lalu";
		interval = Math.floor(seconds / 2592000);
		if (interval > 1) return interval + " bulan lalu";
		interval = Math.floor(seconds / 86400);
		if (interval > 1) return interval + " hari lalu";
		interval = Math.floor(seconds / 3600);
		if (interval > 1) return interval + " jam lalu";
		interval = Math.floor(seconds / 60);
		if (interval > 1) return interval + " menit lalu";
		return "baru saja";
	}

	function searchData() {
		data_grid_blog('#filter_form'); // ⬅️ kirim form ke fungsi utama
		$('#modalfilter').modal('hide');
	}
</script>
