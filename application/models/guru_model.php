<?php

class Guru_model extends CI_Model
{
    public function add()
    {
        $rfid=$this->input->post('rfid', true);
        $nip=$this->input->post('nip', true);
        $query = $this->db->get_where('guru', ['rfid' => $rfid]);
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where('guru', ['nip' => $nip]);
            if ($query2->num_rows() == 0) {
                $data = [
                    "rfid" => $this->input->post('rfid', true),
                    "nip" => $this->input->post('nip', true),
                    "nama_guru" => $this->input->post('nama', true),
                    "alamat" => $this->input->post('alamat', true)
                ];
                $this->db->insert('guru', $data);
                $data = [
                    "username" => $this->input->post('nip', true),
                    "password" => md5($this->input->post('pass', true)),
                    "nama" => $this->input->post('nama', true),
                    "role" => 2
                ];
                $this->db->insert('user', $data);
                return true;
            }
            return false;
        }
        return false;
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
        $this->db->where('id_guru',$id);
        return $this->db->get()->result_array();
    }

    public function addJadwal($guru, $hari, $kelas, $mulai, $selesai)
    {
        $this->db->trans_start();
			$result = array();
			    foreach($hari AS $key => $val){
				     $result[] = array(
				      'hari'  	=> $_POST['hari'][$key],
				      'id_kelas'  	=> $_POST['kelas'][$key],
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

    public function daftarPresensi()
    {
        
    }
}