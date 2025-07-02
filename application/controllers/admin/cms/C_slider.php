<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_slider extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/cms/C_slider';
		$this->viewdata['url_tambah'] = 'admin/cms/C_slider/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Data Slider";
		$data['url_hapus'] = base_url('admin/cms/C_slider/hapus');
		$data['grid']      = $this->Mglobal->get_order_where('tbl_slider', 'id')->result();
		$this->load->view('backend/v_slider/v_grid_slider', $data);
	}
	function add()
	{
		$data               = $this->viewdata;
		$data['judul']      = 'Form Tambah Data Slider';
		$data['url_insert'] = base_url('admin/cms/C_slider/insert');
		$data['code']       = $this->Mglobal->get_counter("SLD", "tbl_slider", "szCode");
		$this->load->view('backend/v_slider/v_add_slider', $data);
	}

	public function insert_old()
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
				$tanggalfoto             = "slider" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/slider/';
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
					$config_resize['source_image']   = './uploads/slider/' . $tanggalfoto . '.' . $typefile;
					$config_resize['create_thumb']   = FALSE;
					$config_resize['maintain_ratio'] = TRUE;
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
						$nama_slider      = $this->input->post('nama_slider');
						$slider_warna     = $this->input->post('slider_warna');
						$long_text        = $this->input->post('long_text');
						$nama_baru_gambar = $this->upload->data('file_name');
						$record = [
							'uuid'           => $this->uuid->v4(),
							'szName'         => strtoupper($nama_slider),
							'szCode'         => $this->Mglobal->get_counter("SLD", "tbl_slider", "szCode"),
							'szStatus'       => 'INACTIVE',
							'szHighlightTxt' => strtoupper($slider_warna),
							'szLongTxt'      => $long_text,
							'szNameFile'     => $nama_baru_gambar,
							'dtmCreated'         => date('Y-m-d H:i:s'),
							'szUserCreated'      => $this->user_id,
						];
						$cekupdate  = $this->Mglobal->insert($record, 'tbl_slider');
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
	public function insert()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') || !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			echo json_encode([
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			]);
			return;
		}

		$gambar = $_FILES['gambar']['name'];
		if (!$gambar) {
			echo json_encode([
				"hasil" => 'false',
				"pesan" => "Foto Tidak Boleh Kosong ",
			]);
			return;
		}

		$fileNameParts = explode('.', $gambar);
		$typefile = strtolower(end($fileNameParts));
		$tanggalfoto = "slider_" . time(); // rename unik

		// Set konfigurasi upload
		$config['upload_path']   = './uploads/slider/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = 7100;
		$config['file_name']     = $tanggalfoto;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			echo json_encode([
				"hasil" => 'false',
				"pesan" => $this->upload->display_errors('', ''),
			]);
			exit;
		}

		// ===== Kompres & Resize =====
		$original_path = './uploads/slider/' . $tanggalfoto . '.' . $typefile;
		$jpeg_path     = './uploads/slider/' . $tanggalfoto . '.jpg';

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
		$config_resize['quality']        = '80%';

		$this->load->library('image_lib', $config_resize);
		$this->image_lib->initialize($config_resize);

		if (!$this->image_lib->resize()) {
			echo json_encode([
				"hasil" => 'false',
				"pesan" => $this->image_lib->display_errors(),
			]);
			return;
		}

		$this->image_lib->clear();

		// ===== Simpan ke database =====
		$nama_slider      = $this->input->post('nama_slider');
		$slider_warna     = $this->input->post('slider_warna');
		$long_text        = $this->input->post('long_text');
		$nama_baru_gambar = $tanggalfoto . '.jpg'; // karena sudah dikonversi JPG

		$record = [
			'uuid'           => $this->uuid->v4(),
			'szName'         => strtoupper($nama_slider),
			'szCode'         => $this->Mglobal->get_counter("SLD", "tbl_slider", "szCode"),
			'szStatus'       => 'INACTIVE',
			'szHighlightTxt' => strtoupper($slider_warna),
			'szLongTxt'      => $long_text,
			'szNameFile'     => $nama_baru_gambar,
			'dtmCreated'     => date('Y-m-d H:i:s'),
			'szUserCreated'  => $this->user_id,
		];

		$cekupdate  = $this->Mglobal->insert($record, 'tbl_slider');
		if ($cekupdate == 'true') {
			echo json_encode([
				"hasil" => 'true',
				"pesan" => "Dokumen Berhasil Disimpan"
			]);
		} else {
			echo json_encode([
				"hasil" => 'false',
				"pesan" => "Dokumen Gagal Disimpan"
			]);
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
			$cekdata  = $this->Mglobal->getWhere("tbl_slider", $where)->row();
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
					$cekdb  = $this->Mglobal->delete("tbl_slider", $where);
					if ($cekdb == 'TRUE') {
						$this->session->unset_userdata('csrf_token');
						$path = "./uploads/slider/" . $nama_file;
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
	function edit($uuid)
	{
		$param = ['uuid' => $uuid];
		$cekdb  = $this->Mglobal->getWhere("tbl_slider", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Form Edit Data Slider';
			$data['load_edit']  = 'admin/cms/C_slider/edit/' . $uuid;
			$data['url_update'] = base_url('admin/cms/C_slider/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_slider/v_edit_slider', $data);
		} else {
			errorform("404", "ID Tidak ditemukan Didatabase");
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
			$nama_new     = $this->input->post('nama_slider');
			$slider_warna = $this->input->post('slider_warna');
			$radio_group  = $this->input->post('radio_group');
			$long_text    = $this->input->post('long_text');
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
				$tanggalfoto             = "slider" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/slider/';
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
					$config_resize['source_image']   = './uploads/slider/' . $tanggalfoto . '.' . $typefile;
					$config_resize['create_thumb']   = FALSE;
					$config_resize['maintain_ratio'] = TRUE;
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
						$nama_slider      = $this->input->post('nama_slider');
						$slider_warna     = $this->input->post('slider_warna');
						$long_text        = $this->input->post('long_text');
						$nama_baru_gambar = $this->upload->data('file_name');
						$record = [
							'szName'         => strtoupper($nama_slider),
							'szHighlightTxt' => strtoupper($slider_warna),
							'szLongTxt'      => $long_text,
							'szNameFile'     => $nama_baru_gambar,
							'dtmUpdated'         => date('Y-m-d H:i:s'),
							'szUserUpdated'      => $this->user_id,
						];
						$cekupdate  = $this->Mglobal->update($record, "tbl_slider", $where);
						if ($cekupdate == 'true') {
							$path = "./uploads/slider/" . $old_image;

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
					'szLongTxt'      => strtoupper($slider_warna),
					'szHighlightTxt' => strtoupper($slider_warna),
					'szLongTxt'      => $long_text,
					'dtmUpdated'         => date('Y-m-d H:i:s'),
					'szUserUpdated'      => $this->user_id,
				];
				$cekdb  = $this->Mglobal->update($data, "tbl_slider", $where);
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
}
