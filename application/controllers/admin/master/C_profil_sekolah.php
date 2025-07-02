<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_profil_sekolah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/master/C_profil_sekolah';
		$this->viewdata['url_tambah'] = 'admin/master/C_profil_sekolah/add';
		$this->user_id = $this->session->userdata('user_id');

	}

	public function index()
	{
		$id    = '1';
		$param = ['id' => $id];
		$cekdb = $this->Mglobal->getWhere("tbl_sekolah", $param)->row();
		if ($cekdb != null) {
			$data               = $this->viewdata;
			$data['judul']      = 'Profil Sekolah';
			$data['load_grid']  = 'admin/master/C_profil_sekolah';
			$data['load_edit']  = 'admin/master/C_profil_sekolah/edit/' . $id;
			$data['url_update'] = base_url('admin/master/C_profil_sekolah/update');
			$data['grid']       = $cekdb;
			$this->load->view('backend/v_profilsekolah/v_grid_profilsekolah', $data);
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
			$uuid           = $this->input->post('uuid');
			$nm_sekolah     = $this->input->post('nm_sekolah');
			$kota           = $this->input->post('kota');
			$telpon_sekolah = $this->input->post('telpon_sekolah');
			$email_sekolah  = $this->input->post('email_sekolah');
			$alamat_sekolah = $this->input->post('alamat_sekolah');
			$where['uuid']    =  $uuid;
			$cekdata  = $this->Mglobal->getWhere("tbl_sekolah", $where)->row();
			if ($cekdata != null) {
				$data = [
					"szNameSchool"  => $nm_sekolah,
					"szAddress"     => $alamat_sekolah,
					"szCity"        => $kota,
					"szEmail"       => $email_sekolah,
					"szPhone"       => $telpon_sekolah,
					'dtmUpdated'    => date('Y-m-d H:i:s'),
					'szUserUpdated' => $this->user_id,
				];
				$cekdb  = $this->Mglobal->update($data, "tbl_sekolah", $where);
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
				errorform("404", "ID Tidak ditemukan Didatabase");
			}
		}
	}
}
