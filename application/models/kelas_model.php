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

    public function deleteKelas($id)
    {
        $this->db->delete('kelas', ['id_kelas' => $id]);
    }

    public function addPeserta($id_siswa, $id_kelas)
    {
        $this->db->trans_start();
            $result = array();
                foreach($id_siswa AS $key => $val){
                    $result[] = array(
                    'id_kelas'  	=> $id_kelas,
                    'id_siswa'  	=> $_POST['id_siswa'][$key]
                    );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('peserta_kelas', $result);
        $this->db->trans_complete();
    }

    public function cekPeserta($getID)
    {
        return $this->db->get_where('peserta_kelas',['id_siswa'=>$getID])->result_array();
    }

    public function daftarPeserta($id)
    {
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        $this->db->join('peserta_kelas', 'peserta_kelas.id_siswa = siswa.id_siswa');
        $this->db->where('id_kelas',$id);
        return $this->db->get()->result_array();
    }

    public function getNamaKelas($id)
    {
        $query =$this->db->get_where('kelas', ['id_kelas'=>$id]);
        $ret = $query->row();
        return $ret->kelas.' '. $ret->jurusan.' '.$ret->sub;
    }

    public function getJumlahPeserta()
    {
        return $this->db->query('select kelas.*, count(peserta_kelas.id_siswa) as peserta
        FROM kelas LEFT JOIN peserta_kelas ON peserta_kelas.id_kelas = kelas.id_kelas
        GROUP BY kelas.id_kelas')->result_array();
    }


}