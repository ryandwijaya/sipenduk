<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','PendudukModel','RtModel','KkModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Penduduk',
			'penduduk' => $this->CrudModel->view_data('tb_penduduk','penduduk_date_created')
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/penduduk/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function lihat_detail($id){
        $data = array(
            'judul' => 'Data Penduduk',
			'penduduk' => $this->PendudukModel->lihat_satu_penduduk($id)
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/penduduk/detail',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['simpan'])){

			$data = array(
				'penduduk_nik' => $this->input->post('penduduk_nik'),
				'penduduk_nama' => $this->input->post('penduduk_nama'),
				'penduduk_tempat_lahir' => $this->input->post('penduduk_tempat_lahir'),
				'penduduk_tgl_lahir' => $this->input->post('penduduk_tgl_lahir'),
				'penduduk_jk' => $this->input->post('penduduk_jk'),
				'penduduk_agama' => $this->input->post('penduduk_agama'),
				'penduduk_pend_terakhir' => $this->input->post('penduduk_pend_terakhir'),
				'penduduk_pekerjaan' => $this->input->post('penduduk_pekerjaan'),
				'penduduk_status' => $this->input->post('penduduk_status'),
				'penduduk_kk_id' => $this->input->post('kk_id'),
				'penduduk_pendapatan' => $this->input->post('penduduk_pendapatan'),
                'penduduk_status_hub' => $this->input->post('penduduk_status_hub')
			);
			$simpan = $this->CrudModel->insert('tb_penduduk',$data);
			if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('penduduk');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('penduduk');
			}
		}else{
			$data = array(
            'judul' => 'Tambah Penduduk',
			'kk' => $this->CrudModel->view_data('tb_kk','kk_date_created'),
			'rt' => $this->RtModel->lihat_data()

        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/penduduk/create',$data);
        	$this->load->view('backend/templates/footer');
		}
	}


	public function confirm($id){
        if (isset($_POST['valid'])) {
            $status = 'valid';

            $statusChange =  array(
            'penduduk_status_acc' => $status, 
             );

            $this->PendudukModel->update($id,$statusChange);
            $this->session->set_flashdata('alert','success_change');
            redirect('penduduk');
        }
        else if(isset($_POST['invalid'])){
            $status = 'invalid';

            $statusChange =  array(
            'penduduk_status_acc' => $status, 
             );

            $this->PendudukModel->update($id,$statusChange);
            $this->session->set_flashdata('alert','success_change');
            redirect('penduduk');
        }
    }

	public function ajaxGetRT($id){
        $data = $this->PendudukModel->getRT($id);
        echo json_encode($data);
  	}

	public function hapus($id){
		$hapus = $this->KategoriModel->hapus_kategori($id);
		if ($hapus > 0){
			$this->session->set_flashdata('alert', 'success_delete');
			redirect('admin/kategori');
		}else{
			redirect('admin/kategori');
		}
	}
}
