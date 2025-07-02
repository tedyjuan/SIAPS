<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_blog extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->load->model('M_blog');
		$this->viewdata['load_grid']  = 'admin/cms/C_blog';
		$this->viewdata['url_tambah'] = 'admin/cms/C_blog/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Data Blog";
		$data['url_hapus'] = base_url('admin/cms/C_blog/hapus');
		$data['url_detail'] = 'admin/cms/C_blog/detail/';
		$data['grid']      = $this->M_blog->grid_blog()->result();
		$this->load->view('backend/v_blog/v_grid_blog', $data);
	}
	function add()
	{
		$data               = $this->viewdata;
		$data['judul']      = 'Form Tambah Data blog';
		$data['url_insert'] = base_url('admin/cms/C_blog/insert');
		$data['kategori']   = $this->Mglobal->get_order_where("tbl_kategori", "id")->result();
		$this->load->view('backend/v_blog/v_add_blog', $data);
	}
	public function detail($uuid)
	{
		$data              = $this->viewdata;
		$data['blog']      = $this->M_blog->grid_blog($uuid)->row();
		$data['url_detail'] = 'admin/cms/C_blog/detail/'. $uuid;
		$this->load->view('backend/v_blog/v_detail_blog', $data);
		
	}
	function edit($uuid)
	{
		$param = ['uuid' => $uuid];
		$cekdb  = $this->Mglobal->getWhere("tbl_blog", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Form Edit Data blog';
			$data['load_edit']  = 'admin/cms/C_blog/edit/' . $uuid;
			$data['url_update'] = base_url('admin/cms/C_blog/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_blog/v_edit_blog', $data);
		} else {
			errorform("404", "ID Tidak ditemukan Didatabase");
		}
	}
	public function insert()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false', 
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {
			$gambar  = $_FILES['gambar']['name'];
			$fileNameParts = explode('.', $gambar);
			$potong_typefile = end($fileNameParts);
			$typefile = strtolower($potong_typefile);
			if ($gambar != "") {
				$tanggalfoto             = "blog" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/blog/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 7100;
				$config['file_name']     = $tanggalfoto;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('gambar')) {
					$jsonmsg = array(
						"hasil"  => 'false',
						"pesan"  => $this->upload->display_errors('', ''),
					);
					echo json_encode($jsonmsg);
				} else {
					// ===== Kompres & Resize =====
					$original_path = './uploads/blog/' . $tanggalfoto . '.' . $typefile;
					$jpeg_path     = './uploads/blog/' . $tanggalfoto . '.jpg';
					if ($typefile === 'png') {
						// Konversi PNG ke JPEG
						$image = imagecreatefrompng($original_path);
						$bg    = imagecreatetruecolor(imagesx($image), imagesy($image));
						$white = imagecolorallocate($bg, 255, 255, 255);
						imagefill($bg, 0, 0, $white);
						imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
						imagejpeg($bg, $jpeg_path, 85);  // Simpan sebagai JPEG dengan kompresi 85
						imagedestroy($image);
						imagedestroy($bg);
						unlink($original_path);  // hapus PNG asli
						$resize_source = $jpeg_path;
					} else {
						$resize_source = $original_path;
					}
					// Resize gambar
					$config_resize['image_library']  = 'gd2';
					$config_resize['source_image']   = $resize_source;
					$config_resize['create_thumb']   = FALSE;
					$config_resize['maintain_ratio'] = TRUE;
					$config_resize['width']          = 1920;
					$config_resize['height']         = 1280;
					$config_resize['quality']        = '60%';

					$this->load->library('image_lib', $config_resize);
					$this->image_lib->initialize($config_resize);
					if (!$this->image_lib->resize()) {
						$echo  = $this->image_lib->display_errors();
						$this->image_lib->clear();
						$jsonmsg = array(
							"hasil"  => 'false',
							"pesan"  => $echo,
						);
						echo json_encode($jsonmsg);
					} else {
						$this->image_lib->clear();
						$judul_blog       = $this->input->post('judul_blog');
						$kategori_blog    = $this->input->post('kategori_blog');
						$editor           = $this->input->post('editor');
						$nama_baru_gambar = $tanggalfoto . '.jpg';
						$record = [
							'uuid'           => $this->uuid->v4(),
							'szNameFile'     => $nama_baru_gambar,
							'szTitle'        => strtoupper($judul_blog),
							'szStatus'       => 'DRAFT',
							'szKategoryId'   => $kategori_blog,
							'szContent'      => $editor,
							'szNameFile'     => $nama_baru_gambar,
							'szSlug'         => $this->slugify($judul_blog),
							'szUserCreated'  => $this->user_id,
							'dtmCreated'     => date('Y-m-d H:i:s'),
						];
						$cekupdate  = $this->Mglobal->insert($record, 'tbl_blog');
						if ($cekupdate == 'true') {
							$jsonmsg = array(
								"hasil"  => 'true',
								"pesan"  => "Dokument Berhasil Simpan",
								"psn"  => $this->image_lib->display_errors(),
							);
							echo json_encode($jsonmsg);
						} else {
							$jsonmsg = array(
								"hasil"  => 'false',
								"pesan"  => "Dokument Gagal Simpan",
							);
							echo json_encode($jsonmsg);
						}
					}
				}
			} else {
				$jsonmsg = array(
					"hasil"     => 'false',
					"pesan"     => "Foto Tidak Boleh Kosong bor",
				);
				echo json_encode($jsonmsg);
			}
		}
	}
	function hapus()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {

			$where = ['uuid' => $this->input->post('uuid')];
			$cekdata  = $this->Mglobal->getWhere("tbl_blog", $where)->row();
			if ($cekdata == null) {
				$jsonmsg = [
					'hasil' => 'false',
					'pesan' => 'Data uuid Tidak di temukan',
				];
				echo json_encode($jsonmsg);
			} else {
				$status = $cekdata->szStatus;
				if ($status == 'ACTIVE') {
					$jsonmsg = [
						'hasil' => 'false',
						'pesan' => 'Data gagal Dihapus, Hanya data INACTIVE yang dapat dihapus',
					];
					echo json_encode($jsonmsg);
				} else {
					$nama_file = $cekdata->szNameFile;
					$cekdb  = $this->Mglobal->delete("tbl_blog", $where);
					if ($cekdb == 'TRUE') {
						$this->session->unset_userdata('csrf_token');
						$path = "./uploads/blog/" . $nama_file;
						unlink($path);
						$jsonmsg = [
							'hasil' => 'true',
							'pesan' => 'Data Berhasil Dihapus',
						];
						echo json_encode($jsonmsg);
					} else {
						$jsonmsg = [
							'hasil' => 'false',
							'pesan' => 'Data Gagal Dihapus',
						];
						echo json_encode($jsonmsg);
					}
				}
			}
		}
	}
	
	public function update()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {
			$uuid         = $this->input->post('uuid');
			$kode         = $this->input->post('kode');
			$nama_new     = $this->input->post('judul_blog');
			$status_blog = $this->input->post('status_blog');
			$radio_group  = $this->input->post('radio_group');
			$kategori_blog    = $this->input->post('kategori_blog');
			$old_image    = $this->input->post('old_image');
			$where    = [
				'uuid'   => $uuid,
				'szCode' => $kode
			];
			$gambar  = $_FILES['gambar']['name'];
			$fileNameParts = explode('.', $gambar);
			$potong_typefile = end($fileNameParts);
			$typefile = strtolower($potong_typefile);
			if ($gambar != "") {
				$tanggalfoto             = "blog" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/blog/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 7100;
				$config['file_name']     = $tanggalfoto;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('gambar')) {
					$jsonmsg = array(
						"hasil"  => 'false',
						"pesan"  => $this->upload->display_errors('', ''),
					);
					echo json_encode($jsonmsg);
				} else {
					//Compress Image
					$config_resize['image_library']  = 'gd2';
					$config_resize['source_image']   = './uploads/blog/' . $tanggalfoto . '.' . $typefile;
					$config_resize['create_thumb']   = FALSE;
					$config_resize['maintain_ratio'] = FALSE;
					$config_resize['width']          = 1920;
					$config_resize['height']         = 1280;
					$config_resize['quality']        = '85%'; // opsional, untuk kompresi
					$this->load->library('image_lib', $config_resize);
					$this->image_lib->initialize($config_resize);
					if (!$this->image_lib->resize()) {
						$echo  = $this->image_lib->display_errors();
						$this->image_lib->clear();
						$jsonmsg = array(
							"hasil"  => 'false',
							"pesan"  => $echo,
						);
						echo json_encode($jsonmsg);
					} else {
						$this->image_lib->clear();
						$judul_blog      = $this->input->post('judul_blog');
						$status_blog     = $this->input->post('status_blog');
						$kategori_blog        = $this->input->post('kategori_blog');
						$nama_baru_gambar = $this->upload->data('file_name');
						$record = [
							'szName'         => strtoupper($judul_blog),
							'szHighlightTxt' => strtoupper($status_blog),
							'szLongTxt'      => $kategori_blog,
							'szNameFile'     => $nama_baru_gambar,
						];
						$cekupdate  = $this->Mglobal->update($record, "tbl_blog", $where);
						if ($cekupdate == 'true') {
							$path = "./uploads/blog/" . $old_image;

							// Cek apakah file ada dan memang file, baru hapus
							if ($old_image && file_exists($path) && is_file($path)) {
								unlink($path);
							}
							$jsonmsg = array(
								"hasil"  => 'true',
								"pesan"  => "Dokument Berhasil update",
								"psn"  => $this->image_lib->display_errors(),
							);
							echo json_encode($jsonmsg);
						} else {
							$jsonmsg = array(
								"hasil"  => 'false',
								"pesan"  => "Dokument Gagal update",
							);
							echo json_encode($jsonmsg);
						}
					}
				}
			} else {
				$data = [
					'szName'         => strtoupper($nama_new),
					'szStatus'       => $radio_group,
					'szLongTxt'      => strtoupper($status_blog),
					'szHighlightTxt' => strtoupper($status_blog),
					'szLongTxt'      => $kategori_blog,
				];
				$cekdb  = $this->Mglobal->update($data, "tbl_blog", $where);
				if ($cekdb == 'TRUE') {
					$this->session->unset_userdata('csrf_token');
					$jsonmsg = [
						'hasil' => 'true',
						'pesan' => 'Data Berhasil di update',
					];
					echo json_encode($jsonmsg);
				} else {
					$jsonmsg = [
						'hasil' => 'false',
						'pesan' => 'Data Gagal di update',
					];
					echo json_encode($jsonmsg);
				}
			}
		}
	}

	function slugify($text)
	{
		// 1. Ubah huruf besar ke kecil
		$text = strtolower($text);

		// 2. Hilangkan karakter non huruf/angka/spasi
		$text = preg_replace('/[^a-z0-9\s-]/', '', $text);

		// 3. Ganti spasi/underscore dengan tanda strip (-)
		$text = preg_replace('/[\s_]+/', '-', $text);

		// 4. Hilangkan strip berulang
		$text = preg_replace('/-+/', '-', $text);

		// 5. Hilangkan strip di awal/akhir
		$text = trim($text, '-');

		return $text;
	}
 
	 
}
