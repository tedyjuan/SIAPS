<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_mapel extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/master/C_mapel';
		$this->viewdata['url_tambah'] = 'admin/master/C_mapel/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Master Data Matapelajaran";
		$data['akses']     = "ON";
		$data['url_hapus'] = base_url('admin/master/C_mapel/hapus');
		$data['grid']      = $this->Mglobal->get_order_where('tbl_mapel', 'id')->result();
		$this->load->view('backend/v_mapel/v_grid_mapel', $data);
	}
	function add()
	{
		$data               = $this->viewdata;
		$data['judul']      = 'Form Tambah Data Matapelajaran';
		$data['url_insert'] = base_url('admin/master/C_mapel/insert');
		$data['code']       = $this->Mglobal->get_counter("MPL", "tbl_mapel", "szCode");
		$this->load->view('backend/v_mapel/v_add_mapel', $data);
	}

	function insert()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {
			$singkatan       = $this->input->post('singkatan');
			$nama_mapel = $this->input->post('nama_mapel');
			$cekdata = $this->Mglobal->getWhere("tbl_mapel", ['szAbbreviation' => $singkatan])->num_rows();
			if ($cekdata == 0) {
				$ceknama = $this->Mglobal->getWhere("tbl_mapel", ['szName' => $nama_mapel])->num_rows();
				if($ceknama == 0){
					$data = [
						'uuid'           => $this->uuid->v4(),
						'szCode'         => $this->Mglobal->get_counter("MPL", "tbl_mapel", "szCode"),
						'szName'         => strtoupper($nama_mapel),
						'szStatus'       => 'INACTIVE',
						'szAbbreviation' => strtoupper($singkatan),
						'dtmCreated'         => date('Y-m-d H:i:s'),
						'szUserCreated'      => $this->user_id,
					];
					$cekdb  = $this->Mglobal->insert($data, 'tbl_mapel');
					if ($cekdb != FALSE) {
						$this->session->unset_userdata('csrf_token');
						$jsonmsg = [
							'hasil' => 'true',
							'pesan' => 'Data Berhasil tersimpan',
						];
						echo json_encode($jsonmsg);
					} else {
						$jsonmsg = [
							'hasil' => 'false',
							'pesan' => 'Data Gagal Disimpan',
						];
						echo json_encode($jsonmsg);
					}
				}else{
					$jsonmsg = [
						'hasil' => 'false',
						'pesan' => 'Data Gagal Disimpan, Nama mapel Sudah Terdaftar',
					];
					echo json_encode($jsonmsg);
				}
			} else {
				$jsonmsg = [
					'hasil' => 'false',
					'pesan' => 'Data Gagal Disimpan, Singkatan Sudah Terdaftar',
				];
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
			$cekdata  = $this->Mglobal->getWhere("tbl_mapel", $where)->row();
			if ($cekdata == null) {
				$jsonmsg = [
					'hasil' => 'false',
					'pesan' => 'Data uuid Tidak di temukan',
				];
				echo json_encode($jsonmsg);
			} else {
				$status = $cekdata->szStatus;
				if($status == 'ACTIVE'){
					$jsonmsg = [
					'hasil' => 'false',
					'pesan' => 'Data gagal Dihapus, Hanya data INACTIVE yang dapat dihapus',
					];
					echo json_encode($jsonmsg);
				}else{
					$whereadmin = ['szRole' => $cekdata->szCode];
					$cekdatajoin  = $this->Mglobal->getWhere("tbl_user", $whereadmin)->num_rows();
					if ($cekdatajoin == 0) {
						$cekdb  = $this->Mglobal->delete("tbl_mapel", $where);
						if ($cekdb == 'TRUE') {
							$this->session->unset_userdata('csrf_token');
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
					} else {
						$jsonmsg = [
							'hasil' => 'false',
							'pesan' => 'Data Gagal Dihapus, Data Terintegrasi Pada Master User',
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
		$cekdb  = $this->Mglobal->getWhere("tbl_mapel", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Form Edit Data mapel';
			$data['load_edit']  = 'admin/master/C_mapel/edit/' . $uuid;
			$data['url_update'] = base_url('admin/master/C_mapel/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_mapel/v_edit_mapel', $data);
		} else {
			errorform("404", "ID Tidak ditemukan Didatabase");
		}
	}
	function update()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {
			$uuid     = $this->input->post('uuid');
			$kode     = $this->input->post('kode');
			$nama_old = $this->input->post('nama_old');
			$nama_new = $this->input->post('nama_mapel');
			$singkatan = $this->input->post('singkatan');
			$radio_group = $this->input->post('radio_group');
			$where    = [
				'uuid'   => $uuid,
				'szCode' => $kode
			];
			$cekdata  = $this->Mglobal->getWhere("tbl_mapel", $where)->row();
			if ($cekdata != null) {
				if ($nama_old == $nama_new) {
					$param = 'lolos';
				} else {
					$ceknama  = $this->Mglobal->getWhere("tbl_mapel", ['szName' => $nama_new])->num_rows();
					if ($ceknama == 0) {
						$param = 'lolos';
					} else {
						$param = 'ready';
					}
				}
				if ($param == 'lolos') {
					$data = [
						'szName'         => strtoupper($nama_new),
						'szStatus'       => $radio_group,
						'szAbbreviation' => strtoupper($singkatan),
						'dtmUpdated'         => date('Y-m-d H:i:s'),
						'szUserUpdated'      => $this->user_id,
					];
					$cekdb  = $this->Mglobal->update($data, "tbl_mapel", $where);
					if ($cekdb == 'TRUE') {
						$this->session->unset_userdata('csrf_token');
						$jsonmsg = [
							'hasil' => 'true',
							'pesan' => 'Data Berhasil Diupdate',
						];
						echo json_encode($jsonmsg);
					} else {
						$jsonmsg = [
							'hasil' => 'false',
							'pesan' => 'Data Gagal Diupdate',
						];
						echo json_encode($jsonmsg);
					}
				} else {
					$jsonmsg = [
						'hasil' => 'false',
						'pesan' =>  'Data Gagal Diupdate, Nama Sudah Tersedia',
					];
					echo json_encode($jsonmsg);
				}
			} else {
				errorform("404", "ID Tidak ditemukan Didatabase");
			}
		}
	}
}
