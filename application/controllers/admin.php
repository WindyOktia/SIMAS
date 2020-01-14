<?php

class Admin extends CI_Controller
{
    public function index()
    {
        $data['page']='addFile';
        $this->load->view('templates/header.php',$data);
        $this->load->view('templates/footer.php');
    }
}
