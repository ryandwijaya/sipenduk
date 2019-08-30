<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BantuanModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lihat_data(){
        $this->db->select('*');
        $this->db->from('tb_bantuan');
        $this->db->order_by('bantuan_date_created','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function lihat_satu_data($id){
        $this->db->select('*');
        $this->db->from('tb_bantuan');
        $this->db->where('bantuan_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_one_bantuan($dari,$jenis,$periode){
        $this->db->select('*');
        $this->db->from('tb_bantuan');
        $this->db->where('bantuan_dari',$dari);
        $this->db->where('bantuan_jenis',$jenis);
        $this->db->where('bantuan_periode',$periode);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function lihat_penerima_bantuan($id){
        $this->db->select('*');
        $this->db->from('tb_penerima_bantuan');
        $this->db->join('tb_kk','tb_kk.kk_id = tb_penerima_bantuan.penerima_kk_id');
        $this->db->join('tb_bantuan','tb_bantuan.bantuan_id = tb_penerima_bantuan.penerima_kk_bantuan');
        $this->db->where('penerima_kk_bantuan',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($id,$data){
        $this->db->where('bantuan_id',$id);
        $this->db->update('tb_bantuan',$data);
        return $this->db->affected_rows();
    }
    
}


