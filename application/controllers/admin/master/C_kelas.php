<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_kelas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->load->model('M_kls');
		$this->viewdata['load_grid']  = 'admin/master/C_kelas';
		$this->viewdata['url_tambah'] = 'admin/master/C_kelas/add';
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Master Data Kelas";
		$data['akses']     = "ON";
		$data['url_hapus'] = base_url('admin/master/C_kelas/hapus');
		$data['grid']      = $this->M_kls->grid_kelas()->result();
		$this->load->view('backend/v_kelas/v_grid_kelas', $data);
	}
	function add()
	{
		$data                   = $this->viewdata;
		$data['judul']          = 'Form Tambah Data Kelas';
		$data['url_insert']     = base_url('admin/master/C_kelas/insert');
		$data['grid_tingkatan'] = $this->Mglobal->get_order_where('tbl_tingkatan_kelas', 'id', ['szStatus'=> 'ACTIVE'])->result();
		$data['grid_jurusan']   = $this->Mglobal->get_order_where('tbl_jurusan', 'id', ['szStatus' => 'ACTIVE'])->result();
		$data['code']           = $this->Mglobal->get_counter("KLS", "tbl_kelas", "szCode");
		$this->load->view('backend/v_kelas/v_add_kelas', $data);
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
			$thn_ajaran    = $this->input->post('thn_ajaran');
			$tingkatan_kls = $this->input->post('tingkatan_kls');
			$jurusan       = $this->input->post('jurusan');
			$nama_output   = $this->input->post('nama_output');
			$nomor_kelas   = $this->input->post('nama_kls');
			$ceknama = $this->Mglobal->getWhere("tbl_kelas", ['szName' => $nama_output])->num_rows();
			if ($ceknama == 0) {
				$data = [
					'uuid'               => $this->uuid->v4(),
					'szCode'             => $this->Mglobal->get_counter("KLS", "tbl_kelas", "szCode"),
					'szStatus'           => 'INACTIVE',
					'szName'             => strtoupper($nama_output),
					'szSchoolYear'       => $thn_ajaran,
					'szJurusanId'        => $jurusan,
					'szTingkatanKelasId' => $tingkatan_kls,
					'szNumber'           => $nomor_kelas,
					'dtmCreated'         => date('Y-m-d H:i:s'),
					'szUserCreated'      => $this->user_id,
				];
				$cekdb  = $this->Mglobal->insert($data, 'tbl_kelas');
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
			} else {
				$jsonmsg = [
					'hasil' => 'false',
					'pesan' => 'Data Gagal Disimpan, Nama Kelas Sudah Terdaftar',
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
			$cekdata  = $this->Mglobal->getWhere("tbl_kelas", $where)->row();
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
						$cekdb  = $this->Mglobal->delete("tbl_kelas", $where);
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
		$cekdb  =  $this->M_kls->grid_kelas($uuid)->row();
		if ($cekdb != null) {
			$data                   = $this->viewdata;
			$data['judul']          = 'Form Edit Data kelas';
			$data['load_edit']      = 'admin/master/C_kelas/edit/' . $uuid;
			$data['url_update']     = base_url('admin/master/C_kelas/update');
			$data['grid_tingkatan'] = $this->Mglobal->get_order_where('tbl_tingkatan_kelas', 'id', ['szStatus' => 'ACTIVE'])->result();
			$data['grid_jurusan']   = $this->Mglobal->get_order_where('tbl_jurusan', 'id', ['szStatus' => 'ACTIVE'])->result();
			$data['grid']           = $cekdb;
			$this->load->view('backend/v_kelas/v_edit_kelas', $data);
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
			$uuid          = $this->input->post('uuid');
			$kode          = $this->input->post('kode');
			$thn_ajaran    = $this->input->post('thn_ajaran');
			$tingkatan_kls = $this->input->post('tingkatan_kls');
			$jurusan       = $this->input->post('jurusan');
			$nama_old      = $this->input->post('nama_old');
			$nama_output   = $this->input->post('nama_output');
			$nomor_kelas   = $this->input->post('nama_kls');
			$radio_group   = $this->input->post('radio_group');
			$where    = [
				'uuid'   => $uuid,
				'szCode' => $kode
			];
			$cekdata  = $this->Mglobal->getWhere("tbl_kelas", $where)->row();
			if ($cekdata != null) {
				if ($nama_old == $nama_output) {
					$param = 'lolos';
				} else {
					$ceknama  = $this->Mglobal->getWhere("tbl_kelas", ['szName' => $nama_output])->num_rows();
					if ($ceknama == 0) {
						$param = 'lolos';
					} else {
						$param = 'ready';
					}
				}
				if ($param == 'lolos') {
					$data = [
						'szStatus'           => $radio_group,
						'szName'             => strtoupper($nama_output),
						'szSchoolYear'       => $thn_ajaran,
						'szJurusanId'        => $jurusan,
						'szTingkatanKelasId' => $tingkatan_kls,
						'szNumber'           => $nomor_kelas,
						'dtmUpdated'         => date('Y-m-d H:i:s'),
						'szUserUpdated'      => $this->user_id,
					];
					$cekdb  = $this->Mglobal->update($data, "tbl_kelas", $where);
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
