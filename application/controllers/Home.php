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
		$data['blogs']  = $this->M_frontend->grid_blog()->result();
		$this->load->view('forntend/v_dashboard', $data);
	}
	
	public function galery(){
		$this->load->view('forntend/v_gallery');
	}
	public function list_blog(){
		$data = '';
		$this->load->view('forntend/f_blog/v_all_blog', $data);
	}

	 public function blog_detail($slug){
		if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
			redirect('not-found');
		}
		$blog  = $this->M_frontend->grid_blog($slug)->row();
		if($blog == null){
			redirect('not-found');
		}else{
			$data['blog']        = $blog;
			$data['url_refresh'] = $slug;
			$data['recent_post']  = $this->M_frontend->grid_blog()->result();
			$data['grid_kategori']      = $this->Mglobal->get_order_where('tbl_kategori', 'id')->result();
			$this->load->view('forntend/f_blog/v_blog_detail', $data);
		}
	 }

}
