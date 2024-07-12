<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getCategory()
	{
		$query = $this->db->get('tb_category');
		return $query->result_array();
	}

	function getCategoryById($category_id)
	{
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('tb_category');
		return $query->row_array();
	}

//------ Memasukkan data ke Database ------

	function insertCategory($data)
	{
		$this->db->insert('tb_category', $data);
		return $this->db->insert_id();
	}

//------ Edit data dari Database ------

	function updateCategory($data)
	{
		$this->db->where('category_id', $data['category_id']);
        return $this->db->update('tb_category', $data);
	}

//------ Hapus data dari Database ------

	function deleteCategory($category_id)
	{
		
		$this->db->where('category_id', $category_id);
		$this->db->delete('tb_category');
	}

}
