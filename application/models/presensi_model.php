<?php

class Presensi_model extends CI_Model
{
    public function add()
    {
        $rfid=$this->input->post('id', true);
        $query = $this->db->get_where('guru', ['rfid' => $rfid]);
        if ($query->num_rows() == 0) {   
            return false;
        }else{
            $date=date("Y-m-d");
            $day= date("l");
            $start=date("H:i:s");
            $end=date("H:i:s");
            $this->db->query('INSERT INTO presensi_harian(tanggal, hari, id_guru, jam_masuk, jam_pulang) SELECT "'.$date.'","'.$day.'",id_guru, "'.$start.'","'.$end.'" FROM guru WHERE rfid="'.$rfid.'";');
            return true;

        }
    }

    public function getRFID()
    {
        return $this->db->get_where('guru',['rfid'=>$_POST['rfid']])->result_array();
    }

    public function getLibur()
    {
        return $this->db->get_where('libur',['tanggal_libur'=>date('Y-m-d')])->result_array();
    }

    public function getNama($id)
    {
        return $this->db->get_where('guru', ['rfid'=>$id])->result_array();
    }

}