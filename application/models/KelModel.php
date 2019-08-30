<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function lihat_data(){
        $this->db->select('*');
        $this->db->from('tb_kel');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function lihat_by_id($id){
        $this->db->select('*');
        $this->db->from('tb_kel');
        $this->db->join('tb_rw','tb_rw.rw_from_kel = tb_kel.kel_id');
        $this->db->join('tb_rt','tb_rt.rt_from_rw = tb_rw.rw_id');
        $this->db->join('tb_kk','tb_kk.kk_rt = tb_rt.rt_id');
        $this->db->join('tb_penduduk','tb_penduduk.penduduk_kk_id = tb_kk.kk_id');
        $this->db->where('tb_kel.kel_id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function hapusPenduduk($id){
        $this->db
    ->from ('tb_kel')
    ->join ('tb_rw', 'tb_rw.rw_from_kel = tb_kel.kel_id')
    ->join ('tb_rt', 'tb_rt.rt_from_rw = tb_rw.rw_id')
    ->join ('tb_kk', 'tb_kk.kk_rt = tb_rt.rt_id')
    ->where ('tb_kel.kel_id', $id);

/* 
 * get the original DELETE SQL, in our case:
 * "DELETE FROM `cookies` JOIN `recipes` ON `recipes`.`cookie`=`cookies`.`id` WHERE `recipes`.`rating`='BAD'"
 */
    $sql = $this->db->get_compiled_delete ('tb_kel');
    return $this->$sql;
    }


    
}


