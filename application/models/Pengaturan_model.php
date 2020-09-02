<?php
class Pengaturan_model extends CI_Model{

    public function addPengguna()
    {
        $user=$this->input->post('user', true);
        $query = $this->db->get_where('user', ['username' => $user]);
        if ($query->num_rows() == 0) {
            $data = [
                "nama" => $this->input->post('nama', true),
                "role" => $this->input->post('role', true),
                "username" => $this->input->post('user', true),
                "password" => md5($this->input->post('pass', true))
            ];
    
            $this->db->insert('user', $data);
            return true;
        }
        return false; 
    }

    public function editPengguna()
    {
        $user=$this->input->post('user', true);
        $query = $this->db->get_where('user', ['username' => $user]);
        if ($query->num_rows() == 0) {
            $this->db->set('nama',  $this->input->post('nama'));
            $this->db->set('role', $this->input->post('role'));
            if(!empty($this->input->post('user'))){
                $this->db->set('username', $this->input->post('user'));
            };
            if(!empty($this->input->post('pass'))){
                $this->db->set('password', md5($this->input->post('pass')));
            };
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('user');
            return true;
        }
        return false; 
    }

    public function getPengguna()
    {
        return $this->db->get('user')->result_array();
    }

    public function deletePengguna($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }

    public function getInformasi()
    {
        return $this->db->get('informasi')->result_array();
    }

    public function getInformasiID($id)
    {
        return $this->db->get_where('informasi',['id_informasi'=>$id])->result_array();
    }

    public function addInformasi()
    {
        $data=[
            'judul_informasi'=> $_POST['judul'],
            'detail_informasi'=> $_POST['deskripsi'],
            'dibuat_oleh'=> 'admin',
            'dibuat_tanggal'=> date("Y-m-d")
        ];

         $this->db->insert('informasi',$data);
         return $this->db->affected_rows();
    }

    public function deleteInformasi($id)
    {
        $this->db->delete('informasi',['id_informasi'=>$id]);
        return $this->db->affected_rows();
    }

    public function getTanggalLibur()
    {
        return $this->db->get('libur')->result_array();
    }

    public function addLibur()
    {
        $data = [
            'tanggal_libur'=>$_POST['tanggal'],
            'keterangan'=>$_POST['keterangan']
        ];

        $this->db->insert('libur',$data);
        return $this->db->affected_rows();
    }

    public function deleteLibur($id)
    {
        $this->db->delete('libur',['id_libur'=>$id]);
        return $this->db->affected_rows();
    }

    public function updateLibur()
    {
        $this->db->set('tanggal_libur',$_POST['tanggal']);
        $this->db->set('keterangan',$_POST['keterangan']);
        $this->db->where('id_libur',$_POST['id']);
        $this->db->update('libur');

        return $this->db->affected_rows();
    }

    public function getAkademik()
    {
        return $this->db->get('set_akademik')->result_array();
    }

    public function updateAkademik($tahun_akademik)
    {
        $this->db->set('tahun_akademik',$tahun_akademik);
        $this->db->set('semester',$_POST['semester']);
        $this->db->where('id_akademik',$_POST['id']);
        $this->db->update('set_akademik');

        return $this->db->affected_rows() ;
    }

}