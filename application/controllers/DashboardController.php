<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel', 'KelModel','RWModel','PendudukModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Dashboard',
			'rt' => $this->RTModel->lihat_data(),
			'rw' => $this->RWModel->lihat_data(),
			'penduduk' => $this->PendudukModel->lihat_data(),
            'bantuan' => $this->CrudModel->view_data('tb_bantuan','bantuan_date_created'),
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/dashboard',$data);
        $this->load->view('backend/templates/footer');
    }

  
}
