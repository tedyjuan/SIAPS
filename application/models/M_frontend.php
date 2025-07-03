<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_frontend extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function grid_galery($limit = null, $uuid = null)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_gallery a');
		$this->db->where('a.szStatus', 'ACTIVE');
		if($uuid != null){
			$this->db->where('a.uuid', $uuid);
		}
		$this->db->order_by('a.id', 'DESC'); 
		if ($limit != null) {
			$this->db->limit($limit, 0);
		}
		return $this->db->get();
	}
	function grid_eskul()
	{
		$this->db->select('a.*');
		$this->db->from('tbl_eskul a');
		$this->db->where('a.szStatus', 'ACTIVE');
		$this->db->where('a.szCode <>', 'EXS-00001'); 
		return $this->db->get();
	}
	function grid_blog($slug = null)
	{
 		$this->db->select('a.*, b.szName as nm_kat ');
		$this->db->from('tbl_blog a');
		$this->db->join('tbl_kategori b', 'b.szCode = a.szKategoryId', 'inner');
		$this->db->where('a.szStatus', 'PUBLISH');
		if($slug != null){
			$this->db->where('a.szSlug', $slug);
		}
		 $this->db->order_by('a.dtmCreated', 'desc');
		$this->db->limit('3');
		return $this->db->get();
	}

}
