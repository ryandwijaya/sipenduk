<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('KkModel');
        $this->load->model('CrudModel');
    }

    public function index()
    {

        $this->load->view('backend/auth/login');
    }
    public function register()
    {
        $data = array(
            'judul' => 'Data KK',
            'kk' => $this->KkModel->lihat_data(),
            'lurah' => $this->CrudModel->view_data('tb_kel','kel_date_created')
        );
        $this->load->view('backend/auth/register',$data);
    }

    public function login()
    {
        
        if (isset($_POST['login'])) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $userr = array(
                'user_username' => $username,
                'user_password' => md5($password)
            );
            $kk = array(
                'kk_no' => $username
            );

            $validate = $this->AuthModel->getUsers($userr)->num_rows();
            $validate2 = $this->AuthModel->get_kk($kk)->num_rows();
            
            $admin = $this->AuthModel->getUserAccount($userr);
            $penduduk = $this->AuthModel->getKK($kk);


            if ($validate > 0 ) {
                $data_session = array(
                    'session_username' => $admin['user_username'],
                    'session_nama' => $admin['user_nama'],
                    'session_level' => $admin['user_level']
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('dashboard'));

            }elseif($validate2>0){
                if ($username == $password) {
                    $data_session = array(
                    'session_id' => $penduduk['kk_id'],
                    'session_username' => $penduduk['kk_no'],
                    'session_nama' => $penduduk['kk_kepala'],
                    'session_level' => 'penduduk'
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('dashboard'));
                }
            }
            
            
            else{
                $this->session->set_flashdata('alert','gagalLogin');
                redirect(site_url('login'));
                
            }

        } else {
            $this->load->view('backend/auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
