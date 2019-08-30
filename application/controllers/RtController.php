<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RtController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data RT',
			'rt' => $this->RTModel->lihat_data()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/rt/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['simpan'])){

			$data = array(	
				'rt_nama' => $this->input->post('rt_nama'),
				'rt_from_rw' => $this->input->post('rt_from_rw')
			);
			$simpan = $this->CrudModel->insert('tb_rt',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('rt');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('rt');
			}
		}else{
			$data = array(
            'judul' => 'Tambah Data RT',
            'rw' => $this->CrudModel->get_rw()
        	);
        	// echo '<pre>';
        	// var_dump($data['rw']);
        	// exit();
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/rt/create',$data);
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
		$get = $this->RTModel->lihat_by_id($id);
		// echo '<pre>';
		// var_dump($get);exit();
		$this->CrudModel->delete('penduduk_kk_id',$get['kk_id'],'tb_penduduk');
		$this->CrudModel->delete('kk_rt',$get['rt_id'],'tb_kk');
		$hapus = $this->CrudModel->delete('rt_id',$id,'tb_rt');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('rt');
		}else{
			redirect('rt');
		}
	}
}
