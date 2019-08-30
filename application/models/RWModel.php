<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RWModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lihat_data(){
        $this->db->select('*');
        $this->db->from('tb_rw');
        $this->db->join('tb_kel','tb_kel.kel_id = tb_rw.rw_from_kel');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_kel(){
        $this->db->select('*');
        $this->db->from('tb_kel');
        $query = $this->db->get();
        return $query->result_array();
    }
     public function lihat_by_id($id){
        $this->db->select('*');
        $this->db->from('tb_rw');
        $this->db->join('tb_rt','tb_rt.rt_from_rw = tb_rw.rw_id');
        $this->db->join('tb_kk','tb_kk.kk_rt = tb_rt.rt_id');
        $this->db->join('tb_penduduk','tb_penduduk.penduduk_kk_id = tb_kk.kk_id');
        $this->db->where('tb_rw.rw_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
}


