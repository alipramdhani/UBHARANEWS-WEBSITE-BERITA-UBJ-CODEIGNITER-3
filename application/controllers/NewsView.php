<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsView extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_news');
		$this->load->helper(array('url'));
		$this->load->library('session','pagenation');
	}
    public function newsDashboard()
	{
        $data['slides'] = $this->M_news->get_latest_slides();
		$data['terkinis'] = $this->M_news->get_current_month_slides();
		$data['universitas'] = $this->M_news->get_news_by_category('universitas'); // Mengambil data berita berdasarkan kategori universitas
		$data['fakultas'] = $this->M_news->get_news_by_category('fakultas');
		$data['olahragas'] = $this->M_news->get_news_by_category('olahraga');
		$data['prestasis'] = $this->M_news->get_news_by_category('prestasi');
		$data['ulasans'] = $this->M_news->get_all_ulasans();
		$this->load->view('/news', $data);
	}
    public function newsDetail($news_code)
	{
		$data['terkinis'] = $this->M_news->get_current_month_slides();
		$data['queryAllNews'] = $this->M_news->getNewsById($news_code);

		$this->load->view('newsDetail', $data);
	}
	public function  limit_words($string, $word_limit) {
        $words = explode(' ', $string);
        return implode(' ', array_slice($words, 0, $word_limit)) . '...';
    }
	public function universitas()
	{
		$data['universitas'] = $this->M_news->get_news_by_category('universitas');
		$this->load->view('/navbarUniversitas', $data);
	}
	public function fakultas()
	{
		$data['fakultas'] = $this->M_news->get_news_by_category('fakultas');
		$this->load->view('/navbarFakultas', $data);
	}
	public function olahraga()
	{
		$data['olahragas'] = $this->M_news->get_news_by_category('olahraga');
		$this->load->view('/navbarOlahraga', $data);
	}
	public function prestasi()
	{
		$data['prestasis'] = $this->M_news->get_news_by_category('prestasi');
		$this->load->view('/navbarPrestasi', $data);
	}
}