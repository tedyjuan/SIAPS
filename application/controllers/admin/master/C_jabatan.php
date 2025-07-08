<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_jabatan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/master/C_jabatan';
		$this->viewdata['url_tambah'] = 'admin/master/C_jabatan/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Master Data Jabatan";
		$data['akses']     = "ON";
		$data['url_hapus'] = base_url('admin/master/C_jabatan/hapus');
		$data['grid']      = $this->Mglobal->get_order_where('tbl_jabatan', 'id')->result();
		$this->load->view('backend/v_jabatan/v_grid_jabatan', $data);
	}
	function add()
	{
		$data               = $this->viewdata;
		$data['judul']      = 'Form Tambah Data Jabatan';
		$data['url_insert'] = base_url('admin/master/C_jabatan/insert');
		$data['code']       = $this->Mglobal->get_counter("JBN", "tbl_jabatan", "szCode");
		$this->load->view('backend/v_jabatan/v_add_jabatan', $data);
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
			$nm_jabatan       = trim($this->input->post('nm_jabatan'));
			$lvl_jabatan      = $this->input->post('lvl_jabatan');
			$multilvl_jabatan = $this->input->post('multilvl_jabatan');
			$desc_text        = $this->input->post('desc_text');
			$cekdata = $this->Mglobal->getWhere("tbl_jabatan", ['szName' => $nm_jabatan])->num_rows();
			if ($cekdata == 0) {
				$data = [
					'uuid'            => $this->uuid->v4(),
					'szCode'          => $this->Mglobal->get_counter("JBN", "tbl_jabatan", "szCode"),
					'szName'          => strtoupper($nm_jabatan),
					'szStatus'        => 'INACTIVE',
					'szLevel'         => $lvl_jabatan,
					'szMultipleLevel' => $multilvl_jabatan,
					'szDescription'   => $desc_text,
					'dtmCreated'      => date('Y-m-d H:i:s'),
					'szUserCreated'   => $this->user_id,
				];
				$cekdb  = $this->Mglobal->insert($data, 'tbl_jabatan');
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
			$cekdata  = $this->Mglobal->getWhere("tbl_jabatan", $where)->row();
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
						$cekdb  = $this->Mglobal->delete("tbl_jabatan", $where);
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
		$cekdb  = $this->Mglobal->getWhere("tbl_jabatan", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Form Edit Data Jabatan';
			$data['load_edit']  = 'admin/master/C_jabatan/edit/' . $uuid;
			$data['url_update'] = base_url('admin/master/C_jabatan/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_jabatan/v_edit_jabatan', $data);
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
			$uuid             = $this->input->post('uuid');
			$kode             = $this->input->post('kode');
			$nama_old         = $this->input->post('nama_old');
			$radio_group      = $this->input->post('radio_group');
			$nm_jabatan       = trim($this->input->post('nm_jabatan'));
			$lvl_jabatan      = $this->input->post('lvl_jabatan');
			$multilvl_jabatan = $this->input->post('multilvl_jabatan');
			$desc_text        = $this->input->post('desc_text');
			$where    = [
				'uuid'   => $uuid,
				'szCode' => $kode
			];
			$cekdata  = $this->Mglobal->getWhere("tbl_jabatan", $where)->row();
			if ($cekdata != null) {
				if ($nama_old == $nm_jabatan) {
					$param = 'lolos';
				} else {
					$ceknama  = $this->Mglobal->getWhere("tbl_jabatan", ['szName' => $nm_jabatan])->num_rows();
					if ($ceknama == 0) {
						$param = 'lolos';
					} else {
						$param = 'ready';
					}
				}
				if ($param == 'lolos') {
					$data = [
						'szName'         => strtoupper($nm_jabatan),
						'szStatus'       => $radio_group,
						'szLevel'         => $lvl_jabatan,
						'szMultipleLevel' => $multilvl_jabatan,
						'szDescription'   => $desc_text,
						'dtmUpdated'     => date('Y-m-d H:i:s'),
						'szUserUpdated'  => $this->user_id,
					];
					$cekdb  = $this->Mglobal->update($data, "tbl_jabatan", $where);
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
