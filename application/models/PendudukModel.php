<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_data(){
        $this->db->select('*');
        $this->db->from('tb_penduduk');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function lihat_satu_penduduk($id){
		$this->db->select('*');
		$this->db->from('tb_penduduk');
		$this->db->join('tb_kk','tb_kk.kk_id = tb_penduduk.penduduk_kk_id');
		$this->db->where('tb_penduduk.penduduk_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getPendudukByRT($id){
		$this->db->select('*');
        $this->db->from('tb_penduduk');
        $this->db->join('tb_kk','tb_kk.kk_id = tb_penduduk.penduduk_kk_id');
        $this->db->join('tb_rt','tb_rt.rt_id = tb_kk.kk_rt');
        $this->db->join('tb_rw','tb_rw.rw_id = tb_rt.rt_from_rw');
        $this->db->join('tb_kel','tb_kel.kel_id = tb_rw.rw_from_kel');
        $this->db->where('rt_id',$id);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getRT($key){
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_rw','tb_rw.rw_id = tb_rt.rt_from_rw');
        $this->db->join('tb_kel','tb_kel.kel_id = tb_rw.rw_from_kel');
        $this->db->where('tb_kel.kel_id',$key);
        $this->db->order_by('tb_rw.rw_nama','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function update($id,$data){
		$this->db->where('penduduk_id',$id);
		$this->db->update('tb_penduduk',$data);
		return $this->db->affected_rows();
	}

	public function hapus_produk($id){
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_penduduk');
		return $this->db->affected_rows();
	}
}
