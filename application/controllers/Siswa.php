<?php

class Siswa extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model');
        $this->load->model('kelas_model');
        $this->load->model('mapel_model');
        $this->load->model('siswa_model');
        $this->load->model('guru_model');
        $this->load->model('survei_model');
        $this->load->model('login_model');
        $this->load->model('pengaturan_model');
        // if($this->login_model->is_role() == ""){
        //     $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
        //     redirect('survei/validasi');
        // }
    }

    public function getNIPD()
    {
        $cek=$this->siswa_model->getNIPD();
        echo $cek->num_rows();
    }

    public function validasi()
    {
        $data['siswa']=$this->siswa_model->daftarSiswa();
        $this->load->view('siswa/validasi',$data);
    }

    public function survei()
    {
        $data['pertanyaan']= $this->survei_model->getPertanyaan();
        $this->load->view('siswa/survei',$data);
    }
}