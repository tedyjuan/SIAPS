<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_frontend extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function grid_eskul()
	{
		$this->db->select('a.*');
		$this->db->from('tbl_eskul a');
		$this->db->where('a.szStatus', 'ACTIVE');
		$this->db->where('a.szCode <>', 'EXS-00001'); 
		return $this->db->get();
	}
	// Di M_frontend.php
	public function grid_blog($params = [])
	{
		$limit  = isset($params['limit']) ? $params['limit'] : 6;
		$offset = isset($params['offset']) ? $params['offset'] : 0;
		$slug   = isset($params['slug']) ? $params['slug'] : null;

		$this->db->select('a.*, b.szName as nm_kat');
		$this->db->from('tbl_blog a');
		$this->db->join('tbl_kategori b', 'b.szCode = a.szKategoryId', 'inner');
		$this->db->where('a.szStatus', 'PUBLISH');

		if ($slug !== null) {
			$this->db->where('a.szSlug', $slug);
		}

		// Kalau nanti ada pencarian kategori
		// if (isset($params['kategori_id'])) {
		// 	$this->db->where('a.szKategoryId', $params['kategori_id']);
		// }

		// Kalau nanti ada keyword pencarian
		// if (isset($params['keyword'])) {
		// 	$this->db->like('a.szTitle', $params['keyword']);
		// }

		$this->db->order_by('a.dtmCreated', 'desc');
		$this->db->limit($limit, $offset);

		return $this->db->get();
	}


	public function count_blog()
	{
		$this->db->from('tbl_blog');
		$this->db->where('szStatus', 'PUBLISH');
		return $this->db->count_all_results();
	}
	public function grid_galery($params = [])
	{
		$limit  = isset($params['limit']) ? $params['limit'] : 6;
		$offset = isset($params['offset']) ? $params['offset'] : 0;
		$this->db->select('a.*');
		$this->db->from('tbl_gallery a');
		// $this->db->where('a.szStatus', 'ACTIVE');
		$this->db->order_by('a.dtmCreated', 'desc');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}
	
	public function count_gallery()
	{
		$this->db->from('tbl_gallery');
		// $this->db->where('szStatus', 'ACTIVE');
		return $this->db->count_all_results(); 
	}
	


}
