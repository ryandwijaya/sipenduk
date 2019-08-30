<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel', 'KelModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data User',
			'user' => $this->CrudModel->view_data('tb_user','user_date_created')
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/user/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['tambah'])){

			$data = array(	
				'user_nama' => $this->input->post('user_nama'),
				'user_username' => $this->input->post('user_username'),
				'user_password' => md5($this->input->post('user_password')),
				'user_level' => $this->input->post('user_level'),
			);
			$simpan = $this->CrudModel->insert('tb_user',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('user');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('user');
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
		$this->CrudModel->delete('penduduk_rt',$id,'tb_penduduk');
		$this->CrudModel->delete('rt_from_rw',$id,'tb_rt');
		$this->CrudModel->delete('rw_from_kel',$id,'tb_rw');
		$hapus = $this->CrudModel->delete('kel_id',$id,'tb_kel');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('kel');
		}else{
			redirect('kel');
		}
	}
}
