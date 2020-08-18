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
        if($this->login_model->is_role() == ""){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }
    
    public function generalUpload($id,$code,$backid)
    {
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

    // Laporan & Proposal
    public function proposal()
    {
        $data['page']='daftar_proposal';
        $data['dokumen']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function detailProposal($id)
    {
        $data['page']='daftar_proposal';
        $data['id']= $id;
        $data['dokumen']=$this->dokumen_model->getProposalID($id);
        $data['arsip']=$this->dokumen_model->getArsipLaporanID($id);
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

    public function detailLaporan($id)
    {
        $data['page']='daftar_laporan';
        $data['dokumen']=$this->dokumen_model->getLaporanID($id);
        $data['proposal']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/detail_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['page']='daftar_laporan';
        $data['proposal']=$this->dokumen_model->getLaporan();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function addLaporan()
    {
        $data['page']='daftar_laporan';
        $data['proposal']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_laporan',$data);
        $this->load->view('templates/footer'); 
    }

    public function addProposal()
    {
        $data['page']='daftar_proposal';
        $data['dokumen']=$this->dokumen_model->getProposal();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_proposal',$data);
        $this->load->view('templates/footer'); 
    }

    function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
	}

    public function do_addProposal()
    {
        $id= $this->dokumen_model->addProposal();
        $code='proposal';
        $backid='proposal';
        $this->generalUpload($id,$code,$backid);
    }

    public function do_addLaporan()
    {
        $id= $this->dokumen_model->addLaporan();
        $code='laporan';
        $backid='laporan';
        $this->generalUpload($id,$code,$backid);
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

    public function update1($where, $data, $table)
    {
        return $res = $this->db->update($table, $data, $where);
    }

    public function updateProposalKegiatan()
    {
        $this->db->trans_star();

        $id = $this->input->post('id_propoasal');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $tahun_akademik = $this->input->post('tahun_akademik');
        $semester = $this->input->post('semester');
        $lb_kegiatan = $this->input->post('lb_kegiatan');
        $tj_kegiatan = $this->input->post('tujuan_kegiatan');
        $hp_kegiatan = $this->input->post('harapan_kegiatan');
        $tgl_pelaksana = $this->input->post('tgl_pelaksana');
        $tmpt = $this->input->post('tempat');
        $anggaran = $this->input->post('tot_anggaran');
        $tgl_pengajuan = $this->input->post('tgl_pengajuan');

        $data = array (
            'nama_kegiatan' => $nama_kegiatan,
            'tahun_akaddemik' => $tahun_akademik,
            'semester' => $semester,
            'lb_kegiatan' => $lb_kegiatan,
            'tujuan_kegiatan' => $tj_kegiatan,
            'harapan_kegiatan' => $hp_kegiatan,
            'tgl_pelaksanaan' => $tgl_pelaksana,
            'tempat' => $tmpt,
            'tot_anggaran' => $anggaran,
            'tgl_pengajuan' => $tgl_pengajuan
        );

        $this->db->where('id_proposal', $id);
        $this->db->update('proposal', $data);
        $this->db->trans_complete();

        redirect('document/'.$backLink.'/'.$backId);
    }

    // Laporan & Proposal
    






}
