<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mglobal');
		$this->load->model('M_frontend');
	}
	public function index()
	{
		$data_galery = $this->M_frontend->grid_galery("6");
		$count_galery = $data_galery->num_rows();
		if($count_galery >= 2){
			$data['galery']  = $data_galery->result();
		}else{
			$data['galery']  = [];
		}
		
		$data['jumlah_foto']  = $count_galery;
		$data['slider']  = $this->Mglobal->getWhere("tbl_slider", ['szStatus' => 'ACTIVE'])->result();
		$data['ekstrakurikuler']  = $this->M_frontend->grid_eskul()->result();
		$this->load->view('forntend/v_dashboard', $data);
	}
	
	public function galery(){
		$this->load->view('forntend/v_gallery');
	 }
}
