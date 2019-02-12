<?php


defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Laporan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->checking();
        $this->load->model('Psb');
    }

    public function index()
    {
        echo "Kosong";
    }

    private function checking()
    {
        $sesi_login = $this->session->sudah_login;
        if ($sesi_login != true) {
            redirect('login','refresh');
        }
    }

    public function pendaftar($id)
    {
        $siswa = $this->Psb->get_data_pendaftar($id);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator('Zulfa Abdul Majid')
        ->setLastModifiedBy('Kangzulfa')
        ->setTitle('Data Pendaftar YPI Minhajut Tholabah');

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No')
        ->setCellValue('B1', 'No Daftar')
        ->setCellValue('C1', 'Mendaftar di')
        ->setCellValue('D1', 'Gelombang')
        ->setCellValue('E1', 'Nama Lengkap')
        ->setCellValue('F1', 'Tempat Lahir')
        ->setCellValue('G1', 'Tanggal Lahir')
        ->setCellValue('H1', 'JK')
        ->setCellValue('I1', 'Alamat')
        ->setCellValue('J1', 'Asal Sekolah')
        ->setCellValue('K1', 'Orang Tua')
        ->setCellValue('L1', 'Penghasilan')
        ->setCellValue('M1', 'Catatan');

        // Miscellaneous glyphs, UTF-8
        $i=2; $no=1; foreach ($siswa as $item) {
            $mts    = $item->is_mts==1?($item->is_pondok==1?"MTs dan Pondok":"MTs"):"";
            $ma     = $item->is_ma==1?($item->is_pondok==1?"MA dan Pondok":"MA"):"";
            $pondok = $item->is_pondok==1?($item->is_mts==0&&$item->is_ma==0?"Pondok":""):"";
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $no)
            ->setCellValue('B'.$i, $item->no_daftar)
            ->setCellValue('C'.$i, $mts.$ma.$pondok)
            ->setCellValue('D'.$i, $item->nama_gelombang)
            ->setCellValue('E'.$i, $item->nama_siswa)
            ->setCellValue('F'.$i, $item->tempat_lahir)
            ->setCellValue('G'.$i, date('d-m-Y',strtotime($item->tanggal_lahir)))
            ->setCellValue('H'.$i, $item->gender==1?'Laki-laki':'Perempuan')
            ->setCellValue('I'.$i, $item->alamat)
            ->setCellValue('J'.$i, $item->asal_sekolah)
            ->setCellValue('K'.$i, $item->orang_tua)
            ->setCellValue('L'.$i, $item->gaji)
            ->setCellValue('M'.$i, $item->catatan);
            $i++;
            $no++;
        }
        $file_title = "Rekap Pendaftar Per Tanggal ".date('d-m-Y').".xlsx";
        $spreadsheet->getActiveSheet()->setTitle('Rekap Pendaftar '.date('d-m-Y H'));
        $spreadsheet->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$file_title);
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

}

/* End of file Laporan.php */
