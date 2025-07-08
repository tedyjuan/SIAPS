<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_gallery extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001', 'ROLE-00002']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/cms/C_gallery';
		$this->viewdata['url_tambah'] = 'admin/cms/C_gallery/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Data Gallery";
		$data['url_hapus'] = base_url('admin/cms/C_gallery/hapus');
		$data['grid']      = $this->Mglobal->get_order_where('tbl_gallery', 'id')->result();
		$this->load->view('backend/v_gallery/v_grid_gallery', $data);
	}
	function add()
	{
		$data               = $this->viewdata;
		$data['judul']      = 'Form Tambah Data Gallery';
		$data['url_insert'] = base_url('admin/cms/C_gallery/insert');
		$data['code']       = $this->Mglobal->get_counter("SLD", "tbl_gallery", "szCode");
		$this->load->view('backend/v_gallery/v_add_gallery', $data);
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
				$tanggalfoto             = "img" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/gallery/';
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
					$config_resize['source_image']   = './uploads/gallery/' . $tanggalfoto . '.' . $typefile;
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
						$nama_gallery     = $this->input->post('nama_kegiatan');
						$desc_text        = $this->input->post('desc_text');
						$nama_baru_gambar = $this->upload->data('file_name');
						$record = [
							'uuid'       => $this->uuid->v4(),
							'szName'     => strtoupper($nama_gallery),
							'szCode'     => $this->Mglobal->get_counter("GLL", "tbl_gallery", "szCode"),
							'szStatus'   => 'INACTIVE',
							'szLongTxt'  => $desc_text,
							'szNameFile' => $nama_baru_gambar,
							'dtmCreated'     => date('Y-m-d H:i:s'),
							'szUserCreated'  => $this->user_id,
						];
						$cekupdate  = $this->Mglobal->insert($record, 'tbl_gallery');
						if ($cekupdate == FALSE) {
							$jsonmsg = array(
								"hasil"  => 'false',
								"pesan"  => "Dokument Gagal Simpan",
							);
							echo json_encode($jsonmsg);
						} else {
							$jsonmsg = array(
								"hasil"  => 'true',
								"pesan"  => "Dokument Berhasil Simpan",
								"psn"  => $this->image_lib->display_errors(),
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
			$cekdata  = $this->Mglobal->getWhere("tbl_gallery", $where)->row();
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
					$cekdb  = $this->Mglobal->delete("tbl_gallery", $where);
					if ($cekdb == 'TRUE') {
						$this->session->unset_userdata('csrf_token');
						$path = "./uploads/gallery/" . $nama_file;
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
		$cekdb  = $this->Mglobal->getWhere("tbl_gallery", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Form Edit Data Gallery';
			$data['load_edit']  = 'admin/cms/C_gallery/edit/' . $uuid;
			$data['url_update'] = base_url('admin/cms/C_gallery/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_gallery/v_edit_gallery', $data);
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
			$radio_group  = $this->input->post('radio_group');
			$old_image    = $this->input->post('old_image');

			$nama_gallery     = $this->input->post('nama_kegiatan');
			$desc_text        = $this->input->post('desc_text');
			$where    = [
				'uuid'   => $uuid,
				'szCode' => $kode
			];
			$gambar  = $_FILES['gambar']['name'];
			$fileNameParts = explode('.', $gambar);
			$potong_typefile = end($fileNameParts);
			$typefile = strtolower($potong_typefile);
			if ($gambar != "") {
				$tanggalfoto             = "Gallery" . '_' . time();  //merename file yg diupload
				$config['upload_path']   = './uploads/Gallery/';
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
					$config_resize['source_image']   = './uploads/Gallery/' . $tanggalfoto . '.' . $typefile;
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
						
						$nama_baru_gambar = $this->upload->data('file_name');
						$record = [
							'szName'         => strtoupper($nama_gallery),
							'szLongTxt'      => $desc_text,
							'szNameFile'     => $nama_baru_gambar,
							'dtmUpdated'     => date('Y-m-d H:i:s'),
							'szUserUpdated'  => $this->user_id,
						];
						$cekupdate  = $this->Mglobal->update($record, "tbl_gallery", $where);
						if ($cekupdate == 'true') {
							$path = "./uploads/gallery/" . $old_image;
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
					'szStatus'       => $radio_group,
					'szLongTxt'      => $desc_text,
					'szName'         => strtoupper($nama_gallery),
					'szLongTxt'      => $desc_text,
					'dtmUpdated'     => date('Y-m-d H:i:s'),
					'szUserUpdated'  => $this->user_id,
				];
				$cekdb  = $this->Mglobal->update($data, "tbl_gallery", $where);
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
