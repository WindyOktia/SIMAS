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

        $this->load->library("excel");
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
            $dataSiswa= $this->siswa_model->getSiswaID($nipd,$ibu);

            // save session
            if(count($dataSiswa)>0){
                foreach($dataSiswa as $idSiswa)
                {
                    $newdata = array(
                        'id_siswa'  => $idSiswa['id_siswa'],
                        'nama_siswa'  => $idSiswa['nama_siswa'],
                        'logged_in' => TRUE
                    );
     
                    $this->session->set_userdata($newdata);
                }
            }
        }
        $data['siswa']=$this->siswa_model->daftarSiswa();
        $this->load->view('siswa/validasi',$data);
    }

    public function survei()
    {
        if($this->session->userdata('id_siswa')==''){
            redirect('siswa/validasi');
        }
        
        $data['pertanyaan']= $this->survei_model->getPertanyaan();
        $kelasID = $this->survei_model->getKelasID();

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

        if(isset($_GET['kode']))
        {
            $data['kuesionerkegiatan']= $this->survei_model->getSurveikegiatan();
        }

        $this->load->view('siswa/survei',$data);
    }

    public function addFormkuesioner($id)
    {
        $data['page']='form_kuesioner';
        $data['kuesioner']=$this->dokumen_model->getKuesioner();
        $data['kuesionerID']=$this->dokumen_model->getKuesionerID($id);
        $data['pertanyaan']=$this->dokumen_model->getPertanyaan($id);
        $data['kategori']=$this->dokumen_model->getKategori();
        $data['jawaban']=$this->dokumen_model->getJawaban($id);
        $this->load->view('templates/header_kuesioner',$data);
        $this->load->view('kegiatan/form_kuesioner',$data);
        $this->load->view('templates/footer');
    }

    public function do_addFormkuesioner()
    {
        // $nipd = $this->session->userdata('nipd');
        $kuesioner = $_POST['id_kuesioner'];
        $pertanyaan = $_POST['pertanyaan'];
        $opsi = $_POST['opsi'];
        $saran = $_POST['saran'];
        $insert= $this->survei_model->addFormkuesioner($kuesioner,$pertanyaan,$opsi,$saran);
        if($insert > 0)
        {
            $this->session->set_flashdata('success', 'Kuesioner berhasil diisi');
        }else
        {
            $this->session->set_flashdata('success', 'Kuesioner gagal diisi');
        }
        redirect('siswa/survei');
    }

    public function logoutSurvei()
    {
        $this->session->sess_destroy();
        redirect('siswa/validasi');
    }

    public function nama_siswa()
    {
        $getID = $this->siswa_model->getID();

        $cekPeserta = $this->kelas_model->cekPeserta($getID);

        if(count($cekPeserta)>=1){
            foreach($cekPeserta as $getNamaKelas)
            {
                $namaKelas = $this->kelas_model->getNamaKelas($getNamaKelas['id_kelas']);
                echo json_encode($namaKelas.'/null');
            }
        }else{
            echo json_encode($this->siswa_model->getNama());
        }

    }

    public function exportSiswa()
    { 
        //membuat objek
        $objPHPExcel = new PHPExcel();
        $data = $this->db->query("
            SELECT siswa.*, concat(kelas.kelas,' ', kelas.jurusan,' ',kelas.sub) as kelas
            FROM siswa
            LEFT JOIN peserta_kelas ON peserta_kelas.id_siswa=siswa.id_siswa
            LEFT JOIN kelas ON peserta_kelas.id_kelas = kelas.id_kelas
            GROUP BY siswa.id_siswa");
         // Nama Field Baris Pertama
        $fields = $data->list_fields();
        
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Mengambil Data
        $row = 2;
        foreach($data->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);

        //Set Title
        $objPHPExcel->getActiveSheet()->setTitle('Data Siswa');



        $objPHPExcel->setActiveSheetIndex(0);

       
        //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        //Header
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        //Nama File
        // header('Content-Disposition: attachment;filename="Survei_Guru"'.$id.'".xlsx"');
        header('Content-Disposition: attachment;filename="Data_Siswa.xlsx"');

        //Download
        $objWriter->save("php://output");
    }

    public function exportSiswaID($id)
    { 
        //membuat objek
        $namaKelas = $this->kelas_model->getNamaKelas($id);
        $objPHPExcel = new PHPExcel();
        $data = $this->db->query("
            SELECT siswa.*, concat(kelas.kelas,' ', kelas.jurusan,' ',kelas.sub) as kelas
            FROM siswa
            LEFT JOIN peserta_kelas ON peserta_kelas.id_siswa=siswa.id_siswa
            LEFT JOIN kelas ON peserta_kelas.id_kelas = kelas.id_kelas
            WHERE kelas.id_kelas=".$id."
            GROUP BY siswa.id_siswa");
         // Nama Field Baris Pertama
        $fields = $data->list_fields();
        
        $col = 0;
        foreach ($fields as $field)
        {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
 
        // Mengambil Data
        $row = 2;
        foreach($data->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);

        //Set Title
        $objPHPExcel->getActiveSheet()->setTitle('Data Siswa');



        $objPHPExcel->setActiveSheetIndex(0);

       
        //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        //Header
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        //Nama File
        // header('Content-Disposition: attachment;filename="Survei_Guru"'.$id.'".xlsx"');
        header('Content-Disposition: attachment;filename="Data siswa kelas "'.$namaKelas.'".xlsx"');

        //Download
        $objWriter->save("php://output");

    }
}