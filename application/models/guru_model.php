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

    public function editGuru()
    {
        $rfid=$this->input->post('rfid', true);
        $nip=$this->input->post('nip', true);
        $query = $this->db->get_where('guru', ['rfid' => $rfid]);
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where('guru', ['nip' => $nip]);
            if ($query2->num_rows() == 0) {
                $this->db->trans_start();
                    if(!empty($this->input->post('rfid'))){
                        $this->db->set('rfid', $this->input->post('rfid'));
                    };
                    if(!empty($this->input->post('nip'))){
                        $this->db->set('nip', $this->input->post('nip'));
                    };
                    if(!empty($this->input->post('nama'))){
                        $this->db->set('nama_guru', $this->input->post('nama'));
                    };
                    if(!empty($this->input->post('alamat'))){
                        $this->db->set('alamat', $this->input->post('alamat'));
                    };
                    $this->db->where('id_guru', $this->input->post('id'));
                    $this->db->update('guru');
                $this->db->trans_complete();

                $this->db->trans_start();
                    if(!empty($this->input->post('nip'))){
                        $this->db->set('username', $this->input->post('nip'));
                    };
                    if(!empty($this->input->post('nama'))){
                        $this->db->set('nama', $this->input->post('nama'));
                    };
                    if(!empty($this->input->post('pass'))){
                        $this->db->set('password', md5($this->input->post('pass')));
                    };
                    $this->db->where('username', $this->input->post('nip_lama'));
                    $this->db->update('user');
                $this->db->trans_complete();
                return true;
            }
            return false;
        }
        return false;
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

    public function addJadwal($tahun_akademik, $semester,$guru, $hari, $kelas, $mulai, $selesai)
    {
        $this->db->trans_start();
			$result = array();
			    foreach($hari AS $key => $val){
				     $result[] = array(
				      'tahun_akademik'  	=> $_POST['tahun_akademik'],
				      'semester'  	=> $_POST['semester'],
				      'hari'  	=> $_POST['hari'][$key],
				      'id_kelas'  	=> $_POST['kelas'][$key],
				      'id_mapel'  	=> $_POST['mapel'][$key],
				      'jam_mulai'  	=> $_POST['mulai'][$key],
				      'jam_selesai'  	=> $_POST['selesai'][$key],
				      'id_guru'  	=> $_POST['guru']
				     );
			    }      
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('jadwal_guru', $result);
        $this->db->trans_complete();
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

}