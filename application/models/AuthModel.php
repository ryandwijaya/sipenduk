<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getUser(){
        $this->db->order_by('user_date_created','DESC');
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }
    function getUsers($user){
        return $this->db->get_where('tb_user',$user);
    }
    function get_kk($kk){
        return $this->db->get_where('tb_kk',$kk);
    }

    
    function getUserAccount($user){
        $query = $this->db->get_where('tb_user',$user);
        return $query->row_array();
    }
    function getKK($kk){
        $query = $this->db->get_where('tb_kk',$kk);
        return $query->row_array();
    }
    function getUserByUsername($username)
    {
        $this->db->from('tb_user');
        $this->db->where('user_username',$username);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}


