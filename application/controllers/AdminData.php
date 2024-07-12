<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminData extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		
		
	}
    public function viewsAdminData()
	{
		$data['queryAllAdmin'] = $this->M_admin->getAdminData();

		if (empty($data['queryAllAdmin'])) {
			$data['error_message'] = 'Data Tidak Ada, Silahkan Tambah Data.';
		}

		$this->load->view('/admin_views', $data);
	}
	
    public function addAdmin()
	{
		$this->load->view('/admin_add');
	}
	public function loadAdd()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    	$ArrInsert = array(
			'admin_id' => $this->input->post('admin_id'),
			'admin_name' => $this->input->post('admin_name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'hashed_password' => password_hash('password', PASSWORD_DEFAULT),
			'createAt' => $date->format('Y-m-d H:i:s'),
			'updateAt' => $date->format('Y-m-d H:i:s'),
		);
			$this->M_admin->insertAdminData($ArrInsert);
			$this->session->set_flashdata('message', 'Data Berhasil Ditambah!');
		  redirect(base_url('/admin/data-admin'));
	}

	public function loadUpdate($admin_id)
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$ArrInsert = array(
			'admin_id' => $admin_id,
			'admin_name' => $this->input->post('admin_name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'hashed_password' => password_hash('password', PASSWORD_DEFAULT),
			'createAt' => $this->input->post('createAt'),
			'updateAt' => $date->format('Y-m-d H:i:s'),
		);
			$this->M_admin->updateAdminData($ArrInsert);
			$this->session->set_flashdata('message', 'Data Berhasil Diubah!');
		  redirect(base_url('/admin/data-admin'));
		
	}
	public function loadDelete($admin_id) {
		
		 // Hapus data kategori dari database
		$this->M_admin->deleteAdminData($admin_id);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
		redirect(base_url('/admin/data-admin'));
	}
}