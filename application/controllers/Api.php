<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->checking();
        $this->load->model('Psb');
    }
    

    public function index()
    {
        echo "Index";
    }

    private function checking()
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return;
        } else {
            echo json_encode(["message" => "You dont have permission to this page"]); 
            exit;
        }

    }

    public function is_admin($level = FALSE)
    {
        $sesi_login = $this->session->sudah_login;
        $sesi_level = $this->session->level;
        if ($sesi_login != TRUE) {
            echo json_encode(["message" => "You dont have permission to do this action"]); 
            exit;
        } else {
            if ($level != FALSE) {
                if ($sesi_level >= $level) {
                    return;
                } else {
                    echo json_encode(["message" => "You dont have permission to do this action"]); 
                    exit;
                }
            } else {
                return;
            }
        }
    }

    public function cek_login()
    {
        $input = (object) $this->input->post();
        $this->Psb->cek_login_psb($input);
    }

    public function registrasi()
    {
        $input = (object) $this->input->post();
        $this->Psb->registrasi_siswa_baru($input);
    }

    public function get_data_pendaftar()
    {
        $dataTable = [
            'col_order' => ['no_daftar','nama_siswa','asal_sekolah','is_mts','is_ma','is_pondok'],
            'col_search' => ['no_daftar','nama_siswa','asal_sekolah','is_mts','is_ma','is_pondok'],
            'order' => ['id_pendaftar' => 'desc'],
            'query' => [
                'select' => '*',
                'from' => 'pendaftar',
                'where' => 'is_deleted = 0'
            ]
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $mts    = $item->is_mts==1?($item->is_pondok==1?"MTs dan Pondok":"MTs"):"";
            $ma     = $item->is_ma==1?($item->is_pondok==1?"MA dan Pondok":"MA"):"";
            $pondok = $item->is_pondok==1?($item->is_mts==0&&$item->is_ma==0?"Pondok":""):"";
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $item->no_daftar;
            $row[] = $item->nama_siswa;
            $row[] = $item->asal_sekolah;
            $row[] = $mts.$ma.$pondok;
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }

    public function tambah_pendaftar()
    {
        $this->is_admin();
        $input = (object) $this->input->post();
        $this->Psb->registrasi_siswa_baru($input);
    }

    public function update_pendaftar()
    {
        $this->is_admin();
        $input = (object) $this->input->post();
        $this->Psb->update_data_pendaftar($input);
    }

    public function set_pendaftar()
    {
        $this->is_admin();
        $input = (object) $this->input->post();
        $this->Psb->set_data_pendaftar($input);
    }

    public function delete_pendaftar_permanent()
    {
        $this->is_admin();
        $id = $this->input->post('ids');
        $this->Psb->delete_data_pendaftar_permanent($id);
    }

    public function get_pendaftar()
    {
        $cond = $this->input->post('id');
        if (isset($cond)) {
            if ($cond == 1) {
                $additional = "d.is_mts = 1 ";
            } else if ($cond == 2) {
                $additional = "d.is_ma = 1 ";
            } else if ($cond == 3) {
                $additional = "d.is_pondok = 1 ";
            } else {
                $additional = "d.is_deleted IN (0,1)";
            }
        } else {
            $additional = "";
        }
        $dataTable = [
            'col_order' => ['d.no_daftar','g.nama_gelombang','d.nama_siswa','d.tanggal_lahir','d.asal_sekolah','d.orang_tua','d.no_telp'],
            'col_search' => ['d.no_daftar','g.nama_gelombang','d.nama_siswa','d.tanggal_lahir','d.asal_sekolah','d.orang_tua','d.no_telp'],
            'order' => ['id_pendaftar' => 'desc'],
            'query' => [
                'select' => '*',
                'from' => 'pendaftar d',
                'join' => [ ['tbl' => 'gelombang g','cond' => 'd.gelombang = g.id_gelombang',] ],
                'where' => $additional,
                'order' => 'd.is_deleted DESC, d.id_pendaftar DESC'
            ]
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $mts    = $item->is_mts==1?($item->is_pondok==1?"MTs dan Pondok":"MTs"):"";
            $ma     = $item->is_ma==1?($item->is_pondok==1?"MA dan Pondok":"MA"):"";
            $pondok = $item->is_pondok==1?($item->is_mts==0&&$item->is_ma==0?"Pondok":""):"";
            $badge  = $item->status==0?"<span class='badge bg-blue'>Menunggu</span>":($item->status==1?"<span class='badge bg-green'>Diterima</span>":($item->status==2?"<span class='badge bg-red'>Ditolak</span>":""));
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = "<input type='checkbox' class='check_id' data-id='$item->id_pendaftar'>";
            $row[] = "<a href='javascript:void(0)' title='Edit Siswa' onclick='render(\"edit_siswa?id=$item->id_pendaftar\")' ><i class='fa fa-edit'></i></a>";
            $row[] = "<a href='javascript:void(0)' title='Tampilkan Detail' onclick='tampilDetail($item->id_pendaftar)' ><i class='fa fa-search-plus'></i></a>";
            $row[] = $item->no_daftar;
            $row[] = $item->is_deleted==1?"<p class='deleted'>$item->nama_siswa</p>":$item->nama_siswa;
            $row[] = $item->tempat_lahir.", ".date('j M Y', strtotime($item->tanggal_lahir));
            $row[] = $item->asal_sekolah;
            $row[] = $item->orang_tua;
            $row[] = $item->no_telp;
            $row[] = $badge;
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }
    
    public function get_detail_pendaftar()
    {
        $this->is_admin();
        $id = $this->input->post('id');
        $this->Psb->get_detail_pendaftar($id);
    }

    public function get_pengguna()
    {
        $this->is_admin(9);
        $dataTable = [
            'col_order' => ['username','real_name','last_login'],
            'col_search' => ['username','real_name','last_login'],
            'order' => ['id_admin' => 'desc'],
            'query' => [ 'select' => '*', 'from' => 'admin']
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = "<input type='checkbox' class='check_id' data-id='$item->id_admin'>";
            $row[] = "<a href='javascript:void(0)' title='Edit Pengguna' onclick='render(\"edit_siswa?id=$item->id_admin\")' ><i class='fa fa-edit'></i></a>";
            $row[] = $item->username;
            $row[] = $item->real_name;
            $row[] = $item->level==1?"Admin":($item->level==9?"Super Admin":"");
            $row[] = date('j M Y H:i:s', strtotime($item->last_login));
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }

    public function tambah_pengguna()
    {
        $this->is_admin(9);
        $input = (object) $this->input->post();
        $this->Psb->tambah_data_pengguna($input);
    }

    public function delete_pengguna()
    {
        $this->is_admin(9);
        $id = $this->input->post('ids');
        $this->Psb->delete_data_pengguna($id);
    }

    public function get_pengajar()
    {
        $this->is_admin();
        $dataTable = [
            'col_order' => ['nama_pengajar'],
            'col_search' => ['nama_pengajar'],
            'order' => ['id_pengajar' => 'desc'],
            'query' => [ 'select' => '*', 'from' => 'pengajar']
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $lembaga = $item->lembaga==1?"MTs":($item->lembaga==2?"MA":($item->lembaga==3?"Yayasan":""));
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = "<input type='checkbox' class='check_id' data-id='$item->id_pengajar'>";
            $row[] = "<a href='javascript:void(0)' title='Edit Pengajar' onclick='render(\"edit_pengajar?id=$item->id_pengajar\")' ><i class='fa fa-edit'></i></a>";
            $row[] = $item->nama_pengajar;
            $row[] = $lembaga;
            $row[] = "<img class='img-thumbnail' src='".base_url().$item->foto_pengajar."' width='100px'>";
            $row[] = date('j M Y H:i:s', strtotime($item->tgl_insert));
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }

    public function tambah_pengajar()
    {
        $input = (object) $this->input->post();
        $this->Psb->tambah_data_pengajar($input);
    }

    public function get_fasilitas()
    {
        $this->is_admin();
        $dataTable = [
            'col_order' => ['judul_foto'],
            'col_search' => ['judul_foto'],
            'order' => ['id_fasilitas' => 'desc'],
            'query' => [ 'select' => '*', 'from' => 'fasilitas']
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = "<input type='checkbox' class='check_id' data-id='$item->id_fasilitas'>";
            $row[] = "<a href='javascript:void(0)' title='Edit Fasilitas' onclick='render(\"edit_fasilitas?id=$item->id_fasilitas\")' ><i class='fa fa-edit'></i></a>";
            $row[] = $item->judul_foto;
            $row[] = "<img class='img-thumbnail' src='".base_url().$item->foto_fasilitas."' width='100px'>";
            $row[] = date('j M Y H:i:s', strtotime($item->tgl_upload));
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }

    public function tambah_fasilitas()
    {
        $input = (object) $this->input->post();
        $this->Psb->tambah_data_fasilitas($input);
    }

    public function get_gelombang()
    {
        $this->is_admin();
        $dataTable = [
            'col_order' => ['nama_gelombang'],
            'col_search' => ['nama_gelombang'],
            'order' => ['id_gelombang' => 'asc'],
            'query' => [ 'select' => '*', 'from' => 'gelombang']
        ];
        $list = $this->Psb->get_datatables($dataTable);
        $data = [];
        $no = $_POST['start'];
        $i = 0;
        foreach($list as $item){
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = "<input type='checkbox' class='check_id' data-id='$item->id_gelombang'>";
            $row[] = "<a href='javascript:void(0)' title='Edit Gelombang' onclick='edit_gelombang($item->id_gelombang)' ><i class='fa fa-edit'></i></a>";
            $row[] = $item->nama_gelombang;
            $row[] = date('j M Y', strtotime($item->tgl_mulai));
            $row[] = date('j M Y', strtotime($item->tgl_akhir));
            $row[] = $this->get_pendaftar_gelombang($item->id_gelombang)." Siswa";
            $data[] = $row;
            $i++;
        }
        $this->Psb->datatables_output($dataTable, $data);
    }

    public function get_pendaftar_gelombang($id_gelombang)
    {
        $this->db->where('gelombang', $id_gelombang);
        return $this->db->get('pendaftar')->num_rows();
    }

    public function get_detail_gelombang()
    {
        $id = $this->input->post('id');
        $this->Psb->get_detail_gelombang($id);
    }

}

/* End of file Api.php */
