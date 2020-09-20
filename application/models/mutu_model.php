<?php

class Mutu_model extends CI_Model
{
    public function addMutu()
    {
        $data=[
            
            'tahun_akademik'=>$_POST['th_akademik1'].'/'.$_POST['th_akademik2'],
            'semester'=>$_POST['semester'],
            'nilai'=>$_POST['nilai'],
            'keterangan'=>$_POST['keterangan'],
            
        ];
        $this->db->insert('mutu',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getMutu()
    {
        return $this->db->get('mutu')->result_array();
    }

}