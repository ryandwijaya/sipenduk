<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RTModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lihat_data(){
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_rw','tb_rw.rw_id = tb_rt.rt_from_rw');
        $this->db->join('tb_kel','tb_kel.kel_id = tb_rw.rw_from_kel');
        $this->db->order_by('tb_rw.rw_nama','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function lihat_by_id($id){
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_kk','tb_kk.kk_rt = tb_rt.rt_id');
        $this->db->join('tb_penduduk','tb_penduduk.penduduk_kk_id = tb_kk.kk_id');
        $this->db->where('tb_rt.rt_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}


