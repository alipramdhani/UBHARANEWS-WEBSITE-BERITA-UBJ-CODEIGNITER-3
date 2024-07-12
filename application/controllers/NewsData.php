<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsData extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_news');
		$this->load->model('M_category');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		// $this->load->library('pagination'); // Add this line to load the pagination library
	}

	// public function viewsNewsData()
	// {
	// 	$data['queryAllNews'] = $this->M_news->getNewsData();
	// 	if (empty($data['queryAllNews'])) {
	// 		$data['error_message'] = 'Data Tidak Ada, Silahkan Tambah Data.';
	// 	}

	// 	$this->load->view('/newsData_views', $data);
	// }
	public function viewsNewsData()
	{
		$data['queryAllNews'] = $this->M_news->getNewsData();
		if (empty($data['queryAllNews'])) {
			$data['error_message'] = 'Data Tidak Ada, Silahkan Tambah Data.';
		}

		$this->load->view('/newsData_views', $data);
	}

    public function addNewsData()
	{
		
		$data['queryAllCategory'] = 
		$this->M_category->getCategory();

		$this->load->view('/newsData_add', $data);
	}
	public function loadAdd()
	{
		$config['upload_path']          = './assets/dbimages/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			  $this->load->view('upload_form', $error);
		}
		else
		{
			$ArrInsert = array(
				'news_code' => $this->input->post('news_code'),
				'news_headline' => $this->input->post('news_headline'),
				'news_content' => $this->input->post('news_content'),
				'news_category' => $this->input->post('news_category'),
				'news_publish' => $this->input->post('news_publish'),
				'news_reporter' => $this->input->post('news_reporter'),
				'news_editor' => $this->input->post('news_editor'),
				'news_images' => $this->upload->data()['file_name'],
				
			);
				$this->M_news->insertNewsData($ArrInsert);
				$this->session->set_flashdata('message', 'Data Berhasil Ditambah !');
			  redirect(base_url('/admin/data-berita'));
		}
	}

	public function updateNewsData($news_code)
	{
		$data['queryAllNews'] = $this->M_news->getNewsById($news_code);
		$data['queryAllCategory'] = $this->M_category->getCategory();
		
		$this->load->view('/newsData_update', $data);
	}
	public function loadUpdate($news_code)
	{
		$config['upload_path']          = './assets/dbimages/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ($_FILES['userfile']['name']) {
			// Jika ada file baru yang diunggah
			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			} else {
				// Jika upload berhasil, update data dengan gambar baru
				$data = $this->upload->data();

				// Hapus gambar lama dari direktori file
				$news = $this->db->get_where('tb_news', array('news_code' => $news_code))->row();

				// Hapus gambar terkait jika ada
				if (!empty($news->news_images)) {
					// Buat path lengkap menuju gambar
					$path_to_image = './assets/dbimages/' . $news->news_images;
			
					// Hapus gambar jika ada di folder
					if (file_exists($path_to_image)) {
						unlink($path_to_image);
					}
				}
				$ArrInsert = array(
					'news_code' => $news_code,
					'news_headline' => $this->input->post('news_headline'),
					'news_content' => $this->input->post('news_content'),
					'news_category' => $this->input->post('news_category'),
					'news_publish' => $this->input->post('news_publish'),
					'news_reporter' => $this->input->post('news_reporter'),
					'news_editor' => $this->input->post('news_editor'),
					'news_images' => $this->upload->data()['file_name'],
					
				);
					$this->M_news->updateNewsData($news_code, $ArrInsert);
					$this->session->set_flashdata('message', 'Data Berhasil Diubah!');
				redirect(base_url('/admin/data-berita'));
			}
		} else {
			$ArrInsert = array(
				'news_code' => $news_code,
				'news_headline' => $this->input->post('news_headline'),
				'news_content' => $this->input->post('news_content'),
				'news_category' => $this->input->post('news_category'),
				'news_publish' => $this->input->post('news_publish'),
				'news_reporter' => $this->input->post('news_reporter'),
				'news_editor' => $this->input->post('news_editor'),
				
				
			);
				$this->M_news->updateNewsData($news_code, $ArrInsert);
				$this->session->set_flashdata('message', 'Data Berhasil Diubah!');
			redirect(base_url('/admin/data-berita'));
		}
		
	}
	public function loadDelete($news_code) {
		 // Dapatkan informasi berita berdasarkan kode berita
		 $news = $this->db->get_where('tb_news', array('news_code' => $news_code))->row();

		 // Hapus gambar terkait jika ada
		 if (!empty($news->news_images)) {
			 // Buat path lengkap menuju gambar
			 $path_to_image = './assets/dbimages/'. $news->news_images;
	 
			 // Hapus gambar jika ada di folder
			 if (file_exists($path_to_image)) {
				 unlink($path_to_image);
			 }
		 }
	 
		 // Hapus data berita dari database
		$this->M_news->deleteNewsData($news_code);
		$this->session->set_flashdata('message', 'Data Berhasil Dihapus!');
		redirect(base_url('/admin/data-berita'));
	}

}