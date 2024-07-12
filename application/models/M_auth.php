<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function loginAdmin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password',$password);
        $query = $this->db->get('tb_admin');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

}
