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
		$this->db->select('a.*,b.szName');
		$this->db->from('tbl_blog a');
		$this->db->join('tbl_kategori b', 'b.szCode = a.szKategoryId', 'inner');
		if($uuid != null){
			$this->db->where('a.uuid', $uuid);
		}
		return $this->db->get();
	}
	function filter($range = null, $search_cat = null, $search_status = null)
	{
		$this->db->select('a.*,b.szName');
		$this->db->from('tbl_blog a');
		$this->db->join('tbl_kategori b', 'b.szCode = a.szKategoryId', 'inner');
		if ($range != null) {
			if (strpos($range, ' to ') !== false) {
				// Ada rentang tanggal
				list($start_date, $end_date) = explode(' to ', $range);
				$this->db->where("DATE(a.dtmCreated) >=", $start_date);
				$this->db->where("DATE(a.dtmCreated) <=", $end_date);
			} else {
				// Hanya satu tanggal, anggap sebagai filter exact / 1 hari saja
				$this->db->where("DATE(a.dtmCreated)", $range);
			}

		}
		if($search_cat != null){
			$this->db->where('a.szKategoryId', $search_cat);
		}
		if($search_status != null){
			$this->db->where('a.szStatus', $search_status);
		}
		return $this->db->get();
	}

}
