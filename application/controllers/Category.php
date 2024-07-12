<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_category');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		
		
	}
    public function viewsCategory()
	{
		$data['queryAllCategory'] = $this->M_category->getCategory();

		if (empty($data['queryAllCategory'])) {
			$data['error_message'] = 'Data Tidak Ada, Silahkan Tambah Data.';
		}

		$this->load->view('/category_views', $data);
	}

    public function addCategory()
	{
		$this->load->view('/category_add');
	}
	public function loadAdd()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    	$ArrInsert = array(
        'category_id' => $this->input->post('category_id'),
        'category_name' => $this->input->post('category_name'),
        'createAt' => $date->format('Y-m-d H:i:s'),
        'updateAt' => $date->format('Y-m-d H:i:s'),
		);
			$this->M_category->insertCategory($ArrInsert);
			$this->session->set_flashdata('message', 'Data Berhasil Ditambah!');
		  redirect(base_url('/admin/data-kategori'));
	}

	public function loadUpdate($category_id)
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$ArrInsert = array(
			'category_id' => $category_id,
			'category_name' => $this->input->post('category_name'),
			'createAt' => $this->input->post('createAt'),
			'updateAt' => $date->format('Y-m-d H:i:s'),
		);
			$this->M_category->updateCategory($ArrInsert);
			$this->session->set_flashdata('message', 'Data Berhasil Diubah!');
		  redirect(base_url('/admin/data-kategori'));
		
	}
	public function loadDelete($category_id) {
		
		 // Hapus data kategori dari database
		$this->M_category->deleteCategory($category_id);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
		redirect(base_url('/admin/data-kategori'));
	}
}