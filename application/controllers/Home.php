<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Log In | Paraf Apps 4.0';
        $data['label'] = 'Paraf 4.0';
        $data['desclabel'] = '  Paraf Online 4.0  ';
        $data['loginTitle'] = 'Login';

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function user()
    {
        $this->load->view('user/index');
    }
}
