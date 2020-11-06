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

    public function getmodel1NonSemester($dari)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND tahun_akademik = "'.$dari.'" AND Nilai < 85 Then 1 Else 0 End ) as Cukup, 
        SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai')->result_array();
    }

    public function getmodel1Semester($semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND semester = "'.$semester.'" AND Nilai < 85 Then 1 Else 0 End ) as Cukup, 
        SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai')->result_array();
    }

    public function getmodel1Semua($dari, $semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND tahun_akademik="'.$dari.'" AND semester = "'.$semester.'" AND Nilai < 85 Then 1 Else 0 End ) as Cukup, 
        SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai')->result_array();
    }

    public function getnilaiKegiatanModel2()
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, 
        SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai')->result_array();
    }
    
    public function getnilaiBeetwen0($dari)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where tahun_akademik 
        BETWEEN "'.$dari.'" AND (SELECT Max(tahun_akademik)FROM v_nilai)')->result_array();
    }
    public function getnilaiBeetwen1($dari,$sampai)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where tahun_akademik BETWEEN "'.$dari.'" AND "'.$sampai.'"')->result_array();
    }

    public function getnilaiBeetwen2($dari,$sampai,$semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN "'.$dari.'" AND "'.$sampai.'"')->result_array();
    }
    
    public function getnilaiBeetwen3($sampai,$semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN (SELECT MIN(tahun_akademik)FROM v_nilai) AND "'.$sampai.'"')->result_array();
    }

    public function getnilaiBeetwen4($semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where semester="'.$semester.'"')->result_array();
    }

    public function getnilaiBeetwen5($dari,$semester)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN "'.$dari.'" AND (SELECT MIN(tahun_akademik)FROM v_nilai)')->result_array();
    }
    
    public function getnilaiBeetwen6($sampai)
    {
        return $this->db->query('SELECT SUM(CASE When Nilai>= 85 Then 1 Else 0 End ) as Baik, 
        SUM(CASE When Nilai>= 60 AND Nilai < 85 Then 1 Else 0 End ) as Cukup, SUM(CASE When Nilai< 60 Then 1 Else 0 End ) as Kurang 
        FROM v_nilai where tahun_akademik 
        BETWEEN (SELECT MIN(tahun_akademik)FROM v_nilai) AND "'.$sampai.'"')->result_array();
    }

    public function gettahunAkademik()
    {
        return $this->db->query("SELECT DISTINCT(tahun_akademik) as tahun_akademik FROM proposal")->result_array();
    }
}