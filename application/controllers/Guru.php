<?php

class Guru extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('guru_model');
        $this->load->model('pengaturan_model');
        $this->load->model('survei_model');
        $this->load->helper('text');
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
        $data['getIdGuru']=$this->guru_model->getIdGuru();
        foreach($this->guru_model->getIdGuru() as $getId){
            $id = $getId['id_guru'];
            $data['statusIjin']=$this->guru_model->getStatusIjin();
            $data['ijin']=$this->guru_model->getIjinID($id);
        }
        $this->load->view('templates/header',$data);
        $this->load->view('guru/ijin',$data);
        $this->load->view('templates/footer');
    }

    public function addIjin()
    {
        $insert=$this->guru_model->addIjin();
        
        if($insert == 0){
            $this->session->set_flashdata('error', 'Ijin gagal ditambahkan');
        }else{
            $id= $insert;
            $stat='0';
            $catatan ='';
            $this->guru_model->addStatus($id,$stat,$catatan);
            $this->session->set_flashdata('success', 'Ijin berhasil ditambahkan');
        }
        redirect('guru/ijin');
    }

    public function hapusIjin($id)
    {
        $delete=$this->guru_model->hapusIjin($id);
        if($delete == 0){
            $this->session->set_flashdata('error', 'Ijin gagal dihapus');
        }else{
            $this->session->set_flashdata('success', 'Ijin berhasil dihapus');
        }
        redirect('guru/ijin');
    }

    public function cek_presensi()
    {
        $data['page']='cek_presensi';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/cek_presensi');
        $this->load->view('templates/footer');
    }

    public function nilai_survei()
    {
        $data['page']='nilai_survei';
        $data['akademik']=$this->pengaturan_model->getAkademik();
        $data['pertanyaan']=$this->survei_model->getPertanyaan();
        $data['guru']=$this->guru_model->getGuruBerjadwal();
        $data['survei']=$this->survei_model->getSurveiGuru();
        $data['surveiID']=$this->survei_model->getSurveiID();
        $this->load->view('templates/header',$data);
        $this->load->view('guru/nilai_survei',$data);
        $this->load->view('templates/footer');
    }


    public function getNIP()
    {
        $cek=$this->guru_model->getNIP();
        echo $cek->num_rows();
    }

    public function getRFID()
    {
        $cek=$this->guru_model->getRFID();
        echo $cek->num_rows();
    }
}