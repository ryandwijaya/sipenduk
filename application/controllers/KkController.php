<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KkController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel', 'KelModel', 'KkModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data KK',
			'kk' => $this->KkModel->lihat_data(),
			'lurah' => $this->CrudModel->view_data('tb_kel','kel_date_created')
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/kk/index',$data);
        $this->load->view('backend/templates/footer',$data);
    }
    public function lihat($id){
        $data = array(
            'judul' => 'Data KK',
			'kk' => $this->KkModel->lihat_data_satuan($id),
			'keluarga' => $this->KkModel->get_keluarga($id)
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/kk/detail',$data);
        $this->load->view('backend/templates/footer',$data);
    }

    public function tambah(){
	if (isset($_POST['tambah'])){
			

			$config['upload_path'] = './upload/kk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('kk_foto')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(	
				'kk_no' => $this->input->post('kk_no'),
				'kk_kepala' => $this->input->post('kk_kepala'),
				'kk_alamat' => $this->input->post('kk_alamat'),
				'kk_rt' => $this->input->post('kk_rt'),
				'kk_kode_pos' => $this->input->post('kk_kode_pos'),
				'kk_penghasilan' => $this->input->post('kk_penghasilan'),
				'kk_foto' => $foto,
			);

				$simpan = $this->CrudModel->insert('tb_kk',$data);
				if ($simpan > 0){
					$this->session->set_flashdata('alert', 'success_post');
					redirect('kk');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('kk');
				}
			}
		}
	} 
	 public function register(){
	if (isset($_POST['tambah'])){
			

			$config['upload_path'] = './upload/kk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('kk_foto')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(	
				'kk_no' => $this->input->post('kk_no'),
				'kk_kepala' => $this->input->post('kk_kepala'),
				'kk_alamat' => $this->input->post('kk_alamat'),
				'kk_rt' => $this->input->post('kk_rt'),
				'kk_kode_pos' => $this->input->post('kk_kode_pos'),
				'kk_penghasilan' => $this->input->post('kk_penghasilan'),
				'kk_foto' => $foto,
			);

				$simpan = $this->CrudModel->insert('tb_kk',$data);
				if ($simpan > 0){
					$this->session->set_flashdata('alert', 'success_post');
					redirect('login');
				} else {
					$this->session->set_flashdata('alert', 'fail_edit');
					redirect('login');
				}
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
		$get = $this->KkModel->lihat_by_id($id);
		// echo '<pre>';
		// var_dump($get);exit();
		$this->CrudModel->delete('penduduk_kk_id',$get['kk_id'],'tb_penduduk');
		$hapus = $this->CrudModel->delete('kk_id',$id,'tb_kk');
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('kk');
		}else{
			redirect('kk');
		}
	}
}
