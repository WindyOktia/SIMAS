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
        if(isset($_GET['nipd'])&&isset($_GET['ibu'])){
            $nipd= $_GET['nipd'];
            $ibu= $_GET['ibu'];
            $data['dataSiswa']= $this->siswa_model->getSiswaID($nipd,$ibu);
        }
        $data['siswa']=$this->siswa_model->daftarSiswa();
        $this->load->view('siswa/validasi',$data);
    }

    public function survei($id)
    {
        $data['pertanyaan']= $this->survei_model->getPertanyaan();
        $kelasID = $this->survei_model->getKelasID($id);

        foreach($kelasID as $kls){
            $data['kelasId']=$kls['id_kelas'];
            $data['namaKelas']= $this->survei_model->getKelasName($kls['id_kelas']);

            $akademik = $this->pengaturan_model->getAkademik();
            
            foreach($akademik as $akd){
                $tahunAkademik= $akd['tahun_akademik'];
                $semester= $akd['semester'];
                $data['daftarGuru']= $this->survei_model->getDaftarGuru($tahunAkademik,$semester, $kls['id_kelas']);
            }
        }
        $data['akademik']=$this->pengaturan_model->getAkademik();

        $this->load->view('siswa/survei',$data);
    }

    public function nama_siswa()
    {
        echo json_encode($this->siswa_model->getNama());
    }
}