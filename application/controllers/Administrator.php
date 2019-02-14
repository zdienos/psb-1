<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->checking();
        $this->load->model('Psb');
    }

    public function push_breadcrumb($link = FALSE, $title = FALSE, $clean_start = FALSE) {
        $breadcrumb = [];
        $html = "";
        if ($clean_start == TRUE) {
            $this->session->set_userdata("breadcrumb", $breadcrumb);
        }
        if ($link != FALSE && $title != FALSE) {
            $param_string = explode("?", $link);
            $function_name = $param_string[0];
            $parameter = [];
            if (count($param_string) > 1) {
                $pair_list = explode("&", $param_string[1]);
                for ($i = 0; $i < count($pair_list); $i++) {
                    $pair = explode("=", $pair_list[$i]);
                    $parameter[$pair[0]] = $pair[1];
                }
            }
            $link = $function_name;
            $breadcrumb = $this->session->userdata("breadcrumb");
            if (!empty($breadcrumb)) {
                $index = array_search($link, array_column($breadcrumb, "link"));
                if ($index !== FALSE) {
                    $breadcrumb = array_splice($breadcrumb, 0, $index);
                }
            }
            $crumb = new stdClass();
            $crumb->link = $link;
            $crumb->title = $title;
            $crumb->parameter = $parameter;
            array_push($breadcrumb, $crumb);
            $this->session->set_userdata("breadcrumb", $breadcrumb);
            $html = $this->draw_breadcrumb();
        }
        return $html;
    }

    public function draw_breadcrumb() {
        $html = "";
        $html .= "<ol class='breadcrumb'><li><i class='fa fa-home'></i></li>";
        $breadcrumb = $this->session->userdata("breadcrumb");
        if ($breadcrumb !== FALSE && is_array($breadcrumb)) {
            foreach ($breadcrumb as $crumb) {
                if (count($crumb->parameter) > 0) {
                    $param_string = "?";
                    $separator = "";
                    foreach ($crumb->parameter as $key => $value) {
                        $param_string .= $separator . $key . "=" . $value;
                        $separator = "&";
                    }
                    $html .= "<li class='item-crumb' onclick='render(\"$crumb->link$param_string\")'>$crumb->title</li>";
                } else {
                    $html .= "<li class='item-crumb' onclick='render(\"$crumb->link\")'>$crumb->title</li>";
                }
            }
        }
        $html .= "</ol>";
        return $html;
    }

    private function checking()
    {
        $sesi_login = $this->session->sudah_login;
        if ($sesi_login != true) {
            redirect('login','refresh');
        }
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return;
        } else {
            if ($this->uri->segment(2) == FALSE) {
                return;
            } else {
                echo json_encode(["message" => "You dont have permission to this page"]); 
                exit;
            }
        }

    }

    public function index()
    {
        $this->load->view('admin/layout');
    }

    public function dashboard()
    {
        $data = [
            'breadcrumb' => $this->push_breadcrumb("dashboard", "Dashboard", true),
            'grafik' => $this->Psb->get_statistik_pendaftar(),
            'pie' => $this->Psb->get_statistik_gender(),
            'jml_pengguna' => $this->Psb->get_count_table('admin'),
            'jml_pengajar' => $this->Psb->get_count_table('pengajar'),
            'jml_gelombang' => $this->Psb->get_count_table('gelombang'),
            'jml_testimoni' => $this->Psb->get_count_table('testimoni'),
            'jml_fasilitas' => $this->Psb->get_count_table('fasilitas'),
            'jml_penghasilan' => $this->Psb->get_count_table('penghasilan'),
            'jml_pendaftar' => $this->Psb->get_count_table('pendaftar', ['is_deleted' => 0]),
        ];
        $this->load->view('admin/dashboard', $data);
    }

    public function tambah_siswa()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("tambah_siswa", "Tambah Siswa");
        $data['penghasilan'] = $this->Psb->list_penghasilan();
        $this->load->view('admin/tambah_siswa', $data);
    }

    public function data_pendaftar($id)
    {
        $data['id'] = $id;
        if ($id == 1) {
            $data['h1'] = "Data MTs"; $link = "data_pendaftar/1"; $title = "Data Pendaftar MTs";
        } elseif ($id == 2) {
            $data['h1'] = "Data MA"; $link = "data_pendaftar/2"; $title = "Data Pendaftar MA";
        } elseif ($id == 3) {
            $data['h1'] = "Data Pondok"; $link = "data_pendaftar/3"; $title = "Data Pendaftar Pondok";
        } elseif ($id == 4) {
            $data['h1'] = "Data Semua Pendaftar"; $link = "data_pendaftar/4"; $title = "Data Semua Pendaftar";
        }
        $data['breadcrumb'] = $this->push_breadcrumb($link, $title);
        $this->load->view('admin/data_pendaftar', $data);
    }

    public function edit_siswa()
    {
        $id = $this->input->get('id');
        $data['breadcrumb'] = $this->push_breadcrumb("edit_siswa?id=$id", "Edit Pendaftar");
        $data['penghasilan'] = $this->Psb->list_penghasilan();
        $data['detail'] = $this->Psb->get_detail_siswa($id);
        $this->load->view('admin/edit_siswa', $data);
    }

    public function data_pengguna()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_pengguna", "Data Pengguna");
        $this->load->view('admin/data_pengguna', $data);   
    }

    public function data_pengajar()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_pengajar", "Data Pengajar");
        $this->load->view('admin/data_pengajar', $data);
    }

    public function tambah_pengajar()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("tambah_pengajar", "Tambah Pengajar");
        $this->load->view('admin/tambah_pengajar', $data);
    }

    public function data_fasilitas()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_fasilitas", "Data Fasilitas");
        $this->load->view('admin/data_fasilitas', $data);
    }

    public function tambah_fasilitas()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("tambah_fasilitas", "Tambah Fasilitas");
        $this->load->view('admin/tambah_fasilitas', $data);
    }

    public function data_prestasi()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_prestasi", "Data Prestasi");
        $this->load->view('admin/data_prestasi', $data);
    }

    public function tambah_prestasi()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("tambah_prestasi", "Tambah Prestasi");
        $this->load->view('admin/tambah_prestasi', $data);
    }

    public function data_gelombang()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_gelombang", "Data Gelombang");
        $this->load->view('admin/data_gelombang', $data);
    }

    public function data_penghasilan()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_penghasilan", "Data Penghasilan");
        $data['penghasilan'] = $this->Psb->get_penghasilan();
        $this->load->view('admin/data_penghasilan', $data);
    }

    public function data_testimoni()
    {
        $data['breadcrumb'] = $this->push_breadcrumb("data_testimoni", "Data Testimoni");
        $data['testimoni'] = $this->Psb->get_testimoni();
        $this->load->view('admin/data_testimoni', $data);
    }

}

/* End of file Administrator.php */
