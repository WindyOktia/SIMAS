<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('mapel_model');
        $this->load->model('siswa_model');
        $this->load->model('guru_model');
        $this->load->model('login_model');
        $this->load->model('pengaturan_model');
        if($this->login_model->is_role() != "1"){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }


    public function index()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }

    public function informasi()
    {
        $data['page']='dashboard';

        $data['informasi']=$this->pengaturan_model->getInformasi();
        $this->load->view('templates/header',$data);
        $this->load->view('informasi/informasi',$data);
        $this->load->view('templates/footer');
    }

    public function tbhInformasi()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('informasi/add');
        $this->load->view('templates/footer');
    }

    public function addInformasi()
    {
        $insert = $this->pengaturan_model->addInformasi();
        if($insert>0){
            $this->session->set_flashdata('success', 'Informasi berhasil ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Informasi gagal ditambahkan');
        }
        redirect('admin/informasi');
    }

    public function editInfo()
    {
        $insert = $this->pengaturan_model->editInfo();
        if($insert>0){
            $this->session->set_flashdata('success', 'Informasi berhasil diubah');
        }else{
            $this->session->set_flashdata('error', 'Informasi gagal diubah');
        }
        redirect('admin/informasi');
    }

    public function deleteInformasi($id)
    {
        $delete = $this->pengaturan_model->deleteInformasi($id);
        if($delete>0){
            $this->session->set_flashdata('success', 'Informasi berhasil dihapus');
        }else{
            $this->session->set_flashdata('error', 'Informasi gagal dihapus');
        }
        redirect('admin/informasi');
    }

    public function detailInformasi($id)
    {
        $data['page']='dashboard';

        $data['informasi']=$this->pengaturan_model->getInformasiID($id);
        $this->load->view('templates/header',$data);
        $this->load->view('informasi/detail',$data);
        $this->load->view('templates/footer');
    }


    public function detailRecordPresensi()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/detail');
        $this->load->view('templates/footer');
    }
    
    public function detailRecordKegiatan()
    {
        $data['page']='dashboard';
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/detail');
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
            $this->kelas_model->Add();
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }
        redirect('admin/kelas'); 
    }

    public function deleteKelas($id)
    {
        $this->kelas_model->deleteKelas($id);
        $this->session->set_flashdata('error', 'Kelas dihapus');
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

    // Mata pelajaran
    public function mapel()
    {
        $data['page']="mapel";
        $data['mapel']=$this->mapel_model->getMapel();
        $this->load->view('templates/header',$data);
        $this->load->view('mapel/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambahMapel()
    {
        $this->mapel_model->Add();
        $this->session->set_flashdata('success', 'Data Ditambahkan');
        redirect('admin/mapel'); 
    }

    public function editMapel()
    {   
        $id=$this->input->post('id_mapel',true);
        $nama=$this->input->post('nama_mapel',true);
        $deskripsi=$this->input->post('deksripsi_mapel',true);
        $this->mapel_model->Update($id,$nama,$deskripsi);
        $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('admin/mapel'); 
    }

    public function deleteMapel($id)
    {
        $this->mapel_model->Delete($id);
        $this->session->set_flashdata('error', 'Data Berhasil Dihapus');
        redirect('admin/mapel'); 
    }

    // End of mata pelajaran

    // guru
    public function guru()
    {
        $data['page']='addGuru';
        $this->load->view('templates/header',$data);
        $this->load->view('guru/addGuru');
        $this->load->view('templates/footer');
    }

    public function deleteGuru($id)
    {
        $this->guru_model->deleteGuru($id);
        $this->session->set_flashdata('error', 'Data Guru dihapus');
        redirect('admin/daftarGuru');
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

    public function editGuru()
    {
        $cek = $this->guru_model->editGuru();
        if($cek==false)
        {
            $this->session->set_flashdata('error', 'RFID / NIP Sudah Terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Data Guru berhasil diubah');
        }
        redirect('admin/daftarGuru');
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

    // pengguna
    public function pengguna()
    {
        $data['page']='pengaturan';
        $data['user']=$this->pengaturan_model->getPengguna();
        $this->load->view('templates/header',$data);
        $this->load->view('pengaturan/pengguna',$data);
        $this->load->view('templates/footer');
    }

    public function addPengguna()
    {
        $res=$this->pengaturan_model->addPengguna();
        if($res==false)
        {
            $this->session->set_flashdata('error', 'Username telah terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'User Berhasil Ditambahkan');
        }
        redirect('admin/pengguna');
    }

    public function deletePengguna($id)
    {
        $this->pengaturan_model->deletePengguna($id);
        $this->session->set_flashdata('error', 'User Berhasil dihapus');
        redirect('admin/pengguna');
    }

    public function editPengguna()
    {
        $res=$this->pengaturan_model->editPengguna();
        if($res==false)
        {
            $this->session->set_flashdata('error', 'Username telah terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Data diubah');
        }
        redirect('admin/pengguna');
    }

    //Track Record
    public function trackRecord()
    {
        $data['page']="trackrecord";
        //$data['peserta']=$this->kelas_model->daftarPeserta($id);
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/trackRecord',$data);
        $this->load->view('templates/footer');
    }
    // end of pengguna

    // Kegiatan EL
    // Laporan & Proposal
    public function proposal()
    {
        $data['page']='daftar_proposal';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_proposal',$data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['page']='daftar_laporan';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftar_laporan',$data);
        $this->load->view('templates/footer');
    }

    public function addLaporan()
    {
        $data['page']='daftar_laporan';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_laporan',$data);
        $this->load->view('templates/footer'); 
    }

    public function addProposal()
    {
        $data['page']='daftar_proposal';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/add_proposal',$data);
        $this->load->view('templates/footer'); 
    }
    // Laporan & Proposal

    // OSIS
    public function osis()
    {
        $data['page']='tambahOsis';
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/tambahOsis',$data);
        $this->load->view('templates/footer');
    }

    public function addOsis()
    {
        $cek = $this->siswa_model->add();
        if($cek==false)
        {
            $this->session->set_flashdata('error', 'NIPD Sudah Terdaftar');
        }else
        {
            $this->session->set_flashdata('success', 'Siswa Berhasil Ditambahkan');
        }
        redirect('admin/osis');
    }

    public function daftarOsis()
    {
        $data['page']='daftarOsis';
        $data['daftar']=$this->siswa_model->daftarSiswa();
        $data['kelas']=$this->kelas_model->get();
        $this->load->view('templates/header',$data);
        $this->load->view('kegiatan/daftarOsis',$data);
        $this->load->view('templates/footer');
    }

    // public function hapusSiswa()
    // {
        
    // }
    // End Of OSIS

    // End Of kegiatan El

}
