<?php
class Pengaturan_model extends CI_Model{

    public function addInformasi()
    {
        $data=[
            "judul_informasi"=>$_POST['judul'],
            "detail_informasi"=>$_POST['deskripsi'],
            "dibuat_tanggal"=>date("Y-m-d"),
            "dibuat_oleh"=>'admin'
        ];

        $this->db->insert('informasi',$data);
        return $this->db->affected_rows();
    }

    public function editInfo()
    {
        $this->db->set('judul_informasi',$_POST['judul']);
        $this->db->set('detail_informasi',$_POST['deskripsi']);
        $this->db->where('id_informasi',$_POST['id']);
        $this->db->update('informasi');
        return $this->db->affected_rows();
    }

    public function getInformasi()
    {
        return $this->db->get('informasi')->result_array();
    }

    public function deleteInformasi($id)
    {
        $this->db->delete('informasi',['id_informasi'=>$id]);
        return $this->db->affected_rows();
    }

    public function getInformasiID($id)
    {
        return $this->db->get_where('informasi',['id_informasi'=>$id])->result_array();
    }

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
        $this->db->where_not_in('role', 2);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function deletePengguna($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }
}