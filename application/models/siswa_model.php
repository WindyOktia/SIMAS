<?php

class Siswa_model extends CI_Model
{
    public function add()
    {
        $nipd=$this->input->post('nipd', true);
        $query = $this->db->get_where('siswa', ['nipd' => $nipd]);
        if ($query->num_rows() == 0) {
            $data = [
                "nipd" => $this->input->post('nipd', true),
                "nama_siswa" => $this->input->post('nama', true),
                "nama_ibu" => $this->input->post('ibu', true),
                "nama_panggilan_ibu" => $this->input->post('panggilan_ibu', true),
                "alamat" => $this->input->post('alamat', true),
            ];

        $this->db->insert('siswa', $data);
        return true;
        }
        return false;
    }

    public function daftarSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        // $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas','left');
        return $this->db->get()->result_array();
    }

    public function getNIPD()
    {
        return $this->db->get_where('siswa',['nipd'=>$_POST['nipd']]);
    }

    public function getSiswaID($nipd, $ibu)
    {
        $this->db->select('siswa.*, kelas.kelas, kelas.jurusan, kelas.sub');
        $this->db->from('siswa');
        $this->db->join('peserta_kelas', 'peserta_kelas.id_siswa = siswa.id_siswa');
        $this->db->join('kelas', 'peserta_kelas.id_kelas = kelas.id_kelas');
        $this->db->where('nipd',$nipd);
        $this->db->where('nama_panggilan_ibu',$ibu);
        return $this->db->get()->result_array();
    }

    public function getNama()
    {
        $query =$this->db->get_where('siswa', ['nipd'=>$_POST['nipd']]);
        $ret = $query->row();
        return $ret->nama_siswa.'/'.$ret->id_siswa;
    }

    public function getID()
    {
        $query =$this->db->get_where('siswa', ['nipd'=>$_POST['nipd']]);
        $ret = $query->row();
        return $ret->id_siswa.'/null';
    }

    
    
}