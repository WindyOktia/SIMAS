<?php
class Login_model extends CI_Model
{
    function login($user,$pass)
    {   
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $result = $this->db->get('user',1);
        return $result;
    }

    function update($user,$stat)
    {
        $this->db->set('status', $stat);
        $this->db->where('username', $user);
        $this->db->update('user');
    }

    function is_role()
    {
        return $this->session->userdata('username');
    }
}