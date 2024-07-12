<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAdminData()
	{
		$query = $this->db->get('tb_admin');
		return $query->result_array();
	}

	function getAdminById($admin_id)
	{
		$this->db->where('admin_id', $admin_id);
		$query = $this->db->get('tb_admin');
		return $query->row_array();
	}

//------ Memasukkan data ke Database ------

	function insertAdminData($data)
	{
		$this->db->insert('tb_admin', $data);
		return $this->db->insert_id();
	}

//------ Edit data dari Database ------

	function updateAdminData($data)
	{
		$this->db->where('admin_id', $data['admin_id']);
        return $this->db->update('tb_admin', $data);
	}

//------ Hapus data dari Database ------

	function deleteAdminData($admin_id)
	{
		
		$this->db->where('admin_id', $admin_id);
		$this->db->delete('tb_admin');
	}

}
