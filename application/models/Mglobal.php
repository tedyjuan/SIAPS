<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mglobal extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

	}
	
	public function insert($data, $tabel)
	{
		$this->db->trans_strict(FALSE);
		$this->db->trans_start();
		$this->db->insert($tabel, $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return FALSE;
		} else {
			return $this->db->insert_id();
		}
	}


	public function update($data, $tabel, $where)
	{
		$this->db->trans_start();
		$this->db->trans_strict(FALSE);
		$this->db->where($where);
		$this->db->update("$tabel", $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} else {
			$this->db->trans_commit();
			return TRUE;
		}

	}

	public function simpan_multi($data, $tabel)
	{
		$this->db->insert_batch($tabel, $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function getWhere($table, $param)
	{
		$this->db->where($param);
		return $this->db->get($table);
	}
	
	public function delete($tabel, $where)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function get_order_where($table, $order = '', $where = '')
	{
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($order)) {
			$this->db->order_by("$order", "DESC");
		}
		return $this->db->get($table);
	}
	
	function get_counter($kode, $table, $field)
	{
		$kode = $this->db->escape_str($kode);
		$table = $this->db->escape_str($table);
		$field = $this->db->escape_str($field);

		$query = $this->db->query("
		SELECT COALESCE(
			CONCAT('$kode-', LPAD(CAST(SUBSTRING_INDEX($field, '-', -1) AS UNSIGNED) + 1, 5, '0')),
			'$kode-00001'
		) AS next_kode
		FROM $table
		WHERE $field LIKE '$kode-%'
		ORDER BY $field DESC
		LIMIT 1
	");

		// **Cek apakah hasil query ada**
		$result = $query->row();
		return $result ? $result->next_kode : "$kode-00001";  // Default jika tidak ada data
	}


	function get_produk($kode, $table, $field)
	{
		$kode = $this->db->escape_str($kode);
		$table = $this->db->escape_str($table);
		$field = $this->db->escape_str($field);
		$query = $this->db->query("SELECT IFNULL(
                CONCAT('$kode-', LPAD(
                    (CAST(SUBSTRING(MAX($field), 6) AS UNSIGNED) + 1), 5, '0')
                ), '$kode-00001') AS next_kode
            FROM $table");
		return $query->row()->next_kode;
	}

	function get_data_select($cari, $tabel, $field1, $field2)
	{
		$query =  $this->db->query("SELECT a.* 
							FROM $tabel AS a 
							WHERE (a.`$field1` LIKE '%$cari%' OR a.`$field2` LIKE '%$cari%')
        ");
		return $query->result_array();
	}
}
