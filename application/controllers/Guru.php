<?php

class Guru extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('guru_model');
        $this->load->model('pengaturan_model');
        $this->load->model('survei_model');
        // $this->load->model('mutu_model');
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
        $data['id_guru']= $this->guru_model->getIdGuru();

        foreach($this->guru_model->getIdGuru() as $select){
            $data['dataPresensi']= $this->guru_model->getPresensiHarian($select['id_guru']);
        }

        $this->load->view('templates/header',$data);
        $this->load->view('guru/presensi_harian');
        $this->load->view('templates/footer');
    }

    public function presensi_mengajar()
    {
        $data['page']='presensi_mengajar';
        $day = date('l');
        $hari = '';

        if($day=='Sunday'){
            $hari = 'Minggu';
        }

        if($day=='Monday'){
            $hari = 'Senin';
        }

        if($day=='Tuesday'){
            $hari = 'Selasa';
        }

        if($day=='Wednesday'){
            $hari = 'Rabu';
        }

        if($day=='Thursday'){
            $hari = 'Kamis';
        }

        if($day=='Friday'){
            $hari = 'Jumat';
        }

        if($day=='Saturday'){
            $hari = 'Sabtu';
        }
        
        $data['id_guru']= $this->guru_model->getIdGuru();
        foreach($this->guru_model->getIdGuru() as $idGuru){
            $data['dataMengajar']=$this->guru_model->getDataMengajar($hari, $idGuru['id_guru']);
        }
        $this->load->view('templates/header',$data);
        $this->load->view('guru/presensi_mengajar');
        $this->load->view('templates/footer');
    }

    public function ijin()
    {
        $data['page']='ijin';
        $data['getIdGuru']=$this->guru_model->getIdGuru();
        $data['tahun_akademik']=$this->pengaturan_model->getAkademik();
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
            redirect('guru/ijin');
        }else{
            $stat='0';
            $catatan ='';

            $id= $insert;
            $code="ijinGuru";

            $this->guru_model->addStatus($id,$stat,$catatan);
            $this->generalUpload($code,$insert);
            // $this->session->set_flashdata('success', 'Ijin berhasil ditambahkan');
        }
    }

    public function manualHarian()
    {
        $insert = $this->guru_model->manualHarian();
        if($insert == 0){
            $this->session->set_flashdata('error', 'Presensi gagal disimpan');
        }else{
            $this->session->set_flashdata('success', 'Presensi berhasil disimpan');
        }
        redirect('guru/presensi_harian');

    }

    public function manualMengajar()
    {
        $day = date('l');
        $hari = '';

        if($day=='Sunday'){
            $hari = 'Minggu';
        }

        if($day=='Monday'){
            $hari = 'Senin';
        }

        if($day=='Tuesday'){
            $hari = 'Selasa';
        }

        if($day=='Wednesday'){
            $hari = 'Rabu';
        }

        if($day=='Thursday'){
            $hari = 'Kamis';
        }

        if($day=='Friday'){
            $hari = 'Jumat';
        }

        if($day=='Saturday'){
            $hari = 'Sabtu';
        }

        
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

    public function generateNIP()
    {
        $stat= $_POST['status'];
        $data = $this->guru_model->generateNIP($stat);
        echo json_encode($data);
    }

    public function generalUpload($code, $insert)
    {
        echo $code;
        echo $insert;
        $config['upload_path']          = './document/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 15000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
        $judul = $this->input->post('judul');
        $jumlah_berkas = count($_FILES['arsip']['name']);
        
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['arsip']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['arsip']['name'][$i];
				$_FILES['file']['type'] = $_FILES['arsip']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['arsip']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['arsip']['error'][$i];
				$_FILES['file']['size'] = $_FILES['arsip']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$data['code_id'] = $code.'_'.$insert;
					$data['nama_doc'] = $judul[$i];
					$data['link_file'] = $uploadData['file_name'];
                    $data['type_file'] = $uploadData['file_ext'];
                    $this->db->insert('trans_doc',$data);
                    $this->session->set_flashdata('success', 'Dokumen berhasil ditambahkan');
				}else{
                    $this->session->set_flashdata('error', 'Dokumen gagal ditambah');
                }
			}
        }
        
        redirect('guru/ijin');
    }

    public function findFile($id)
    {
        $file = $this->guru_model->getLink($id);
        foreach($file as $link){
            // echo $link['link_file'];
            $this->downloadDocument($link['link_file']);
        }
    }

    public function downloadDocument($file)
    {
        $this->load->helper('download');
        force_download(FCPATH.'/document/'.$file, null);
    }
}