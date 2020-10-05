<?php

class Kelas_model extends CI_Model
{
    public function add()
    {
        $data = [
            "kelas" => $this->input->post('kelas', true),
            "jurusan" => $this->input->post('jurusan', true),
            "sub" => $this->input->post('sub', true)
        ];

        $this->db->insert('kelas', $data);
    }

    public function get()
    {
        return $this->db->get('kelas')->result_array();
    }

    // public function daftarPeserta($id)
    // {
    //     return $this->db->get_where('siswa',['id_kelas'=>$id])->result_array();
    // }

    public function deleteKelas($id)
    {
        $this->db->delete('kelas', ['id_kelas' => $id]);
    }
}