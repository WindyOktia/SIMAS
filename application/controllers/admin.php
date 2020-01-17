<?php

class Admin extends CI_Controller
{
    public function index()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    public function addSiswa()
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

    public function kelas()
    {
        $data['page']='kelas';
        $this->load->view('templates/header',$data);
        $this->load->view('kelas');
        $this->load->view('templates/footer');
    }

    public function addGuru()
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

    public function jadwalGuru()
    {
        $data['page']='jadwalGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/jadwalGuru');
        $this->load->view('templates/footer');
    }


}
