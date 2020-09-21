<?php
class Mutu_model extends CI_Model
{
    public function addMutu()
    {
            $tahun_akademik= $this->input->post('tahun_akademik');    
            $semester= $this->input->post('semester');    
            $nilai= $this->input->post('nilai');    
            $keterangan= $this->input->post('keterangan');    
        $data = array(
                'tahun_akademik' =>$tahun_akademik,
                'semester' =>$semester,
                'nilai' =>$nilai,
                'keterangan' =>$keterangan,
        );

            $this->db->insert('mutu', $data);
    }

    public function getMutu()
    {
        return $this->db->get('mutu')->result_array();
    }
}