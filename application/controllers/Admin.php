<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Log In | Paraf Apps 4.0';
        $data['label'] = 'Paraf 4.0';
        $data['desclabel'] = '  Paraf Online 4.0  ';
        $data['loginTitle'] = 'Login';

        //$this->load->view('templates/auth_header', $data);
        $this->load->view('admin/index');
        //$this->load->view('templates/auth_footer');
    }
}
