<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RwController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RWModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data `rw',
			'rw' => $this->RWModel->lihat_data('tb_rw','rw_date_created')
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/rw/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['simpan'])){

			$data = array(	
				'rw_nama' => $this->input->post('rw_nama'),
				'rw_from_kel' => $this->input->post('rw_from_kel')
			);
			$simpan = $this->CrudModel->insert('tb_rw',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('rw');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('rw');
			}
		}else{
			$data = array(
            'judul' => 'Tambah Data RW',
            'kel' => $this->RWModel->get_kel()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/rw/create',$data);
        	$this->load->view('backend/templates/footer');
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

	public function hapus($id){
		$get = $this->RWModel->lihat_by_id($id);
		// echo '<pre>';
		// var_dump($get);exit();
		$this->CrudModel->delete('penduduk_kk_id',$get['kk_id'],'tb_penduduk');
		$this->CrudModel->delete('kk_rt',$get['rt_id'],'tb_kk');
		$this->CrudModel->delete('rt_from_rw',$get['rw_id'],'tb_rt');
		$hapus = $this->CrudModel->delete('rw_id',$id,'tb_rw');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('rw');
		}else{
			redirect('rw');
		}
	}
}
