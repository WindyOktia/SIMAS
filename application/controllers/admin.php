<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('siswa_model');
        $this->load->model('guru_model');
    }


    public function index()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/footer');
    }

    // siswa
    public function siswa()
    {
        $data['page']='tambahSiswa';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('siswa/tambahSiswa',$data);
        $this->load->view('templates/footer');
    }

    public function addSiswa()
    {
        $cek = $this->siswa_model->add();
        if($cek==false)
        {
            $this->session->set_flashdata('error', 'NIPD Sudah Terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Siswa Berhasil Ditambahkan');
        }
        redirect('admin/siswa');
    }

    public function daftarSiswa()
    {
        $data['page']='daftarSiswa';
        $data['daftar']=$this->siswa_model->daftarSiswa();
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('siswa/daftarSiswa',$data);
        $this->load->view('templates/footer');
    }

    public function hapusSiswa()
    {
        
    }
    // end of siswa

    // kelas
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
        if($kelas=='0'||$jurusan=='0'){
            $this->session->set_flashdata('error', 'Kesalahan Input Kelas / Jurusan');
        }
        else{
            $this->session->set_flashdata('success', 'Data Ditambahkan');
            $this->kelas_model->Add();
        }
        redirect('admin/kelas'); 
    }

    public function daftarPeserta($id)
    {
        $data['page']="kelas";
        $data['peserta']=$this->kelas_model->daftarPeserta($id);
        $this->load->view('templates/header',$data);
        $this->load->view('kelas/daftarPeserta',$data);
        $this->load->view('templates/footer');
    }
    // end of kelas

    // guru
    public function guru()
    {
        $data['page']='addGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/addGuru');
        $this->load->view('templates/footer');
    }

    public function addGuru()
    {
        $cek = $this->guru_model->add();
        if($cek==false)
        {
            $this->session->set_flashdata('error', 'RFID / NIP Sudah Terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Guru Berhasil Ditambahkan');
        }
        redirect('admin/guru');
    }

    public function daftarGuru()
    {
        $data['page']='daftarGuru';
        $data['guru']=$this->guru_model->get();
        $data['detail']=$this->guru_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('guru/daftarGuru',$data);
        $this->load->view('templates/footer');
    }

    public function jadwalMengajar($id)
    {
        $data['page']='daftarGuru';
        $data['guru']=$this->guru_model->getId($id);
        $data['jadwal']=$this->guru_model->getJadwal($id);
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('guru/jadwalMengajar',$data);
        $this->load->view('templates/footer');
    }

    public function addJadwal()
    {
        $guru = $this->input->post('guru',TRUE);
        $hari = $this->input->post('hari',TRUE);
		$kelas = $this->input->post('kelas',TRUE);
		$mulai = $this->input->post('mulai',TRUE);
        $selesai = $this->input->post('selesai',TRUE);
        if($guru=='0'||$hari=='0'||$kelas=='0'||$mulai=='0'||$selesai=='0')
        {
            $this->session->set_flashdata('error', '<b>Kesalahan Input</b><br>Pastikan Seluruh Data Terisi');
        }
        else{
            $cek = $this->guru_model->addJadwal($guru, $hari, $kelas, $mulai, $selesai);
            $this->session->set_flashdata('success', 'Jadwal Guru Berhasil Disimpan');
        }
        redirect('admin/jadwalMengajar/'.$guru.'');
    }
    // end of guru

    // presensi
    public function daftarPresensi()
    {
        $data['page']='presensi';
        $data['guru']=$this->guru_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('guru/daftarPresensi',$data);
        $this->load->view('templates/footer');
    }

    public function detailPresensi()
    {
        $data['page']='presensi';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/detailPresensi',$data);
        $this->load->view('templates/footer');
    }
    // end of presensi


}
