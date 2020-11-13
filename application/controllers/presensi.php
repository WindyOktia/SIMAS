<?php

class Presensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('presensi_model');
        $this->load->model('pengaturan_model');
    }

    public function index()
    {
        $this->load->view('templates/header_presensi');
        $this->load->view('presensi/main');
        $this->load->view('templates/footer');
    }

    public function getRFID()
    {
        $cek = $this->presensi_model->getRFID();
        echo json_encode($cek);
    }

    public function getLibur()
    {
        $cek = $this->presensi_model->getLibur();
        echo json_encode($cek);
    }

    public function harian()
    {
        $cekExistMasuk=$this->presensi_model->cekExistMasuk();
        if($cekExistMasuk->num_rows()==0){
            $this->insertPresensiHarian();
        }else{
            $jamMasuk = strtotime($this->presensi_model->getJamMasuk());
            $current_time= strtotime(date('H:i:s'));
            $interval = abs($current_time-$jamMasuk);
            $diff_time = round($interval / 60);

            if($diff_time >=1 ) // selisih waktu
            {
                $this->updateJamKeluar();
            }else
            {
                echo json_encode('false : <= 15 menit');
            }
        }
    }

    function insertPresensiHarian()
    {
        $akademik=$this->pengaturan_model->getAkademik();
        $tahun_akademik = "";
        $semester="";
        foreach($akademik as $akad){
            $tahun_akademik= $akad['tahun_akademik'];
            $semester= $akad['semester'];
        }
        
        $insert = $this->presensi_model->addHarian($tahun_akademik, $semester);
        if($insert != 0)
        {
            echo json_encode('success : jam masuk');
        }else
        {
            echo json_encode('failed : jam masuk');
        }
    }

    function updateJamKeluar()
    {
        // echo json_encode($_POST['id']);
        $update = $this->presensi_model->updateJamKeluar();
        if($update != 0)
        {
            echo json_encode('success : jam keluar');
        }else
        {
            echo json_encode('failed : jam keluar');
        }
    }

    public function nama_pegawai()
    {
        echo json_encode($this->presensi_model->getNama()).' pada jam <b>'. date('H:i:s').'</b>';
    }

    public function mengajar()
    {
        $this->load->view('templates/header_presensi');
        $this->load->view('presensi/mengajar');
        $this->load->view('templates/footer');
    } 

    public function cekJamMengajar()
    {
        $id = $_POST['id'];
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

        $jam = date('H:i:s');

        echo json_encode($this->presensi_model->cekJamMengajar($id,$hari,$jam));
    }

    public function presensiMengajar()
    {
        echo json_encode($this->presensi_model->cekPresensiMengajar());
    }

    public function insertMengajar()
    {
        $insert = $this->presensi_model->insertMengajar();
        if($insert >=1){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function updateMengajar()
    {
        $cekPresensi = $this->presensi_model->cekPresensiMengajar();

        foreach($cekPresensi as $cek){
            $jamMulai = strtotime($cek['jam_mulai']);
        }


        $current_time= strtotime(date('H:i:s'));
        $interval = abs($current_time-$jamMulai);
        $diff_time = round($interval / 60);

        if($diff_time >=1 ) // selisih waktu
        {
            $update = $this->presensi_model->updateJamSelesai();
            if($update>=1){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else
        {
            echo '<_15';
        }
    }

    public function getNotifMengajar()
    {
        $id_jadwal= $_POST['id_jadwal'];
        
        echo json_encode($this->presensi_model->getNotifMengajar($id_jadwal));
    }
}