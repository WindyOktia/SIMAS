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

    public function getRFID()
    {
        $cek = count($this->presensi_model->getRFID());
        echo $cek;
    }

    public function getLibur()
    {
        $cek = $this->presensi_model->getLibur();
        echo json_encode($cek);
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

    public function nama_pegawai($id)
    {
        echo json_encode($this->presensi_model->getNama($id));
    }
}