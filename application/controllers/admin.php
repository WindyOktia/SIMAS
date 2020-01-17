<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
    }


    public function index()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['page']='tambahSiswa';
        $this->load->view('templates/header',$data);
        $this->load->view('siswa/tambahSiswa');
        $this->load->view('templates/footer');
    }

    public function daftarSiswa()
    {
        $data['page']='daftarSiswa';
        $this->load->view('templates/header',$data);
        $this->load->view('siswa/daftarSiswa',$data);
        $this->load->view('templates/footer');
    }

    public function detailSiswa()
    {
        $data['page']='daftarSiswa';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    public function kelas()
    {
        $data['page']='kelas';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kelas/kelas',$data);
        $this->load->view('templates/footer');
    }

    public function addKelas()
    {
        $kelas = $this->input->post('kelas', true);
        $jurusan = $this->input->post('jurusan', true);
        if($kelas==0||$jurusan==0){
            $this->session->set_flashdata('error', 'Kesalahan Input Kelas / Jurusan');
        }
        else{
            $this->session->set_flashdata('success', 'Data Ditambahkan');
            $this->kelas_model->Add();
        }
        redirect('admin/kelas'); 
    }

    public function daftarPeserta()
    {
        $data['page']="kelas";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    public function guru()
    {
        $data['page']='addGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/addGuru');
        $this->load->view('templates/footer');
    }

    public function daftarGuru()
    {
        $data['page']='daftarGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/daftarGuru');
        $this->load->view('templates/footer');
    }

    public function jadwalMengajar()
    {
        $data['page']='daftarGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    public function jadwalGuru()
    {
        $data['page']='jadwalGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/jadwalGuru');
        $this->load->view('templates/footer');
    }


}
