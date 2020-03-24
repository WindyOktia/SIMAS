<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        redirect('');
    }

    public function do_login()
	{
		$user    = $this->input->post('user',TRUE);
		$pass = md5($this->input->post('pass',TRUE));
		$validate = $this->login_model->login($user,$pass);
		if($validate->num_rows() > 0){
			$data  = $validate->row_array();
			$id  = $data['id_user'];
			$name  = $data['nama'];
			$username  = $data['username'];
			$status  = $data['status'];
			$role = $data['role'];
			$sesdata = array(
				'id_user'  => $id,
				'nama'  => $name,
				'username'     => $username,
				'status'    => $status,
				'role'    => $role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			if($role==2){
				$stat='1';
				$this->login_model->update($user,$stat);
				redirect('guru/');
			}elseif($role=='3'){
				$stat='1';
				$this->login_model->update($user,$stat);
				redirect('waka/');
			}else{
                $stat='1';
				$this->login_model->update($user,$stat);
				redirect('admin/');
			}
			
		}else{
			$this->session->set_flashdata('error', 'Username / Password Salah');
			redirect('');
		}
    }

    function logout($user){
		$stat='0';
		$this->login_model->update($user,$stat);
        $this->session->sess_destroy();
        redirect('');
    }
      

}