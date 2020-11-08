<?php

class Guru_model extends CI_Model
{
    public function add()
    {
        $this->db->trans_start();
            $data = [
                'rfid' => $_POST['rfid'],
                'nip' => $_POST['nip'],
                'nama_guru' => $_POST['nama'],
                'alamat' => $_POST['alamat']
            ];

            $this->db->insert('guru', $data);
        $this->db->trans_complete();

        $this->db->trans_start();
            $data = [
                'username' => $_POST['nip'],
                'password' => md5($_POST['pass']),
                'nama' => $_POST['nama'],
                'role' => '15',
                'status' => '0'
            ];

            $this->db->insert('user', $data);
        $this->db->trans_complete();
        return true;
    }

    public function editGuru($id_guru,$nip, $rfid, $nama, $alamat, $password, $status)
    {
        if($nip != '')
        {
            $this->db->set('nip',$nip);
        }

        if($rfid !='')
        {
            $this->db->set('rfid',$rfid);
        }

        if($nama !='')
        {
            $this->db->set('nama_guru',$nama);
        }

        if($alamat !='')
        {
            $this->db->set('alamat',$alamat);
        }

        if($status !='')
        {
            $this->db->set('status_guru',$status);
        }

        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru');
        return $this->db->affected_rows();
    }

    public function updateUser($niplama,$nip, $password, $nama)
    {
        if($nip !='')
        {
            $this->db->set('username',$nip);
        }

        if($password !='')
        {
            $this->db->set('password',md5($password));
        }

        if($nama !='')
        {
            $this->db->set('nama',$nama);
        }

        $this->db->where('username', $niplama);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function deleteGuru($id)
    {
        $this->db->delete('guru', ['nip' => $id]);
        $this->db->delete('user', ['username' => $id]);
    }

    public function get()
    {
        return $this->db->get('guru')->result_array();
    }

    public function getId($id)
    {
        return $this->db->get_where('guru',['id_guru'=>$id])->result_array();
    }

    public function getJadwal($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_guru');
        $this->db->join('kelas', 'jadwal_guru.id_kelas = kelas.id_kelas');
        $this->db->join('mapel', 'jadwal_guru.id_mapel = mapel.id_mapel');
        $this->db->where('id_guru',$id);
        return $this->db->get()->result_array();
    }

    public function getJadwalAll()
    {
        return $this->db->query('SELECT DISTINCT(guru.id_guru) as id_guru, count(jadwal_guru.id_jadwal_guru) as beban_mengajar, COUNT(DISTINCT(jadwal_guru.id_mapel)) as jml_mapel FROM `jadwal_guru` RIGHT JOIN guru ON jadwal_guru.id_guru=guru.id_guru GROUP BY id_guru')->result_array();     
    }

    public function addJadwal($tahun_akademik, $semester,$guru, $hari, $kelas, $mulai, $selesai)
    {
        // $this->db->trans_start();
		// 	$result = array();
		// 	    foreach($hari AS $key => $val){
		// 		     $result[] = array(
		// 		      'tahun_akademik'  	=> $_POST['tahun_akademik'],
		// 		      'semester'  	=> $_POST['semester'],
		// 		      'hari'  	=> $_POST['hari'][$key],
		// 		      'id_kelas'  	=> $_POST['kelas'][$key],
		// 		      'id_mapel'  	=> $_POST['mapel'][$key],
		// 		      'jam_mulai'  	=> $_POST['mulai'][$key],
		// 		      'jam_selesai'  	=> $_POST['selesai'][$key],
		// 		      'id_guru'  	=> $_POST['guru']
		// 		     );
		// 	    }      
		// 	//MULTIPLE INSERT TO DETAIL TABLE
		// 	$this->db->insert_batch('jadwal_guru', $result);
        // $this->db->trans_complete();
        // return true;

        $data=[
            'tahun_akademik'  	=> $_POST['tahun_akademik'],
            'semester'  	=> $_POST['semester'],
            'hari'  	=> $_POST['hari'],
            'id_kelas'  	=> $_POST['kelas'],
            'id_mapel'  	=> $_POST['mapel'],
            'jam_mulai'  	=> $_POST['mulai'],
            'jam_selesai'  	=> $_POST['selesai'],
            'id_guru'  	=> $_POST['guru']
        ];

        $this->db->insert('jadwal_guru',$data);
        return true;
    }

    public function deleteJadwal($id)
    {
        $this->db->delete('jadwal_guru',['id_jadwal_guru'=>$id]);
        return $this->db->affected_rows();
    }

    public function daftarPresensi()
    {
        
    }

    public function getNIP()
    {
        return $this->db->get_where('guru',['nip'=>$_POST['nip']]);
    }

    public function getRFID()
    {
        return $this->db->get_where('guru',['rfid'=>$_POST['rfid']]);
    }

    public function getGuruBerjadwal()
    {
        return $this->db->query('select * FROM guru where id_guru in (SELECT id_guru FROM jadwal_guru)')->result_array();
    }

    public function addIjin()
    {
        $data=[
            'id_guru'=>$_POST['id_guru'],
            'jenis_ijin'=>$_POST['jenis'],
            'perihal_ijin'=>$_POST['perihal'],
            'tanggal_pengajuan'=>date('Y-m-d H-i-s'),
            'tanggal_mulai'=>$_POST['tgl_mulai'],
            'tanggal_selesai'=>$_POST['tgl_selesai'],
            'deskripsi'=>$_POST['deskripsi']
        ];

        $this->db->insert('ijin',$data);
        return $this->db->insert_id();
        // return $this->db->affected_rows();
    }

    public function addStatus($id,$stat,$catatan)
    {
        $data=[
            'id_ijin'=>$id,
            'status'=> $stat,
            'catatan'=>$catatan,
            'tanggal'=>date('Y-m-d H-i-s')
        ];

        $this->db->insert('status_ijin',$data);
        return $this->db->affected_rows();
    }

    public function getIjin()
    {
        return $this->db->query('SELECT ijin.*,guru.nama_guru FROM ijin, guru WHERE ijin.id_guru=guru.id_guru ORDER BY ijin.tanggal_pengajuan DESC')->result_array();
    }

    public function getIjinID($id)
    {
        return $this->db->query('SELECT ijin.*,guru.nama_guru FROM ijin, guru WHERE ijin.id_guru=guru.id_guru AND guru.id_guru="'.$id.'" ORDER BY ijin.tanggal_pengajuan DESC')->result_array();
    }

    public function hapusIjin($id)
    {
        $this->db->delete('ijin',['id_ijin'=>$id]);
        return $this->db->affected_rows();
    }

    public function getIdGuru()
    {
        return $this->db->get_where('guru',['nip'=>$this->session->userdata('username')])->result_array();
    }

    

    public function getStatusIjin()
    {
        return $this->db->query('Select status_ijin.id_status_ijin, status_ijin.id_ijin, status_ijin.tanggal, status_ijin.status, status_ijin.catatan From status_ijin GROUP BY status_ijin.id_ijin DESC')->result_array();
    }

    public function validasiJadwal($tahun_akademik, $semester)
    {
        
        return $this->db->query('SELECT jadwal_guru.*, mapel.nama_mapel, kelas.kelas, kelas.jurusan, kelas.sub FROM jadwal_guru,mapel, kelas WHERE jadwal_guru.id_mapel=mapel.id_mapel AND jadwal_guru.id_kelas=kelas.id_kelas AND tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'" AND id_guru = "'.$_POST['id_guru'].'" AND Hari = "'.$_POST['hari'].'" AND jadwal_guru.id_kelas="'.$_POST['kelas'].'" and jadwal_guru.id_mapel = "'.$_POST['mapel'].'" AND "'.$_POST['jam_mulai'].'" BETWEEN jam_mulai AND jam_selesai OR "'.$_POST['jam_selesai'].'" BETWEEN jam_mulai AND jam_selesai')->result_array();
       
    }

}