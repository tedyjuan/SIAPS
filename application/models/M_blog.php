<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_blog extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function grid_blog($uuid = null)
	{
		$this->db->select('a.*');
		$this->db->from('tbl_blog a');
		$this->db->join('tbl_kategori b', 'b.szCode = a.szKategoryId', 'inner');
		if($uuid != null){
			$this->db->where('a.uuid', $uuid);
		}
		return $this->db->get();
	}

}
