<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once FCPATH."vendor/autoload.php";
class BantuanController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','RTModel', 'KelModel', 'BantuanModel','PendudukModel','KkModel');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Bantuan',
			'bantuan' => $this->BantuanModel->lihat_data()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/bantuan/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah(){
    	if (isset($_POST['tambah'])){

			$data = array(	
				'bantuan_dari' => $this->input->post('bantuan_dari'),
				'bantuan_jenis' => $this->input->post('bantuan_jenis'),
				'bantuan_keterangan' => $this->input->post('bantuan_keterangan'),
				'bantuan_jumlah' => $this->input->post('bantuan_jumlah'),
                'bantuan_periode' => $this->input->post('bantuan_periode'),
			);
			$simpan = $this->CrudModel->insert('tb_bantuan',$data);

            $bantuan = $this->BantuanModel->get_one_bantuan($this->input->post('bantuan_dari'),$this->input->post('bantuan_jenis'),$this->input->post('bantuan_periode'));
            $jumlah = (int)$this->input->post('jumlah_penerima');
            for ($i = 0; $i < $jumlah  ; $i++) {
                $data_penerima[$i] = [
                    'penerima_kk_id' => $this->input->post("penerima".$i),
                    'penerima_kk_bantuan' => $bantuan['bantuan_id']
                ];
            }

			if ($simpan > 0){
                for ($i = 0; $i <$jumlah ; $i++) {
                    $this->CrudModel->insert('tb_penerima_bantuan',$data_penerima[$i]);
                }
				$this->session->set_flashdata('alert', 'success_post');
				redirect('bantuan');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('bantuan');
			}
		}else{
			$data = array(
            'judul' => 'Ajukan Bantuan',
			'bantuan' => $this->BantuanModel->lihat_data(),
			'kk' => $this->KkModel->lihat_data()
        	);
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/bantuan/create',$data);
        $this->load->view('backend/templates/footer');
		}
	}
    public function ajukan(){
        if (isset($_POST['tambah'])){

            $data = array(  
                'pengajuan_kk' => $this->input->post('bantuan_dari'),
                'pengajuan_jenis' => $this->input->post('bantuan_jenis'),
                'pengajuan_keterangan' => $this->input->post('keterangan')
            );
            $simpan = $this->CrudModel->insert('tb_pengajuan',$data);
            if ($simpan > 0){
                $this->session->set_flashdata('alert', 'success_post');
                redirect('bantuan');
            } else {
                $this->session->set_flashdata('alert', 'fail_edit');
                redirect('bantuan');
            }
        }else{
            $data = array(
            'judul' => 'Ajukan Bantuan',
            'bantuan' => $this->BantuanModel->lihat_data(),
            );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/bantuan/ajukan',$data);
        $this->load->view('backend/templates/footer');
        }
    }
    public function ajax_get_kk($jenis){
        $data = $this->KkModel->get_penerima($jenis);
        echo json_encode($data);
    }


	public function confirm_status($id){
        if (isset($_POST['konfirmasi'])) {
            $status = 'diterima';

            $statusChange =  array(
            'bantuan_status' => $status, 
             );

            $this->BantuanModel->update($id,$statusChange);
            $this->session->set_flashdata('alert','success_change');
            redirect('bantuan');
        }
        else if(isset($_POST['tolak'])){
            $status = 'ditolak';

            $statusChange =  array(
            'bantuan_status' => $status, 
             );

            $this->BantuanModel->update($id,$statusChange);
            $this->session->set_flashdata('alert','success_change');
            redirect('bantuan');
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
    public function detail($id){
        $data = array(
            'judul' => 'Data Bantuan',
            'bantuan' => $this->BantuanModel->lihat_satu_data($id)
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/bantuan/detail',$data);
        $this->load->view('backend/templates/footer');
    }
    public function export()
    {
        
        $inputFileName = 'assets/doc/bantuan.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
        $excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
        $spreadsheet->setActiveSheetIndex(0);

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $id = $this->input->post('key');
        $result = $this->BantuanModel->lihat_data();

        $activeSheet = $spreadsheet->getActiveSheet();
        $row = 5;
        $no = 1;
        for ($i = 0; $i < count($result); $i++) {
            
            $activeSheet->setCellValue('A' . $row, '' . $no)
                ->getStyle('A' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $row, '' . $result[$i]['bantuan_dari'])
                ->getStyle('B' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $row, '' . $result[$i]['bantuan_jenis'])
                ->getStyle('C' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $row, '' . $result[$i]['bantuan_jumlah'])
                ->getStyle('D' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $row, '' . $result[$i]['bantuan_keterangan'])
                ->getStyle('E' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $row, '' . $result[$i]['bantuan_periode'])
                ->getStyle('F' . $row)->applyFromArray($styleArray);
            $row++;
            $no++;
        }

        $filename = 'Data Bantuan';
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $excelWriter->save("php://output");
    }
}
