<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller
	{
		
	 public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

        $data['judul'] = 'Dashboard';
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/penduduk/create',$data);
        $this->load->view('backend/templates/footer');
    }
}

?>