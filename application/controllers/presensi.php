<?php

class Presensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('presensi_model');
    }

    public function index()
    {
        $this->load->view('templates/header_presensi');
        $this->load->view('presensi/main');
        $this->load->view('templates/footer');
    }

    public function harian()
    {
        $cek = $this->presensi_model->add();
        if($cek==false)
        {
            $this->session->set_flashdata('error', 'RFID Tidak Terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Selamat Datang');
        }
        redirect('presensi/');
    }

    public function data_pegawai($id)
    {
        $this->presensi_model->get($id);
    }
}