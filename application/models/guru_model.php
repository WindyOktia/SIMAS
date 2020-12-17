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
                'status_guru' => $_POST['status'],
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

    public function getJadwal($id, $tahun_akademik, $semester)
    {
        $this->db->select('jadwal_guru.*, kelas.*, mapel.*, timediff(jam_selesai, jam_mulai) as selisih');
        $this->db->from('jadwal_guru');
        $this->db->join('kelas', 'jadwal_guru.id_kelas = kelas.id_kelas');
        $this->db->join('mapel', 'jadwal_guru.id_mapel = mapel.id_mapel');
        $this->db->where('id_guru',$id);
        $this->db->where('tahun_akademik',$tahun_akademik);
        $this->db->where('semester',$semester);
        return $this->db->get()->result_array();
    }

    public function getCountSemesterAndMinggu()
    {
        return $this->db->query('SELECT floor(COUNT(semester)/count(DISTINCT(id_jadwal_guru))) as jml_semester, floor(COUNT(id_jadwal_guru)/count(DISTINCT(id_jadwal_guru))) as jml_minggu FROM `v_presensi_mengajar_raw` WHERE 1')->result_array();
    }

    public function getJadwalAll($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT DISTINCT(guru.id_guru) as id_guru, count(jadwal_guru.id_jadwal_guru) as beban_mengajar, COUNT(DISTINCT(jadwal_guru.id_mapel)) as jml_mapel FROM `jadwal_guru` RIGHT JOIN guru ON jadwal_guru.id_guru=guru.id_guru WHERE jadwal_guru.tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'" GROUP BY id_guru')->result_array();     
    }

    public function getJadwalByID($id,$tahun_akademik, $semester)
    {
        return $this->db->query('SELECT DISTINCT(guru.id_guru) as id_guru, count(jadwal_guru.id_jadwal_guru) as beban_mengajar, COUNT(DISTINCT(jadwal_guru.id_mapel)) as jml_mapel FROM `jadwal_guru` RIGHT JOIN guru ON jadwal_guru.id_guru=guru.id_guru WHERE jadwal_guru.tahun_akademik="'.$tahun_akademik.'" AND jadwal_guru.semester="'.$semester.'" AND jadwal_guru.id_guru="'.$id.'" GROUP BY id_guru')->result_array();     
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
            'tahun_akademik'=>$_POST['tahun_akademik'],
            'semester'=>$_POST['semester'],
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

    public function getLink($id)
    {
        $this->db->select('link_file');
        $this->db->from('trans_doc');
        $this->db->where('code_id','ijinGuru_'.$id);
        return $this->db->get()->result_array();
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

    public function manualHarian()
    {
        $data=[
            'tanggal'=>date('Y-m-d'),
            'id_guru'=>$_POST['id_guru'],
            'jam_masuk'=>date('H:i:s'),
            'metode'=>'manual',
            'keterangan'=>$_POST['alasan']
        ];

        $this->db->insert('presensi_harian',$data);
        return $this->db->affected_rows();
    }

    public function getPresensiHarian($id)
    {
        return $this->db->get_where('presensi_harian',['id_guru'=>$id])->result_array();
    }

    public function getStatusIjin()
    {
        return $this->db->query('Select status_ijin.id_status_ijin, status_ijin.id_ijin, status_ijin.tanggal, status_ijin.status, status_ijin.catatan From status_ijin GROUP BY status_ijin.id_ijin DESC')->result_array();
    }
    
    public function getCatatanIjin()
    {
        return $this->db->query('SELECT ijin.id_guru, status_ijin.tanggal, status_ijin.status, status_ijin.catatan FROM ijin LEFT JOIN status_ijin ON ijin.id_ijin=status_ijin.id_ijin GROUP BY status_ijin.id_ijin DESC')->result_array();
    }

    public function getDataMengajar($hari, $id)
    {
        $this->db->query('select jadwal_guru.*,mapel.nama_mapel from jadwal_guru, mapel where jadwal_guru.id_mapel=mapel.id_mapel AND hari="'.$hari.'" AND id_guru="'.$id.'" AND "'.date('H:i:s').'" BETWEEN jam_mulai AND jam_selesai')->result_array();
    }

    public function getDataGuru($id)
    {
        return $this->db->get_where('guru',['id_guru'=>$id])->result_array();
    }

    
    public function validasiJadwal($tahun_akademik, $semester)
    {
        
        return $this->db->query('SELECT jadwal_guru.*, mapel.nama_mapel, kelas.kelas, kelas.jurusan, kelas.sub FROM jadwal_guru,mapel, kelas WHERE jadwal_guru.id_mapel=mapel.id_mapel AND jadwal_guru.id_kelas=kelas.id_kelas AND tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'" AND id_guru = "'.$_POST['id_guru'].'" AND Hari = "'.$_POST['hari'].'" AND (("'.$_POST['jam_mulai'].'" BETWEEN jam_mulai AND jam_selesai ) or ("'.$_POST['jam_selesai'].'" BETWEEN jam_mulai AND jam_selesai ))')->result_array();
        
    }
    // start filter
    public function getFilterTahun()
    {
        return $this->db->query('SELECT DISTINCT(tahun_akademik), semester FROM `presensi_harian` GROUP BY tahun_akademik, semester')->result_array();
    }
    
    public function getDefaultTotalKehadiran()
    {
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_presensi FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru')->result_array();
    }
    
    public function getDefatultKeterlambatan()
    {
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_terlambat FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_masuk >= "07:15"')->result_array();
    }
    
    public function getDefaultLebih()
    {
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_lebih FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_pulang >= "15:30"')->result_array();
    }
    
    public function getDefaultDataTerlambat()
    {
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_masuk >= "07:15"')->result_array();
    }

    public function getDefaultDataLewat()
    {
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_pulang >= "15:30"')->result_array();
    }
    
    public function getDefaultNilaiSurvei()
    {
        return $this->db->query('SELECT * FROM `v_n_survei`')->result_array();
    }
    
    public function getDefaultCountIjin()
    {
        return $this->db->query('SELECT count(ijin.id_ijin) as jml_ijin FROM ijin, status_ijin WHERE ijin.id_ijin=status_ijin.id_ijin AND status_ijin.status=1')->result_array();
    }

    public function getDefaultIjin()
    {
        return $this->db->query('SELECT ijin.*, guru.nama_guru, guru.status_guru FROM ijin, status_ijin,guru WHERE ijin.id_ijin=status_ijin.id_ijin AND ijin.id_guru=guru.id_guru AND status_ijin.status=1
        ')->result_array();
    }

    // detail guru
    public function getPresensiHarianDefault($id)
    {
        $this->db->select('presensi_harian.*, timediff(jam_pulang, jam_masuk) as selisih');
        $this->db->where('id_guru', $id);
        return $this->db->get('presensi_harian')->result_array();
        // return $this->db->get_where('presensi_harian',['id_guru'=>$id])->result_array();
    }
    
    public function getPresensiMengajarDefault($id)
    {
        $this->db->select('v_presensi_mengajar_raw.*, timediff(jam_selesai, jam_mulai) as selisih');
        $this->db->where('id_guru', $id);
        return $this->db->get('v_presensi_mengajar_raw')->result_array();
        // return $this->db->get_where('v_prese nsi_mengajar_raw',['id_guru'=> $id])->result_array();
    }
    

    // end of detail guru


    public function getDefaultTotalKehadiran_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_presensi FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }
    
    public function getDefatultKeterlambatan_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_terlambat FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }
    
    public function getDefaultLebih_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_lebih FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }
    
    public function getDefaultDataTerlambat_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }

    public function getDefaultDataLewat_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }
    
    public function getDefaultNilaiSurvei_f1($th2)
    {
        $exp = explode(' - ', $th2);
        return $this->db->query('SELECT v_n_survei.*, survei_guru.tahun_akademik, survei_guru.semester FROM v_n_survei, survei_guru WHERE survei_guru.id_survei_guru=v_n_survei.id_survei_guru AND ( tahun_akademik BETWEEN (SELECT MIN(tahun_akademik) FROM presensi_harian) AND "'.$exp[0].'") AND (semester BETWEEN(SELECT min(semester) FROM presensi_harian) AND "'.$exp[1].'")')->result_array();
    }




    public function getDefaultTotalKehadiran_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_presensi FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }
    
    public function getDefatultKeterlambatan_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_terlambat FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }
    
    public function getDefaultLebih_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_lebih FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }
    
    public function getDefaultDataTerlambat_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }

    public function getDefaultDataLewat_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }
    
    public function getDefaultNilaiSurvei_f2($th1)
    {
        $exp = explode(' - ', $th1);
        return $this->db->query('SELECT v_n_survei.*, survei_guru.tahun_akademik, survei_guru.semester FROM v_n_survei, survei_guru WHERE survei_guru.id_survei_guru=v_n_survei.id_survei_guru AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND (SELECT MAX(tahun_akademik) FROM presensi_harian)) AND (semester BETWEEN "'.$exp[1].'" AND (SELECT max(semester) FROM presensi_harian))')->result_array();
    }




    public function getDefaultTotalKehadiran_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_presensi FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }
    
    public function getDefatultKeterlambatan_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_terlambat FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }
    
    public function getDefaultLebih_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT (COUNT(presensi_harian.id_presensi_harian)/COUNT(DISTINCT(presensi_harian.id_guru))) AS rata_rata_lebih FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru AND presensi_harian.jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }
    
    public function getDefaultDataTerlambat_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_masuk >= "07:15" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }

    public function getDefaultDataLewat_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT presensi_harian.*, guru.nama_guru, guru.status_guru FROM presensi_harian, guru WHERE presensi_harian.id_guru=guru.id_guru and jam_pulang >= "15:30" AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }
    
    public function getDefaultNilaiSurvei_f3($th1,$th2)
    {
        $exp = explode(' - ', $th1);
        $exp2 = explode(' - ', $th2);
        return $this->db->query('SELECT v_n_survei.*, survei_guru.tahun_akademik, survei_guru.semester FROM v_n_survei, survei_guru WHERE survei_guru.id_survei_guru=v_n_survei.id_survei_guru AND ( tahun_akademik BETWEEN "'.$exp[0].'" AND "'.$exp2[0].'") AND (semester BETWEEN "'.$exp[1].'" AND "'.$exp2[1].'")')->result_array();
    }

    public function getDataNIP($stat)
    {
        // return $this->db->get_where('guru',['status_guru'=>$stat])->result_array();
        $this->db->select('max(nip) as nip_max');
        $this->db->where('status_guru',$stat);
        if($stat==1){
            $this->db->like('nip','PNS-');
        }
        if($stat==2){
            $this->db->like('nip','GTT-');
        }
        if($stat==3){
            $this->db->like('nip','GTY-');
        }
        return $this->db->get('guru')->result_array();
    }

    public function generateNIP($stat)
    {
        $NIP = $this->getDataNIP($stat);
        foreach($NIP as $np)
        {
            if($np['nip_max']==null)
            {
                if($stat==1){
                    return 'PNS-'.date('ym').'01';
                }
                if($stat==2){
                    return 'GTT-'.date('ym').'01';
                }
                if($stat==3){
                    return 'GTY-'.date('ym').'01';
                }
            }
            else{
                if($stat==1){
                    $exp = explode('PNS-2012',$np['nip_max']);
                    $plusID = $exp[1]+1;
                    return 'PNS-20120'.$plusID;
                }
                if($stat==2){
                    $exp = explode('GTT-2012',$np['nip_max']);
                    $plusID = $exp[1]+1;
                    return 'GTT-20120'.$plusID;
                }
                if($stat==3){
                    $exp = explode('GTY-2012',$np['nip_max']);
                    $plusID = $exp[1]+1;
                    return 'GTY-20120'.$plusID;
                }   
            }
        }
    }



}