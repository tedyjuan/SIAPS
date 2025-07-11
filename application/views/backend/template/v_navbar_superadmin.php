<div class="app-nav" id="app-simple-bar">
	<ul class="main-nav p-0 mt-2">
		<li class="menu-title">
			<span>Menu</span>
		</li>
		<li>
			<a aria-expanded="false" data-bs-toggle="collapse" href="#li_home">
				<i class="ph-bold  ph-gauge icon-md"></i>&nbsp;Dashboard
			</a>
			<ul class="collapse" id="li_home">
				<li class="active"><a href="calendar.html">Admin</a></li>
				<li><a href="invoice.html">Siswa</a></li>
				<li><a href="invoice.html">Wali</a></li>
				<li><a href="invoice.html">Guru</a></li>
			</ul>
		</li>
		<li>
			<a aria-expanded="false" data-bs-toggle="collapse" href="#li_siswa">
				<i class="ph-bold  ph-users icon-md"></i>&nbsp;Siswa
			</a>
			<ul class="collapse" id="li_siswa">
				<li class="active"><a href="calendar.html">Siswa</a></li>
				<li><a href="invoice.html">Detail Siswa</a></li>
				<li><a href="invoice.html">Formulir Penerimaan</a></li>
			</ul>
		</li>
		<li>
			<a aria-expanded="false" data-bs-toggle="collapse" href="#li_master" id="nav_master"><i class="ph-bold  ph-stack icon-md"></i>&nbsp;Master</a>
			<ul class="collapse" id="li_master">
				<li id="sub_eskul" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_eskul', 'nav_master', 'sub_eskul','li_master')">Master Eskul</a>
				</li>
				<li id="sub_jabatan" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_jabatan', 'nav_master', 'sub_jabatan','li_master')">Master Jabatan</a>
				</li>
				<li id="sub_jurusan" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_jurusan', 'nav_master', 'sub_jurusan','li_master')">Master Jurusan</a>
				</li>
				<li id="sub_kategori" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_kategori', 'nav_master', 'sub_kategori','li_master')">Master Kategori</a>
				</li>
				<li id="sub_kelas" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_kelas', 'nav_master', 'sub_kelas','li_master')">Master Kelas</a>
				</li>
				<li id="sub_mapel" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_mapel', 'nav_master', 'sub_mapel','li_master')">Master Matapelajaran</a>
				</li>
				<li id="sub_pendidikan" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_pendidikan', 'nav_master', 'sub_pendidikan','li_master')">Master Pendidikan</a>
				</li>
				<li id="sub_prof_sekolah" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_profil_sekolah', 'nav_master', 'sub_prof_sekolah','li_master')">Master Profil Sekolah</a>
				</li>
				<li id="sub_roll" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_role', 'nav_master', 'sub_roll','li_master')">Master Role Akses</a>
				</li>
				<li id="sub_tngkatan_kls" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_tingkatan_kelas', 'nav_master', 'sub_tngkatan_kls','li_master')">Master Tingkatan Kelas</a>
				</li>
				<li id="sub_visi_misi" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/master/C_visi_misi', 'nav_master', 'sub_visi_misi','li_master')">Master Visi Misi</a>
				</li>
			</ul>
		</li>
		<li class="menu-title">
			<span>CMS</span>
		</li>
		<li>
			<a aria-expanded="false" data-bs-toggle="collapse" href="#li_cms" id="nav_cms"><i class="ph-bold  ph-stack icon-md"></i>&nbsp;CMS</a>
			<ul class="collapse" id="li_cms">
				<li id="sub_slider" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/cms/C_slider', 'nav_cms', 'sub_slider','li_cms')">Slider</a>
				</li>
				<li id="sub_gallery" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/cms/C_gallery', 'nav_cms', 'sub_gallery','li_cms')">Gallery Sekolah</a>
				</li>
				<li id="sub_blog" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/cms/C_blog', 'nav_cms', 'sub_blog','li_cms')">Blogs Sekolah</a>
				</li>
				<li id="sub_slider" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/cms/C_slider', 'nav_cms', 'sub_slider','li_cms')">Kurikulum Merdeka</a>
				</li>
				<li id="sub_slider" class="sub_reset">
					<a href="javascript:;" onclick="tocontroller('admin/cms/C_slider', 'nav_cms', 'sub_slider','li_cms')">Jadwal Matapelajaran</a>
				</li>
			</ul>
		</li>
		<li class="no-sub">
			<a aria-expanded='false' id="nav_role" href="javascript:;" onclick="tocontroller('admin/master/C_role', 'nav_role')" class="nav-link">
				<svg stroke="currentColor" stroke-width="1.5">
					<use xlink:href="<?= base_url('public/admin/'); ?>assets/svg/_sprite.svg#chat-bubble"></use>
				</svg>Role
			</a>
		</li>
		<li class="no-sub">
			<a aria-expanded='false' id="nav_role_dua" href="javascript:;" onclick="tocontroller('admin/master/C_role', 'nav_role_dua')" class="nav-link">
				<svg stroke="currentColor" stroke-width="1.5">
					<use xlink:href="<?= base_url('public/admin/'); ?>assets/svg/_sprite.svg#chat-bubble"></use>
				</svg>Test
			</a>
		</li>
	</ul>
</div>
