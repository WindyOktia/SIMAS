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
    public function getLaporanMutuID($id)
    {
        return $this->db->get_where('mutu',['id_mutu'=> $id])->result_array();
    }
    public function getLink($code_id)
    {
        return $this->db->get_where('trans_doc',['code_id'=> $code_id])->result_array();
    }

    public function editMutu($tahun_akademik)
    {
        $this->db->set('tahun_akademik',$tahun_akademik);
        $this->db->set('semester',$_POST['semester']);
        $this->db->set('nilai',$_POST['nilai']);
        $this->db->set('keterangan',$_POST['keterangan']);
        $this->db->where('id_mutu',$_POST['id_mutu']);
        $this->db->update('mutu');
        return $this->db->affected_rows();
    }
    public function deleteMutuID($id)
    {
        $this->db->delete('mutu',['id_mutu'=>$id]);
        return $this->db->affected_rows();
    }

    public function getnilaiKegiatan()
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, 
        SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai')->result_array();
    }

    public function gettahunAkademik()
    {
        return $this->db->query("SELECT DISTINCT(tahun_akademik) as tahun_akademik FROM proposal")->result_array();
    }
}