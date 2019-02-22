<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Psb');
    }
    
	public function index()
	{
        $data['data'] = $this->Psb->list_pengaturan();
        $data['testimoni'] = $this->Psb->list_testimoni(6);
        $data['penghasilan'] = $this->Psb->list_penghasilan();
        // $data['pengajar'] = $this->Psb->list_pengajar();
        $data['prestasi'] = $this->Psb->list_prestasi();
        $data['fasilitas'] = $this->Psb->list_fasilitas(6);
        $data['version'] = "1.0.1";
		$this->load->view('welcome', $data);
    }
    
    public function login()
    {
        if ($this->session->sudah_login == true) {
            redirect('administrator');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function data_pendaftar()
    {
        $data['data'] = $this->Psb->list_pengaturan();
        $this->load->view('data_pendaftar', $data);
    }

    public function logout()
    {
        session_destroy();
		redirect(base_url('login'), 'refresh');
    }

    public function profil_pengajar($id)
    {
        $data = $this->Psb->get_profil_pengajar($id);
        $this->load->view('profil_pengajar', $data);
    }

    public function detail_prestasi($id)
    {
        $data = $this->Psb->get_detail_prestasi($id);
        $this->load->view('detail_prestasi', $data);
    }
}
