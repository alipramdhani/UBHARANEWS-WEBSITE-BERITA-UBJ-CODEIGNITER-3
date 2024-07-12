<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAdmin extends CI_Controller
{
	
    public function __construct()
	{
		parent::__construct();
        $this->load->model('M_auth');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
	}
    public function dashboard()
	{
		$this->load->view('/admin_dashboard');
	}
    public function lPageAdmin()
	{
		$this->load->view('/admin_landingpage');
	}
    public function loadLogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username) && empty($password)) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-dismissible fade show d-flex p-0 m-0 auto-close" role="alert" style="font-size: 12px; color: red; height:auto;">
            Username dan Password tidak boleh kosong!
            <button type="button" class="p-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect(base_url('/admin'));
            return;
        } elseif (empty($username)) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-dismissible fade show d-flex p-0 m-0" role="alert" style="font-size: 12px; color: red; height:auto;">
            Username tidak boleh kosong!
            <button style="padding: 14px;" type="button" class="p-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            '); 
            redirect(base_url('/admin'));
            return;
            
        } elseif (empty($password)) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-dismissible fade show d-flex p-0 m-0" role="alert" style="font-size: 12px; color: red; height:auto;">
            Password tidak boleh kosong!
            <button style="padding: 14px;" type="button" class="p-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect(base_url('/admin'));
            return;
        
        }
        $admin = $this->M_auth->loginAdmin($username, $password);
        if ($admin) {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('id_user', $admin->admin_id);
            $this->session->set_userdata('username', $admin->username);
            $this->session->set_flashdata('message', ' Selamat, Login Berhasil!');
            redirect(base_url('/admin/dashboard-admin'));
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-dismissible fade show d-flex p-0 m-0" role="alert" style="font-size: 12px; color: red; height:auto;">
            Username atau Password salah!
            <button style="padding: 14px;" type="button" class="p-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          ');
            redirect(base_url('/lpageAdmin'));
        }
    }

}