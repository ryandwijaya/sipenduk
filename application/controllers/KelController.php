<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel', 'KelModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Kelurahan',
			'rt' => $this->KelModel->lihat_data()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/lurah/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['tambah'])){

			$data = array(	
				'kel_nama' => $this->input->post('kel_nama')
			);
			$simpan = $this->CrudModel->insert('tb_kel',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('kel');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('kel');
			}
		}
	}


	public function update(){
		if (isset($_POST['update'])){
			$id = $this->input->post('kategori_id');
			$kategori = $this->input->post('kategori');
			$data = array(
				'kategori_nama' => $kategori,
			);
			$update = $this->KategoriModel->update_kategori($id,$data);
			if ($update > 0){
				$this->session->set_flashdata('alert', 'success_change');
				redirect('admin/kategori');
			}
			else{
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('admin/kategori');
			}
		}
	}

	public function delete($id){
		$get = $this->KelModel->lihat_by_id($id);
		// echo '<pre>';
		// var_dump($get);exit();
		$this->CrudModel->delete('penduduk_kk_id',$get['kk_id'],'tb_penduduk');
		$this->CrudModel->delete('kk_rt',$get['rt_id'],'tb_kk');
		$this->CrudModel->delete('rt_from_rw',$get['rw_id'],'tb_rt');
		$this->CrudModel->delete('rw_from_kel',$get['kel_id'],'tb_rw');
		$hapus = $this->CrudModel->delete('kel_id',$id,'tb_kel');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('kel');
		}else{
			redirect('kel');
		}
	}
}
