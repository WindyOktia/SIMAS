<?php

class siswa_model extends CI_Model
{
    public function add()
    {
        $nipd=$this->input->post('nipd', true);
        $query = $this->db->get_where('siswa', ['nipd' => $nipd]);
        if ($query->num_rows() == 0) {
            $data = [
                "nipd" => $this->input->post('nipd', true),
                "nama_siswa" => $this->input->post('nama', true),
                "id_kelas" => $this->input->post('id_kelas', true),
                "nama_ibu" => $this->input->post('ibu', true),
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
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        return $this->db->get()->result_array();
    }

    
}