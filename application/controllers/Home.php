<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Mglobal', 'M_frontend']);
	}
	// Halaman Utama
	public function index()
	{
		$data = [
			'galery'          => $this->M_frontend->grid_galery(['limit' => 6])->result(),
			'slider'          => $this->Mglobal->getWhere("tbl_slider", ['szStatus' => 'ACTIVE'])->result(),
			'visi_misi'       => $this->Mglobal->get_order_where("tbl_visi_misi", 'id')->row(),
			'ekstrakurikuler' => $this->M_frontend->grid_eskul()->result(),
			'blogs'           => $this->M_frontend->grid_blog(['limit' => 3])->result(),
		];
		$this->load->view('forntend/v_dashboard', $data);
	}
	// Galeri dengan Pagination
	public function galery()
	{
		$this->load->library('pagination');
		$config = $this->_pagination_config([
			'base_url'    => base_url('gallery'),
			'total_rows'  => $this->M_frontend->count_gallery(),
			'uri_segment' => 2,
			'per_page'    => 6
		]);
		$this->pagination->initialize($config);
		$page = $this->uri->segment(2) ?: 0;
		$data = [
			'galery'     => $this->M_frontend->grid_galery(['limit' => $config['per_page'], 'offset' => $page])->result(),
			'pagination' => $this->pagination->create_links()
		];
		$this->load->view('forntend/v_gallery', $data);
	}
	// List Semua Blog dengan Pagination
	public function list_blog()
	{
		$this->load->library('pagination');
		$config = $this->_pagination_config([
			'base_url'    => base_url('blogs'),
			'total_rows'  => $this->M_frontend->count_blog(),
			'uri_segment' => 2,
			'per_page'    => 6
		]);
		$this->pagination->initialize($config);
		$page = $this->uri->segment(2) ?: 0;
		$data = [
			'blogs'      => $this->M_frontend->grid_blog(['limit' => $config['per_page'], 'offset' => $page])->result(),
			'pagination' => $this->pagination->create_links()
		];
		$this->load->view('forntend/f_blog/v_all_blog', $data);
	}
	// Detail Blog
	public function blog_detail($slug)
	{
		if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
			redirect('not-found');
		}
		$blog = $this->M_frontend->grid_blog(['slug' => $slug])->row();
		if (!$blog) {
			redirect('not-found');
		}
		$data = [
			'blog'          => $blog,
			'url_refresh'   => $slug,
			'recent_post'   => $this->M_frontend->grid_blog(['limit' => 3])->result(),
			'grid_kategori' => $this->Mglobal->get_order_where('tbl_kategori', 'id')->result()
		];
		$this->load->view('forntend/f_blog/v_blog_detail', $data);
	}
	// Konfigurasi Pagination Reusable
	private function _pagination_config($params)
	{
		return [
			'base_url'        => $params['base_url'],
			'total_rows'      => $params['total_rows'],
			'per_page'        => $params['per_page'],
			'uri_segment'     => $params['uri_segment'],
			'full_tag_open'   => '<ul class="pagination justify-content-center">',
			'full_tag_close'  => '</ul>',
			'first_link'      => 'First',
			'last_link'       => 'Last',
			'next_link'       => '<i class="far fa-arrow-right"></i>',
			'prev_link'       => '<i class="far fa-arrow-left"></i>',
			'first_tag_open'  => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li class="page-item">',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li class="page-item">',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li class="page-item">',
			'prev_tag_close'  => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a class="page-link" href="#">',
			'cur_tag_close'   => '</a></li>',
			'num_tag_open'    => '<li class="page-item">',
			'num_tag_close'   => '</li>',
			'attributes'      => ['class' => 'page-link']
		];
	}
}
