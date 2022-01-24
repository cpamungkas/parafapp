<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statusdocs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        logActivity($data['user']['user_id'], 'StatusDocs', 'Status Documents');

        $data['title'] = 'Dashboard Status Docs | Paraf Apps 4.0';
        $data['label'] = 'Paraf Online 4.0';
        $data['desclabel'] = 'Status Docs ';
        $data['breadTitle'] = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('statusdocs/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
