<!-- glight css -->
<link href="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.css" rel="stylesheet">
<div class="container-fluid">
	<div class="row m-1">
		<div class="col-6">
			<h4 class="main-title">Blog</h4>
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
	<div class="row blog-section">

		<?php foreach ($grid as $row) : ?>
			<div class="col-md-6 col-lg-4 col-xxl-3">
				<div class="card blog-card overflow-hidden">
					<a class="glightbox img-hover-zoom" data-glightbox="type: image; zoomable: true;" href="<?= base_url('uploads/blog/' . $row->szNameFile); ?>">
						<img alt="..." class="card-img-top" src="<?= base_url('uploads/blog/' . $row->szNameFile); ?>">
					</a>
					<div class="tag-container">
						<span class="badge text-light-secondary">kategory</span>
					</div>
					<div class="card-body">
						<p class="text-body-secondary"><i class="ti ti-calendar-due"></i> <?= $row->dtmCreated; ?></p>
						<a class="bloglink" href="#" onclick="loadform('<?= $url_detail.$row->uuid?>')">
							<h5 class="title-text mb-2"><?= $row->szTitle; ?></h5>
						</a>
						<p class="card-text text-secondary">
							<?= ringkasan($row->szContent); ?>
						</p>
						<div class="app-divider-v dashed py-3"></div>
						<div class="d-flex justify-content-between align-items-center gap-2 position-relative">
							<div>
								<h6 class="f-w-500 mb-0 <?= $row->szStatus == 'DRAFT' ? 'text-danger' : 'text-primary' ?>"><?= $row->szStatus; ?></h6>
								<p class="text-secondary f-s-12 mb-0"><?= time_ago($row->dtmCreated); ?></p>
							</div>
							<div>
								<div class="btn-group dropdown-icon-none">
									<button aria-expanded="false"
										class="btn border-0 icon-btn b-r-4 dropdown-toggle"
										data-bs-auto-close="true"
										data-bs-toggle="dropdown" type="button">
										<i class="ti ti-dots-vertical f-s-18 text-dark"></i>
									</button>
									<ul class="dropdown-menu">
										<li class="delete-btn"><a class="dropdown-item text-success" href="#"><i class="ti ti-archive"></i>Edit </a></li>
										<li class="delete-btn"><a class="dropdown-item text-danger" href="#"><i class="ti ti-trash"></i>Delete </a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>


<!-- Glight js -->
<script src="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.js"></script>
<script src="<?= base_url('public/admin/'); ?>assets/js/blog.js"></script>
