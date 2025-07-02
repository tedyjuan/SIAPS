<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kls extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function grid_kelas($param = null)
	{
		$this->db->select('a.*, 
							b.szAbbreviation AS sing_jurusan, 
							b.szName AS nm_jurusan, 
							c.szAbbreviation AS sing_ting_kls, 
							c.szName AS nm_kls');
		$this->db->from('tbl_kelas a');
		$this->db->join('tbl_jurusan b', 'b.szCode = a.szJurusanId', 'inner');
		$this->db->join('tbl_tingkatan_kelas c', 'c.szCode = a.szTingkatanKelasId', 'inner');
		if($param != null){
			$this->db->where('a.uuid',$param);
		}
		return $this->db->get();
	}

}
