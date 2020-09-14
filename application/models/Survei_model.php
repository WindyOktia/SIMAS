<?php

class Survei_model extends CI_Model
{
    public function addPertanyaan()
    {
        $data=[
            'pertanyaan'=>$_POST['pertanyaan']
        ];

        $this->db->insert('soal_survei_guru',$data);
        
        return $this->db->affected_rows();
    }

    public function getPertanyaan()
    {
        return $this->db->get('soal_survei_guru')->result_array();
    }

    public function hapusPertanyaan($id)
    {
        $this->db->delete('soal_survei_guru',['id_soal_survei_guru'=>$id]);
        return $this->db->affected_rows();
    }

    public function addSurveiGuru()
    {
        $guru = $_POST['id_guru'];

        $cekData= $this->db->get_where('survei_guru',['tahun_akademik'=>$_POST['tahun_akademik'],'semester'=>$_POST['semester']]);

        if($cekData->num_rows()==0){
            $this->db->trans_start();
                //INSERT TO PACKAGE
                $data = [
                    'tahun_akademik'=>$_POST['tahun_akademik'],
                    'semester'=>$_POST['semester'],
                    'tanggal_mulai'=>date('Y-m-d H:i:s')
                ];
        
                $this->db->insert('survei_guru', $data);
                //GET ID PACKAGE
                $package_id = $this->db->insert_id();
                
                $result = array();
                    foreach($guru AS $key => $val){
                         $result[] = array(
                          'id_survei_guru'  	=> $package_id,
                          'id_guru'  	=> $_POST['id_guru'][$key]
                         );
                    }      
                //MULTIPLE INSERT TO DETAIL TABLE
                $this->db->insert_batch('trans_survei_guru', $result);
            $this->db->trans_complete();

            return true;
        }else{
            return false;
        }
    }

    public function getSurveiGuru()
    {
        return $this->db->query('SELECT guru.nama_guru, survei_guru.tahun_akademik, survei_guru.semester from guru, survei_guru, trans_survei_guru where trans_survei_guru.id_survei_guru=survei_guru.id_survei_guru AND guru.id_guru=trans_survei_guru.id_guru')->result_array();
    }

    public function getSurveiID()
    {
        return $this->db->get('survei_guru')->result_array();
    }

    public function deleteSurveiGuru($id)
    {
        $this->db->delete('survei_guru',['id_survei_guru'=>$id]);
        return $this->db->affected_rows();
    }
}