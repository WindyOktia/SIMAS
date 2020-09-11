<?php

class Guru extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('guru_model');
        if($this->login_model->is_role()== ""){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }

    public function index()
    {
        $data['page']='presensi_harian';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/cek_presensi');
        $this->load->view('templates/footer');
    }

    public function presensi_harian()
    {
        $data['page']='presensi_harian';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/presensi_harian');
        $this->load->view('templates/footer');
    }

    public function presensi_mengajar()
    {
        $data['page']='presensi_mengajar';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/presensi_mengajar');
        $this->load->view('templates/footer');
    }

    public function ijin()
    {
        $data['page']='ijin';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/ijin');
        $this->load->view('templates/footer');
    }

    public function cek_presensi()
    {
        $data['page']='cek_presensi';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/cek_presensi');
        $this->load->view('templates/footer');
    }
}