<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_visi_misi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		check_role(['ROLE-00001']);
		$this->load->model('Mglobal');
		$this->viewdata['load_grid']  = 'admin/master/C_visi_misi';
		$this->viewdata['url_update']  = 'admin/master/C_visi_misi/update';
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data              = $this->viewdata;
		$data['judul']     = "Master Visi Misi";
		$data['grid']      = $this->Mglobal->get_order_where('tbl_visi_misi', 'id')->row();
		$this->load->view('backend/v_visi_misi/v_grid_visi_misi', $data);
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
			$uuid = $this->input->post('uuid');
			$visi = $this->input->post('visi');
			$misi = $this->input->post('misi');
		
			$data = [
				'szVisi'        => $visi,
				'szMisi'        => $misi,
				'dtmUpdated'    => date('Y-m-d H:i:s'),
				'szUserUpdated' => $this->user_id,
			];
			$cekdb  = $this->Mglobal->update($data, "tbl_visi_misi", ['uuid'=> $uuid]);
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
		}
	}
}
