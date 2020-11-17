<?php

class Document extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model');
        $this->load->model('kelas_model');
        $this->load->model('mapel_model');
        $this->load->model('siswa_model');
        $this->load->model('guru_model');
        $this->load->model('login_model');
        $this->load->model('pengaturan_model');
        $this->load->model('mutu_model');
        if($this->login_model->is_role() == ""){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }
    
    public function generalUpload($id,$code,$backid)
    {
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
					$data['code_id'] = $code.'_'.$id;
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
        
        redirect('document/'.$backid);
    }

    public function downloadDocument($file)
    {
        $this->load->helper('download');
        force_download(FCPATH.'/document/'.$file, null);
    }

    public function deleteSingleDoc($id, $backLink, $backId)
    {
        $delete= $this->dokumen_model->deleteSingleDoc($id);
        if($delete > 0){
            $this->session->set_flashdata('success', 'Data Dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('document/'.$backLink.'/'.$backId);
    }

    public function addSingleDocument()
    {
        $backLink= $_POST['backlink'];
        $backId =$_POST['backid'];
        $code_id = $_POST['code_id'];

        $config['upload_path']          = './document/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 5000;
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
					$data['code_id'] = $code_id;
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
        
        redirect('document/'.$backLink.'/'.$backId);
    }

    // Proposal
    public function proposal()
    {
        $data['page']='daftar_proposal';
        $data['dokumenproposal']=$this->dokumen_model->getProposal();
        $data['verifikasiWaka']=$this->dokumen_model->getVerifikasiProposalWaka();
        $data['verifikasiPJ']=$this->dokumen_model->getVerifikasiProposalPJ();
        $data['verifikasiKepsek']=$this->dokumen_model->getVerifikasiProposalKepsek();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function detailProposal($id)
    {
        $data['page']='daftar_proposal';
        $data['id']= $id;
        $data['dokumenproposal']=$this->dokumen_model->getProposalID($id);
        $data['arsip']=$this->dokumen_model->getArsipProposalID($id);
        $data['pj']=$this->dokumen_model->getRevisiProposalPJ($id);
        $data['waka']=$this->dokumen_model->getRevisiProposalWaka($id);
        $data['kepsek']=$this->dokumen_model->getRevisiProposalKepsek($id);
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/detail_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function deleteProposal($id)
    {
        $delete=$this->dokumen_model->deleteProposal($id);
        if($delete > 0){
            $this->session->set_flashdata('success', 'Data Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus'); 
        }

        redirect('document/proposal');
    }

    public function addProposal()
    {
        $data['page']='daftar_proposal';
        $data['dokumenproposal']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_proposal',$data);
        $this->load->view('templates/footer'); 
    }
    
    public function updateProposal()
    {

        $tahun_akademik = $_POST['tahun_akademik_1'].' / '. $_POST['tahun_akademik_2'];
     
        $update=$this->dokumen_model->edit_data($tahun_akademik);
        if($update > 0)
        {
            $this->session->set_flashdata('success', 'Proposal berhasil diubah');
        }else
        {
            $this->session->set_flashdata('success', 'Proposal gagal diubah');
        }
        redirect('document/detailProposal/'.$_POST['back_id']);
    }

    public function do_addProposal()
    {
        $id= $this->dokumen_model->addProposal();
        echo $id;
        $code='proposal';
        $backid='proposal';
        $this->generalUpload($id,$code,$backid);
    }

    public function detailVerifikasiProposal($id)
    {
        $data['page']='verifikasi_proposal';
        $data['id']= $id;
        $data['dokumenproposal']=$this->dokumen_model->getProposalID($id);
        $data['arsip']=$this->dokumen_model->getArsipProposalID($id);
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_verifikasi_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function verifikasiProposal()
    {
        $data['page']='verifikasi_proposal';
        $data['dokumenproposal']=$this->dokumen_model->getProposalVerifikasi();
        $data['verifikasiWaka']=$this->dokumen_model->getVerifikasiProposalWaka();
        $data['verifikasiPJ']=$this->dokumen_model->getVerifikasiProposalPJ();
        $data['verifikasiKepsek']=$this->dokumen_model->getVerifikasiProposalKepsek();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/verifikasi_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function do_addVerifikasiProposal()
    {
        // echo $_POST['id_user'];
        $id= $this->dokumen_model->addVerifikasiProposal();
        redirect('document/verifikasiProposal/'.$_POST['back_id']);
    }

    // End Proposal

    // Laporan
    public function laporan()
    {
        $data['page']='daftar_laporan';
        $data['dokumenlaporan']=$this->dokumen_model->getLaporan();
        $data['check']=$this->dokumen_model->getLaporanCheck();
        $data['proposal']=$this->dokumen_model->getProposal();
        $data['verifikasiWaka']=$this->dokumen_model->getVerifikasiLaporanWaka();
        $data['verifikasiPJ']=$this->dokumen_model->getVerifikasiLaporanPJ();
        $data['verifikasiKepsek']=$this->dokumen_model->getVerifikasiLaporanKepsek();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function detailLaporan($id)
    {
        $data['page']='daftar_laporan';
        $data['id']= $id;
        $data['dokumenlaporan']=$this->dokumen_model->getLaporanID($id);
        $data['arsip']=$this->dokumen_model->getArsipLaporanID($id);
        $data['joinlaporan']=$this->dokumen_model->joinLaporanID($id);
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/detail_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function deleteLaporan($id)
    {
        $delete=$this->dokumen_model->deleteLaporan($id);
        if($delete > 0){
            $this->session->set_flashdata('success', 'Data Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus'); 
        }

        redirect('document/laporan');
    }

    public function addLaporan()
    {
        $data['page']='daftar_laporan';
        $data['check']=$this->dokumen_model->getLaporanCheck();
        $data['laporan']=$this->dokumen_model->getLaporan();
        $data['proposal']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_laporan',$data);
        $this->load->view('templates/footer'); 
    }

    public function updateLaporan()
    {
        $lbLaporan = $_POST['lb_laporan'];
     
        $update=$this->dokumen_model->edit_LPJ($lbLaporan);
        if($update > 0)
        {
            $this->session->set_flashdata('success', 'Laporan berhasil diubah');
        }else
        {
            $this->session->set_flashdata('success', 'Laporan gagal diubah');
        }
        redirect('document/detailLaporan/'.$_POST['back_id']);
    }

    public function do_addLaporan()
    {
        $id= $this->dokumen_model->addLaporan();
        $code='laporan';
        $backid='laporan';
        $this->generalUpload($id,$code,$backid);
    }

    public function detailVerifikasiLaporan($id)
    {
        $data['page']='verifikasi_laporan';
        $data['id']= $id;
        $data['dokumenlaporan']=$this->dokumen_model->joinLaporanID($id);
        $data['arsip']=$this->dokumen_model->getArsipLaporanID($id);
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_verifikasi_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function verifikasiLaporan()
    {
        $data['page']='verifikasi_laporan';
        $data['dokumenlaporan']=$this->dokumen_model->getLaporanVerifikasi();
        $data['verifikasiWaka']=$this->dokumen_model->getVerifikasiLaporanWaka();
        $data['verifikasiPJ']=$this->dokumen_model->getVerifikasiLaporanPJ();
        $data['verifikasiKepsek']=$this->dokumen_model->getVerifikasiLaporanKepsek();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/verifikasi_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function do_addVerifikasiLaporan()
    {
        $id= $this->dokumen_model->addVerifikasiLaporan();
        redirect('document/verifikasiLaporan/'.$_POST['back_id']);
    }
    // End Laporan

    // Kuesioner

    public function pengaturan()
    {
        $data['page']='pengaturan_kuesioner';
        $data['kategori']=$this->dokumen_model->getKategori();
        $data['pertanyaan']=$this->dokumen_model->getPertanyaan();
        $data['jawaban']=$this->dokumen_model->getJawaban();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/pengaturan_kuesioner',$data);
        $this->load->view('templates/footer');
    }

    public function detailKuesioner($id)
    {
        $data['page']='detail_kuesioner';
        $data['kuesioner']=$this->dokumen_model->getKuesioner();
        $data['kuesionerID']=$this->dokumen_model->getKuesionerID($id);
        $data['pertanyaan']=$this->dokumen_model->getIDPertanyaan($id);
        $data['kategori']=$this->dokumen_model->getKategori();
        $data['jawaban']=$this->dokumen_model->getJawaban();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/detail_kuesioner',$data);
        $this->load->view('templates/footer');
    }

    public function daftarKuesioner()
    {
        $data['page']='daftar_kuesioner';
        $data['kuesioner']=$this->dokumen_model->getKuesioner();
        // $data['kuesionerID']=$this->dokumen_model->getKuesionerID($id);
        // $data['pertanyaan']=$this->dokumen_model->getPertanyaan();
        // $data['kategori']=$this->dokumen_model->getKategori();
        // $data['jawaban']=$this->dokumen_model->getJawaban();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_kuesioner',$data);
        $this->load->view('templates/footer');
    }

    public function addKuesioner()
    {
        $data['page']='add_kuesioner';
        $data['kuesioner']=$this->dokumen_model->getKuesioner();
        $data['check']=$this->dokumen_model->getKuesionerCheck();
        $data['kategori']=$this->dokumen_model->getKategori();
        $data['proposal']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_kuesioner',$data);
        $this->load->view('templates/footer');
    }

    public function do_addKuesioner()
    {
        $insert= $this->dokumen_model->addKuesioner();
        if($insert > 0)
        {
            $this->session->set_flashdata('success', 'Kuesioner berhasil ditambah');
        }else
        {
            $this->session->set_flashdata('success', 'Kuesioner gagal ditambah');
        }
        redirect('document/addKuesioner');
    }

    public function do_addKategori()
    {
        $insert= $this->dokumen_model->addKategori();
        if($insert > 0)
        {
            $this->session->set_flashdata('success', 'Kategori berhasil ditambah');
        }else
        {
            $this->session->set_flashdata('success', 'Kategori gagal ditambah');
        }
        redirect('document/Pengaturan');
    }

    public function do_addPertanyaan()
    {
        
        $pertanyaan = $_POST['pertanyaan'];
        // echo json_encode ($pertanyaan);
        $insert= $this->dokumen_model->addPertanyaan($pertanyaan);
        if($insert > 0)
        {
            $this->session->set_flashdata('success', 'Pertanyaan berhasil ditambah');
        }else
        {
            $this->session->set_flashdata('success', 'Pertanyaan gagal ditambah');
        }
        redirect('document/Pengaturan');
    }

    public function deleteKuesioner($id)
    {
        $delete=$this->dokumen_model->deleteKuesioner($id);

        if($delete > 0){
            $this->session->set_flashdata('success', 'Kategori Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Kategori Gagal Dihapus'); 
        }

        redirect('document/Pengaturan');
    }

    public function deleteKategori($id)
    {
        $delete=$this->dokumen_model->deleteKategori($id);

        if($delete > 0){
            $this->session->set_flashdata('success', 'Kategori Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Kategori Gagal Dihapus'); 
        }

        redirect('document/Pengaturan');
    }

    public function deletePertanyaan($id)
    {
        $delete=$this->dokumen_model->deletePertanyaan($id);
        if($delete > 0){
            $this->session->set_flashdata('success', 'Pertanyaan Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Pertanyaan Gagal Dihapus'); 
        }

        redirect('document/Pengaturan');
    }

    public function generateKuesioner($id)
    {
        $insert= $this->dokumen_model->genKuesioner($id);
        redirect('document/addKuesioner');
    }
    //
    
    // Penugasan

    public function penugasan()
    {
        $data['page']='form_penugasan';
        $data['dokumenproposal']=$this->dokumen_model->getProposal();
        $data['penugasan']=$this->dokumen_model->getPenugasan();
        $data['guru']=$this->guru_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/form_penugasan',$data);
        $this->load->view('templates/footer');
    }

    public function do_addpenugasan()
    {
        $insert= $this->dokumen_model->addPenugasan();
        if($insert > 0)
        {
            $this->session->set_flashdata('success', 'Penugasan berhasil ditambah');
        }else
        {
            $this->session->set_flashdata('success', 'Penugasan gagal ditambah');
        }
        redirect('document/penugasan');
    }

    public function deletePenugasan($id)
    {
        $delete=$this->dokumen_model->deletePenugasan($id);

        if($delete > 0){
            $this->session->set_flashdata('success', 'Penugasan Dihapus'); 
        }else{
            $this->session->set_flashdata('error', 'Penugasan Gagal Dihapus'); 
        }

        redirect('document/penugasan');
    }

    // 
    
    





}
