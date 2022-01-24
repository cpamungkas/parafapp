<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Onlyme extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        is_logged_in();
    }

    // private function _logActivity($userId, $Activity, $descActivity)
    // {
    //     $user = $this->db->get_where('tb_user', ['user_id' => $userId])->row_array();

    //     $datalogActivity = [
    //         'time_log' => time(),
    //         'user_id' => $userId, /*email pembuat dokumen*/
    //         'user_name' => $user['name'],
    //         'activity' => $Activity,
    //         'desc_log' => $descActivity,
    //         'date_created' => time(),
    //         'date_updated' => time()
    //     ];
    //     $this->db->insert('tb_log_activity', $datalogActivity);
    // }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        $data['title'] = 'Only Me | Paraf Apps 4.0';
        $data['label'] = 'Prepare your document for signing';
        $data['desclabel'] = 'Only me ';
        $data['breadTitle'] = 'Dashboard';

        //$this->_logActivity($data['user']['user_id'], 'Onlyme', 'Prepare document for signing at Only Me page');
        logActivity($data['user']['user_id'], 'Onlyme', 'Prepare document for signing at Only Me page');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('onlyme/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function uploadonlyme()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        $this->form_validation->set_rules('judulPDF', 'Title', 'required|trim');
        //$this->form_validation->set_rules('hideDataBase64', 'Base63', 'required|trim');

        $data['title'] = 'Only Me | Paraf Apps 4.0';
        $data['desclabel'] = 'Only me ';
        $data['breadTitle'] = 'Dashboard';

        if ($this->form_validation->run() == false) {
            redirect('Onlyme');
        } else {
            $filejudulPDF = $this->input->post('judulPDF', true);
            $pdfTitle = $filejudulPDF;
            $pdfOptionalMsg = trim($this->input->post('pdfOptionalMsg', true));
            $addRecipient_arr = $this->input->post('addRecipient');

            $data['judulPDF'] = htmlspecialchars($pdfTitle);
            $data['Base64'] = $this->input->post('hideDataBase64');
            $data['label'] = $pdfTitle;

            $userId = $data['user']['user_id'];
            $email = $data['user']['email'];
            $userName = $data['user']['name'];

            //set config upload pdf
            $config['upload_path'] = './pdf/belum_ttd';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $filejudulPDF;
            $config['overwrite'] = TRUE;
            $config['max_size'] = '102048';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('filepdf')) {
                $output['status'] = false;
                $output['message'] = $this->upload->display_errors();
            } else {
                $upload = ['upload_data' => $this->upload->data()];
                $file_name = $upload['upload_data']['file_name'];
                $token = substr(md5($file_name), 0, 10);
                $qr_image = strtotime(date('Y-m-d')) . '-' . strtoupper($token) . '.png';
                $file_names = explode('.pdf', $file_name);
            }

            $data['fullpath'] = base_url('pdf/belum_ttd/') . $file_names[0] . '.pdf';
            $data['pdfnamesignin'] = $file_names[0] . '_signed.pdf';

            $dataTempDocSignin = [
                'user_id' => $userId,
                'email' => $email, /*email pembuat dokumen*/
                'pdf_title' => $pdfTitle,
                'pdf_optional_msg' => $pdfOptionalMsg,
                'pdf_unsigned' => $file_names[0],
                'pdf_signed' => NULL,
                'pdf_final_signed' => NULL,
                'pdf_status' => 1, // 1::unsigned, 2::signed, 3::final signed
                'qrcode' => null, //$qr_image,
                'user_created' => $userName,
                'date_created' => time(),
                'date_updated' => time(),
                'status_deleted' => 0
            ];
            $this->db->insert('tb_signature_docs', $dataTempDocSignin);

            //save pdf unsigned to database
            $data['docsigntemp'] = $this->db->get_where('tb_signature_docs', ['user_id' => $data['user']['user_id'], 'pdf_title' => $filejudulPDF])->row_array();
            $idDocSig = $data['docsigntemp']['id_doc_signin'];
            // foreach ($addRecipient_arr as $nama) {
            //     $dataAddReceiptDoc = [
            //         'id_receipt' => NULL,
            //         'id_doc_signin' => $idDocSig,
            //         'email_receipt' => $nama,
            //         'status_doc' => 1, /* 1: send, 2: read (jika link diklik namun belum dittd), 3: link diklik, sudah dittd & dikirim balik*/
            //         'date_created' => time(),
            //         'date_updated' => time()
            //     ];
            //     $this->db->insert('tb_receipt_doc', $dataAddReceiptDoc);
            // }

            $addRecipient = $_POST['addRecipient'];
            $number = count($addRecipient);
            if ($number > 0) {
                for ($i = 0; $i < $number; $i++) {
                    $dataAddReceiptDoc = [
                        'id_receipt' => NULL,
                        'id_doc_signin' => $idDocSig,
                        'email_receipt' => $addRecipient[$i],
                        'status_doc' => 1, /* 1: send, 2: read (jika link diklik namun belum dittd), 3: link diklik, sudah dittd & dikirim balik*/
                        'date_created' => time(),
                        'date_updated' => time()
                    ];
                    if (trim($addRecipient[$i] != '')) {
                        $this->db->insert('tb_receipt_doc', $dataAddReceiptDoc);
                    }
                }
            }
            //$user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            //$this->_logActivity($data['user']['user_id'], 'Onlyme', 'Upload document PDF');

            logActivity($data['user']['user_id'], 'Onlyme', 'Upload document PDF');

            $this->load->view('templates/pdfsign_header', $data);
            $this->load->view('pdfsign/index', $data);
            $this->load->view('templates/pdfsign_footer', $data);
        }
    }

    public function generatepdf()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['role_id' => $data['user']['role_id']])->row_array();

        $filename = $this->input->post('file_names');
        $judulPDF = $this->input->post('file_judulPDF');

        $data['docsigntemp'] = $this->db->get_where('tb_signature_docs', ['user_id' => $data['user']['user_id'], 'pdf_title' => $judulPDF])->row_array();
        $idDocSig = $data['docsigntemp']['id_doc_signin'];

        if (!empty($_POST['data'])) {
            $data = base64_decode($_POST['data']);
            file_put_contents(FCPATH . "pdf/sudah_ttd/" . $filename, $data);

            //update table tb_signature_doc
            $dataUpdate = array(
                'pdf_signed' => $filename,
                'pdf_final_signed' => $filename,
                'pdf_status' => 2,
                'date_updated' => time()
            );
            $this->db->where('id_doc_signin', $idDocSig);
            $this->db->update('tb_signature_doc', $dataUpdate);

            //update table tb_receipt_doc
            $dataUpdateReceipt = array(
                'status_doc' => 2,
                'date_updated' => time()
            );
            $this->db->where('id_doc_signin', $idDocSig);
            $this->db->update('tb_receipt_doc', $dataUpdateReceipt);

            logActivity($data['user']['user_id'], 'Onlyme', 'Generate & Signed document PDF');

            sendDocPDF($idDocSig);

            redirect('Home');
        } else {
            echo "No Data Sent";
        }
    }
}
