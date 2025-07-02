<!-- glight css -->
<link href="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.css" rel="stylesheet">
<div class="container-fluid">
	<!-- Breadcrumb start -->
	<div class="row m-1">
		<div class="col-6">
			<h4 class="main-title">Blog Detail</h4>
			<ul class="app-line-breadcrumbs mb-3">
				<li class="">
					<a class="f-s-14 f-w-500" href="#">
						<span>
							<i class="ph-duotone  ph-stack f-s-16"></i> CMS
						</span>
					</a>
				</li>
				<li>
					<a class="f-s-14 f-w-500" href="#" onclick="loadform('<?= $load_grid; ?>')">Blog</a>
				</li>
				<li class="active">
					<a class="f-s-14 f-w-500" href="#" onclick="loadform('<?= $url_detail; ?>')">Blog detail</a>
				</li>
			</ul>
		</div>
		<div class="col-md-6 text-end">
			<a href="javascript:void(0)" onclick="loadform('<?= $load_grid; ?>')" class="btn btn-primary ">
				<i class="ph-bold  ph-arrow-bend-double-up-left"></i>
				Kembali
			</a>
			<a href="javascript:void(0)" class="btn btn-warning " onclick="loadform('<?= $url_detail; ?>')">
				<i class="fa-solid fa-refresh"></i>
				Refresh
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-xxl-9">
			<div class="card">
				<div class="card-body">
					<div class="post-div mb-3">
						<div class="row g-2">
							<div class="col-12">
								<a class="glightbox img-fluid" data-glightbox="type: image;" href="<?= base_url('uploads/blog/' . $blog->szNameFile); ?>">
									<img alt="image" class="img-fluid" src="<?= base_url('uploads/blog/' . $blog->szNameFile); ?>">
								</a>
							</div>
						</div>
					</div>

					<h5 class="mb-3 text-dark f-w-600"><?= $blog->szTitle; ?></h5>

					<div class="mb-3">
						<?= $blog->szContent; ?>


					</div>
					<div class="app-divider-v mb-2"></div>
					<div class="d-flex align-items-center flex-wrap ">
						<div class="flex-grow-1 ps-2 me-2">
							<h6 class="mb-0 f-w-500 <?= $blog->szStatus == 'DRAFT' ? 'text-danger' : 'text-primary' ?>">POSTING : <?= $blog->szStatus; ?></h6>
							<div class="text-muted f-s-12"><?= $blog->dtmCreated; ?></div>
						</div>
						<div>
							<div class="text-muted f-s-12">Views : <?= $blog->szViewCount; ?></div>
							<div class="text-muted f-s-12"> <?= time_ago($blog->dtmCreated); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xxl-3">
			<div class="row">
				<!-- Categories start -->
				<div class="col-md-6 col-lg-12">
					<div class="card equal-card">
						<div class="card-header">
							<h5>Categories</h5>
						</div>
						<div class="card-body">
							<ol class="list-group categories-list">
								<li class="list-group-item d-flex justify-content-between align-items-start ">
									<div class="me-auto categories-content">
										<p class="text-primary f-w-600"><i
												class="ti ti-chevron-right"></i> Fashion</p>
									</div>
									<span class="">[7]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="text-secondary f-w-600"><i
												class="ti ti-chevron-right"></i> Lifestyle</p>
									</div>
									<span class="">[10]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="text-success f-w-600"><i
												class="ti ti-chevron-right"></i> Food</p>
									</div>
									<span class="">[15]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="text-warning f-w-600"><i
												class="ti ti-chevron-right"></i> Travel</p>
									</div>
									<span class="">[20]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="text-danger f-w-600"><i
												class="ti ti-chevron-right"></i> Sports</p>
									</div>
									<span class="">[8]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="f-w-600"><i class="ti ti-chevron-right"></i>
											Technology</p>
									</div>
									<span class="">[10]</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-start">
									<div class="me-auto categories-content">
										<p class="text-info f-w-600"><i class="ti ti-chevron-right"></i>
											Business</p>
									</div>
									<span class="">[25]</span>
								</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- Categories end -->
				<!-- Popular Blog Posts start -->
				<div class="col-md-6 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h5>Popular Blog Posts</h5>
						</div>
						<div class="card-body popular-blog-list">
							<div class="position-relative mb-3">
								<div>
									<div class="position-absolute">
										<img alt="" class="w-40 h-40 bg-warning rounded"
											src="<?= base_url('public/admin/') ?>assets/images/avatar/5.png">
									</div>
								</div>
								<div class="ms-5">
									<p class="text-dark mb-0 f-w-500 f-s-14">There is a collage of large
										headlines and pictures..</p>
									<div class="text-secondary text-end text-end f-s-12">2 day ago</div>
								</div>
							</div>
							<div class="position-relative mb-3">
								<div>
									<div class="position-absolute">
										<img alt="" class="w-40 h-40 bg-danger rounded"
											src="<?= base_url('public/admin/') ?>assets/images/avatar/14.png">
									</div>
								</div>
								<div class="ms-5">
									<p class="text-dark mb-0 f-w-500 f-s-14">In addition, some
										additional blog content is displayed..</p>
									<div class="text-secondary text-end f-s-12">10 day ago</div>
								</div>
							</div>
							<div class="position-relative mb-3">
								<div>
									<div class="position-absolute">
										<img alt="" class="w-40 h-40 bg-primary rounded"
											src="<?= base_url('public/admin/') ?>assets/images/avatar/4.png">
									</div>
								</div>
								<div class="ms-5">
									<p class="text-dark mb-0 f-w-500 f-s-14">It also showcases the best
										tech deals, helping people make. .</p>
									<div class="text-secondary text-end f-s-12">1 day ago</div>
								</div>
							</div>
							<div class="position-relative mb-3">
								<div>
									<div class="position-absolute">
										<img alt="" class="w-40 h-40 bg-success rounded"
											src="<?= base_url('public/admin/') ?>assets/images/avatar/07.png">
									</div>
								</div>
								<div class="ms-5">
									<p class="text-dark mb-0 f-w-500 f-s-14">Further down the page, more
										article headlines are sorted by the most..</p>
									<div class="text-secondary text-end f-s-12">5min ago</div>
								</div>
							</div>
							<div class="position-relative mb-3">
								<div>
									<div class="position-absolute">
										<img alt="" class="w-40 h-40 bg-dark rounded"
											src="<?= base_url('public/admin/') ?>assets/images/avatar/09.png">
									</div>
								</div>
								<div class="ms-5">
									<p class="text-dark mb-0 f-w-500 f-s-14">The blog also does a great
										job of emphasizing text readability..</p>
									<div class="text-secondary text-end f-s-12">5min ago</div>
								</div>
							</div>
							<div class="mt-3">
								<a class="btn btn-md btn-primary w-100" href="blog.html" role="button"
									target="_blank">
									<i class="ti ti-plus"></i> View All
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Popular Blog Posts end -->
			</div>
		</div>
	</div>
</div>
<!-- Glight js -->
<script src="<?= base_url('public/admin/'); ?>assets/vendor/glightbox/glightbox.min.js"></script>
<script src="<?= base_url('public/admin/'); ?>assets/js/blog.js"></script>
