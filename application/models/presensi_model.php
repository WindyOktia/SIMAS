<?php

class Presensi_model extends CI_Model
{

    public function addHarian($tahun_akademik, $semester)
    {
        $data=[
            'tahun_akademik'=>$tahun_akademik,
            'semester'=>$semester,
            'tanggal'=>date('Y-m-d'),
            'hari'=>date('D'),
            'id_guru'=> $_POST['id'],
            'jam_masuk'=>date('H:i:s'),
            'metode'=>'rfid'
        ];

        $this->db->insert('presensi_harian',$data);
        return $this->db->affected_rows();
    }

    public function updateJamKeluar()
    {
        $this->db->set('jam_pulang', date('H:i:s'));
        $this->db->where('id_guru', $_POST['id']);
        $this->db->where('tanggal',date('Y-m-d'));
        $this->db->update('presensi_harian');
        return $this->db->affected_rows();
    }

    public function cekExistMasuk()
    {
        return $this->db->get_where('presensi_harian',['id_guru'=>$_POST['id'],'tanggal'=>date('Y-m-d')]);
    }

    public function getJamMasuk()
    {
        $query= $this->db->get_where('presensi_harian',['id_guru'=>$_POST['id'],'tanggal'=>date('Y-m-d')]);
        $ret = $query->row();
        return $ret->jam_masuk;
    }

    public function getIDPresensiHarian()
    {
        $query= $this->db->get_where('presensi_harian',['id_guru'=>$_POST['id']]);
        $ret = $query->row();
        return $ret->id_presensi_harian;
    }

    public function getRFID()
    {
        $query =$this->db->get_where('guru', ['rfid'=>$_POST['rfid']]);
        // $query =$this->db->get_where('guru', ['rfid'=>$id]);
        $ret = $query->row();
        if(isset($ret)){
            return $ret->id_guru;
        }else{
            return 'fail';
        }

    }

    public function getLibur()
    {
        return $this->db->get_where('libur',['tanggal_libur'=>date('Y-m-d')])->result_array();
    }

    public function getNama()
    {
        $query =$this->db->get_where('guru', ['id_guru'=>$_POST['id']]);
        $ret = $query->row();
        return $ret->nama_guru;
    }
    public function getJamhadirGuru($id)
    {
        return $this->db->query('SELECT id_guru,tahun_akademik,semester,tanggal, sec_to_time((SUM(jam_masuk)/COUNT(jam_masuk))-43200) AS rata_rata_jam_hadir_guru 
        FROM presensi_harian WHERE id_guru='.$id.' GROUP BY id_guru,tahun_akademik DESC ,semester DESC LIMIT 4')->result_array();
    }
    public function getDefaultJamHadir($id)
    {
        return $this->db->query('SELECT id_guru,tahun_akademik,semester,tanggal, sec_to_time((SUM(jam_masuk)/COUNT(jam_masuk))-43200) AS rata_rata_jam_hadir_guru 
        FROM presensi_harian WHERE id_guru='.$id.' GROUP BY id_guru,tahun_akademik DESC ,semester DESC LIMIT 4')->result_array();
    }
    
    public function getJamkerjaGuru($id)
    {
        return $this->db->query('SELECT * FROM `v_jam_kerja` WHERE id_guru= '.$id.' LIMIT 4')->result_array();
    }
    public function getDefaultJamKerja($id)
    {
        return $this->db->query('SELECT * FROM `v_jam_kerja` WHERE id_guru= '.$id.' LIMIT 4')->result_array();
    }

    public function cekJamMengajar($id,$hari,$jam)
    {
        return $this->db->query('SELECT * FROM jadwal_guru WHERE id_guru="'.$id.'" and hari="'.$hari.'" AND "'.$jam.'" BETWEEN jam_mulai AND jam_selesai LIMIT 1')->result_array();
    }

    public function cekPresensiMengajar()
    {
        return $this->db->get_where('presensi_mengajar',['id_jadwal_guru'=>$_POST['id_jadwal']])->result_array();
    }

    public function insertMengajar()
    {
        $data=[
            'id_jadwal_guru'=>$_POST['id_jadwal'],
            'tanggal'=>date('Y-m-d'),
            'jam_mulai'=>date('H:i:s'),
            'metode'=>'1'
        ];

        $this->db->insert('presensi_mengajar',$data);
        return $this->db->affected_rows();
    }

    public function updateJamSelesai()
    {
        $this->db->set('jam_selesai',date('H:i:s'));
        $this->db->where('id_jadwal_guru',$_POST['id_jadwal']);
        $this->db->update('presensi_mengajar');
        return $this->db->affected_rows();
    }

    public function getNotifMengajar($id_jadwal)
    {
        return $this->db->query('SELECT guru.nama_guru, mapel.nama_mapel, kelas.kelas, kelas.jurusan, kelas.sub FROM jadwal_guru, guru, mapel, kelas WHERE jadwal_guru.id_guru=guru.id_guru AND jadwal_guru.id_mapel=mapel.id_mapel AND jadwal_guru.id_kelas=kelas.id_kelas AND jadwal_guru.id_jadwal_guru="'.$id_jadwal.'"')->result_array();
    }

}