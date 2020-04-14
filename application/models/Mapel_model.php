<?php
class Mapel_model extends CI_Model
{
    public function Add()
    {
        $data = [
            "nama_mapel" => $this->input->post('nama_mapel', true),
            "deskripsi" => $this->input->post('deksripsi_mapel', true)
        ];

        $this->db->insert('mapel', $data);
    }

    public function getMapel()
    {
        return $this->db->get('mapel')->result_array();
    }

    public function update($id,$nama,$deskripsi)
    {
        $this->db->set('nama_mapel', $nama);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel');
    }

    public function delete($id)
    {
        $this->db->delete('mapel', ['id_mapel' => $id]);
    }
}