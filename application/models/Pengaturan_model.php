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
        $this->db->where_not_in('role', 2);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function deletePengguna($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }
}