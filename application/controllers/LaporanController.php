<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once FCPATH."vendor/autoload.php";
class LaporanController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('CrudModel','PendudukModel','RtModel');
		$this->load->model($model);
    }

    public function index(){

        if (isset($_POST['lihat'])) {
            $id = $this->input->post('id_rt');
            $data = array(
            'judul' => 'Laporan',
            'penduduk' => $this->PendudukModel->getPendudukByRT($id),
            'kelurahan' => $this->CrudModel->view_data('tb_kel','kel_date_created'),
            'rt' => $this->RtModel->lihat_data()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('backend/templates/footer');
        }else{

        $data = array(
            'judul' => 'Laporan',
            'penduduk' => $this->CrudModel->view_data('tb_penduduk','penduduk_date_created'),
            'kelurahan' => $this->CrudModel->view_data('tb_kel','kel_date_created'),
            'rt' => $this->RtModel->lihat_data()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('backend/templates/footer');
        }
    }



	public function ajaxGetRT($id){
        $data = $this->PendudukModel->getRT($id);
        echo json_encode($data);
  	}
    public function export()
    {
        
        $inputFileName = 'assets/doc/laporan.xlsx';
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

        $key = $this->input->post('key');
        $result = $this->PendudukModel->getPendudukByRT($key);
        

        $activeSheet = $spreadsheet->getActiveSheet();
        $row = 5;
        $no = 1;
        for ($i = 0; $i < count($result); $i++) {
            
            $activeSheet->setCellValue('A' . $row, '' . $no)
                ->getStyle('A' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $row, '' . $result[$i]['penduduk_nik'])
                ->getStyle('B' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $row, '' . $result[$i]['penduduk_nama'])
                ->getStyle('C' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $row, '' . $result[$i]['penduduk_tempat_lahir'])
                ->getStyle('D' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $row, '' . $result[$i]['penduduk_tgl_lahir'])
                ->getStyle('E' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $row, '' . $result[$i]['penduduk_jk'])
                ->getStyle('F' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('G' . $row, '' . $result[$i]['penduduk_goldar'])
                ->getStyle('G' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('H' . $row, '' . $result[$i]['penduduk_agama'])
                ->getStyle('H' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('I' . $row, '' . $result[$i]['penduduk_pend_terakhir'])
                ->getStyle('I' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('J' . $row, '' . $result[$i]['penduduk_pekerjaan'])
                ->getStyle('J' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('K' . $row, '' . $result[$i]['penduduk_pendapatan'])
                ->getStyle('K' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('L' . $row, '' . $result[$i]['penduduk_status'])
                ->getStyle('L' . $row)->applyFromArray($styleArray);
            
           
            $row++;
            $no++;
        }

        $filename = 'Data Penduduk';
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $excelWriter->save("php://output");
    }

	
}
