<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function getNewsData()
    {
		$query = $this->db->get('tb_news');
		return $query->result_array();
	}

	function getNewsById($news_code)
	{
		$this->db->where('news_code', $news_code);
		$query = $this->db->get('tb_news');
		return $query->row_array();
	}

//------ Memasukkan data ke Database ------

	function insertNewsData($data)
	{
		$this->db->insert('tb_news', $data);
		return $this->db->insert_id();
	}

//------ Edit data dari Database ------

	function updateNewsData($news_code, $data)
	{
		$this->db->where('news_code', $news_code);
		$this->db->update('tb_news', $data);
	}

//------ Hapus data dari Database ------

	function deleteNewsData($news_code)
	{
		
		$this->db->where('news_code', $news_code);
		$this->db->delete('tb_news');
	}

//----------- limit kata ----------- 
	public function fetch_news($limit, $start)
{
    $this->db->limit($limit, $start);
    $query = $this->db->get("tb_news");
    
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

//----------- Carousel ----------- 
    public function get_latest_slides($limit = 5) {
        $this->db->order_by('news_publish', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('tb_news'); // Ganti 'tb_news' dengan nama tabel yang sesuai
        return $query->result();
    }
//----------- Berdasarkan Bulan -----------
	public function get_current_month_slides() {
        $this->db->where('MONTH(news_publish)', date('m'));
        $this->db->where('YEAR(news_publish)', date('Y'));
        $query = $this->db->get('tb_news'); // Ganti 'tb_news' dengan nama tabel yang sesuai
        return $query->result();
    }
	public function get_news_by_category($category)
	{
		$this->db->where('news_category', $category); // Mengambil data berita berdasarkan kategori
		$query = $this->db->get('tb_news'); // Mengambil data dari tabel 'news'

		return $query->result(); // Mengembalikan hasil query
	}
	public function get_all_ulasans() {
        $query = $this->db->get('tb_ulasan'); // Ganti 'komentar' dengan nama tabel yang sesuai
        return $query->result();
    }

	// public function get_count() {
    //     return $this->db->count_all('tb_news');
    // }

    // public function get_news($limit, $start) {
    //     $this->db->limit($limit, $start);
    //     $query = $this->db->get('tb_news');
    //     return $query->result_array();
    // }
}
