<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ulasan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function getUlasan()
    {
        $query = $this->db->get('tb_ulasan');
        return $query->result_array();
    }
    
	function getUlasanById($ulasan_id)
	{
		$this->db->where('ulasan_id', $ulasan_id);
		$query = $this->db->get('tb_ulasan');
		return $query->row_array();
	}
//------ Memasukkan data ke Database ------

	function insertUlasan($data)
	{
		$this->db->insert('tb_ulasan', $data);
		return $this->db->insert_id();
	}
	function deleteUlasan($ulasan_id)
	{
		
		$this->db->where('ulasan_id', $ulasan_id);
		$this->db->delete('tb_ulasan');
	}


}
