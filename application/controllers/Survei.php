<?php 

class Survei extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('guru_model');
        $this->load->model('survei_model');
        $this->load->model('pengaturan_model');
        if($this->login_model->is_role()== ""){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }

    public function addPertanyaan()
    {
        $insert= $this->survei_model->addPertanyaan();
        if($insert==0){
            $this->session->set_flashdata('error', 'Pertanyaan gagal disimpan');
        }else{
            $this->session->set_flashdata('success', 'Pertanyaan berhasil disimpan');
        }
        redirect('guru/nilai_survei');
    }

    public function hapusPertanyaan($id)
    {
        $delete=$this->survei_model->hapusPertanyaan($id);
        if($delete==0){
            $this->session->set_flashdata('error', 'Pertanyaan gagal dihapus');
        }else{
            $this->session->set_flashdata('success', 'Pertanyaan berhasil dihapus');
        }
        redirect('guru/nilai_survei');
    }

    public function addSurveiGuru()
    {
        $insert= $this->survei_model->addSurveiGuru();
        if($insert==true){
            $this->session->set_flashdata('success', 'Survei berhasil ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Survei gagal ditambahkan, batalkan survei yang sudah berjalan untuk memulai ulang');
        }
        redirect('guru/nilai_survei');
    }

    public function deleteSurveiGuru($id)
    {
        $delete=$this->survei_model->deleteSurveiGuru($id);
        if($delete==0){
            $this->session->set_flashdata('error', 'Survei gagal dibatalkan');
        }else{
            $this->session->set_flashdata('success', 'Survei telah dibatalkan');
        }
        redirect('guru/nilai_survei');
    }

    function downloadDefault($file)
    {
        $this->load->helper('download');
        force_download(FCPATH.'/document/default/'.$file, null);
    }
    
}