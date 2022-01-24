<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Createsignin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        define('UPLOAD_DIR', 'assets/img/signin/');
        define('PDF_FILE', 'pdf_upload/');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        logActivity($data['user']['user_id'], 'Createsignin', 'Create New Signature');

        $data['title'] = 'Create Signature | Paraf Apps 4.0';
        $data['label'] = 'Paraf Online 4.0';
        $data['desclabel'] = 'Create Signature ';
        $data['breadTitle'] = 'Signature';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('createsignin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mysignin()
    {
        $data['title'] = 'My Signin Dashboard | Paraf Apps 4.0';
        $data['label'] = 'Paraf Online 4.0';
        $data['desclabel'] = 'My Signin ';
        $data['breadTitle'] = 'Dashboard';

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        $data['dataMySigninDraw'] = $this->db->get_where('tb_signature', ['user_id' => $data['user']['user_id'], 'type_sign' => 1])->result_array();
        $data['dataMySigninType'] = $this->db->get_where('tb_signature', ['user_id' => $data['user']['user_id'], 'type_sign' => 2])->result_array();
        $data['dataMySigninUpload'] = $this->db->get_where('tb_signature', ['user_id' => $data['user']['user_id'], 'type_sign' => 3])->result_array();


        $data['image_list_draw'] = glob(UPLOAD_DIR . "draw/*.png");
        $data['image_list_type'] = glob(UPLOAD_DIR . "type/*.png");
        $data['image_list_upload'] = glob(UPLOAD_DIR . "upload/*.png");

        logActivity($data['user']['user_id'], 'MySignin', 'My Signature Dashboard');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('createsignin/mysignin', $data);
        $this->load->view('templates/footer');
    }

    public function changesignindefault()
    {
        $user_id = $this->input->post('userId');
        $sign_id = $this->input->post('signId');
        $type_sign = $this->input->post('typeSign');

        $data = [
            'user_id' => $user_id,
            'id_sign' => $sign_id,
            'type_sign' => $type_sign
        ];

        $result = $this->db->get_where('tb_signature', $data);

        //set semua default_sign menjadi 0 dengan userid & typesign sesuai parameter
        $this->db->set('default_sign', '0');
        $this->db->where('user_id', $user_id);
        $this->db->where('type_sign', $type_sign);
        $this->db->update('tb_signature');

        //set default_sign menjadi 1 sesuai parameter 
        $this->db->set('default_sign', '1');
        $this->db->where('id_sign', $sign_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('type_sign', $type_sign);
        $this->db->update('tb_signature');

        logActivity($sign_id, 'ChangeSignDefault', 'Change Default Signature');

        redirect('Createsignin/mysignin');
    }

    public function savesignin()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        $userId = $data['user']['user_id'];
        $userNameSign = $data['user']['name'];
        $signatureType = $this->input->post('signatureType', true);
        $signUserName = $this->input->post('signUserName', true);

        if ($signUserName == '') {
            $signUserName = trim($userNameSign);
        } else {
            $signUserName = trim($signUserName);
        }

        if ($signatureType == 1) {
            $pathImg = 'draw/';
        } elseif ($signatureType == 2) {
            $pathImg = 'type/';
        } elseif ($signatureType == 3) {
            $pathImg = 'upload/';
        } else {
            $pathImg = 'others/';
        }

        if ($signatureType == 3) {
            $config['file_name'] = uniqid() . '.png';
            $config['allowed_types'] = 'png';
            $config['max_size'] = '2048';
            $config['upload_path'] = UPLOAD_DIR . $pathImg;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fileuploadSignature')) {
                $path = UPLOAD_DIR . $pathImg . $this->upload->data('file_name');
                $data64 = file_get_contents($path);
                //$signature = 'data:image/png;base64,' . base64_encode($data64);
                $signature = base64_encode($data64);
                $signatureFileName = $this->upload->data('file_name');
                //echo $signature;
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $signature =  $this->input->post('signature');
            $signature = str_replace('data:image/png;base64,', '', $signature);
            $signature = str_replace(' ', '+', $signature);
            $data = base64_decode($signature);
            $signatureFileName = uniqid() . '.png';

            $file = UPLOAD_DIR . $pathImg . $signatureFileName;
            file_put_contents($file, $data);
        }
        $data = [
            'user_id' => $userId,
            'user_assign' => $userId,
            'sign_name' => ucwords($signUserName),
            'type_sign' => $signatureType,
            // 'data_sign' => $signature,
            'file_sign' => $signatureFileName,
            'default_sign' => 0,
            'date_created' => time(),
            'date_updated' => time()
        ];
        $this->db->insert('tb_signature', $data);
        logActivity($data['user']['user_id'], 'SaveSignature', 'Saving New Signature');
        redirect('Createsignin/mysignin');
    }
}
