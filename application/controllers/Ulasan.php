<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_ulasan');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		
		
	}
   public function viewUlasan()
   {
        $data['ulasans'] = $this->M_ulasan->getUlasan();

        if (empty($data['ulasans'])) {
            $data['error_message'] = 'Data Tidak Ada, Silahkan Tambah Data.';
        }

        $this->load->view('/ulasan_views', $data);
   }
	public function addUlasan()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $ulasan = $this->input->post('ulasan');

        if (strlen($ulasan) > 400) {
            $this->session->set_flashdata('message', 'Komentar tidak boleh lebih dari 250 karakter!');
            redirect(base_url('/'));
        } else {
            $ArrInsert = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'ulasan' => $ulasan,
                'created_at' => $date->format('Y-m-d H:i:s'),
            );
            $this->M_ulasan->insertUlasan($ArrInsert);
            $this->session->set_flashdata('message', 'Berhasil Menambahkan Ulasan!');
            redirect(base_url('/'));
        }
	}
    public function deleteUlasan($ulasan_id)
	{
        $this->M_ulasan->deleteUlasan($ulasan_id);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
		redirect(base_url('/admin/data-ulasan'));
    }

}