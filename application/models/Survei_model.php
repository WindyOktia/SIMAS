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
                    'tanggal_mulai'=>$_POST['tgl_mulai'],
                    'tanggal_selesai'=>$_POST['tgl_selesai']
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

    public function getKelasID()
    {
        return $this->db->get_where('peserta_kelas',['id_siswa'=>$this->session->userdata('id_siswa')])->result_array();
    }

    public function getKelasName($id)
    {
        return $this->db->get_where('kelas',['id_kelas'=>$id])->result_array();
    }

    public function getDaftarGuru($tahunAkademik, $semester, $id)
    {
        return $this->db->query('SELECT DISTINCT(guru.nama_guru), guru.id_guru FROM jadwal_guru, guru WHERE  jadwal_guru.id_guru=guru.id_guru AND jadwal_guru.id_kelas='.$id.'')->result_array();
    }

    public function getSurveikegiatan()
    {
        $this->db->trans_start();
        $this->db->select('kuesioner_kegiatan.id_kuesioner, proposal.nama_kegiatan, kuesioner_kegiatan.deskripsi, kuesioner_kegiatan.tgl_mulai, kuesioner_kegiatan.tgl_selesai');
        $this->db->from('kode_kuesioner');
        $this->db->from('proposal');
        $this->db->where('kuesioner_kegiatan.id_proposal = proposal.id_proposal');
        $this->db->where('kuesioner_kegiatan.id_kuesioner = kode_kuesioner.id_kuesioner');
        $this->db->where(['kode_kuesioner.link_kuesioner'=>$_GET['kode']]);
        return $this->db->get('kuesioner_kegiatan')->result_array();
        $this->db->trans_complete();
    }

    public function addFormkuesioner($kuesioner,$pertanyaan,$opsi,$saran)
    {
        $this->db->trans_start();
			//INSERT TO PACKAGE
			$data = [
                "id_siswa" => $this->session->userdata('id_siswa'),
                "saran" => $saran,
                "id_kuesioner" => $kuesioner
            ];
    
            $this->db->insert('trans_kuesioner', $data);
			//GET ID PACKAGE
			$package_id = $this->db->insert_id();
			$result = array();
			    foreach($opsi AS $key => $val){
				     $result[] = array(
				      'id_tkuesioner'  	=> $package_id,
				      'id_pertanyaan'  	=> $key,
				      'id_jawaban'  	=> $opsi[$key]
				     );
			    }      
			//MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('trans_kuesioner_opsi', $result);

		$this->db->trans_complete();
    }

}