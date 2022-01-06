<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Log In | Paraf Apps 4.0';
            $data['label'] = 'Paraf 4.0';
            $data['desclabel'] = '  Paraf Apps 4.0  ';
            $data['loginTitle'] = 'Login';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[25]|matches[pass_confirm]|alpha_numeric', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!<br> Password must be at least 8 characters.'
        ]);
        $this->form_validation->set_rules('pass_confirm', 'Password Confirm', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Log In | Paraf Apps 4.0';
            $data['label'] = 'Paraf 4.0';
            $data['desclabel'] = '  Paraf Apps 4.0  ';
            $data['loginTitle'] = 'Register';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $nameuser = htmlspecialchars($this->input->post('fullname', true));
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = htmlspecialchars($this->input->post('email', true));
            $encrypted_name = md5($nameuser);
            $timeregister = time();
            $activationcode = md5(uniqid(rand()));
            $expirestime = strtotime('+4 days',  $timeregister);

            $data = [
                'name' =>  $nameuser,
                'password' => $password,
                'email' => $email,
                'image' => 'default.jpg',
                'role_id' => 5,
                'is_active' => 0,
                'date_created' => time(),
                'date_updated' => time(),
                'expired_time' => $expirestime,
                'activationcode' => $activationcode,
                'status_deleted' => 0
            ];

            $this->db->insert('tb_user', $data);

            $this->sendMailActivation($email, $nameuser, $activationcode, $expirestime, $encrypted_name);

            $this->session->set_flashdata('registersuccess', 'Congratulation! your account has been created. Please check your mail & Login');
            redirect('Home');
        }
    }

    private function sendMailActivation($email, $nameuser, $activationcode, $expirestime, $encrypted_name)
    {
        //send mail for activate
        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');
        // $to = htmlspecialchars($this->input->post('email', true));
        $to = $email;
        $subject = 'Verify Email Address';
        $message = 'Hello, ' . $nameuser . '!<br><br><br>
            Please click the button below to verify your email address.<br>
            <a href ="' . base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '" class="btn btn-success">Verify Email</a><br>
            If you did not create an account, no further action is required.<br>
            Regards,<br>
            Team<br><br>

            If you\'re having trouble clicking the "Verify Email Address" button copy and paste the URL below into your web browser: <br><br> <a href="' .
            base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '" class="btn btn-success">' . base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '</a><br>';


        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function user()
    {
        $this->load->view('user/index');
    }

    public function is_password_strong($password)
    {
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
            return TRUE;
        }
        return FALSE;
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        // usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //cek role id
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('loginsuccessmsg', 'Hello, ' . $user['name']);
                        redirect('admin'); //untuk akses administrator
                    } elseif ($user['role_id'] == 2 or $user['role_id'] == 3) {
                        $this->session->set_flashdata('loginsuccessmsg', 'Hello, ' . $user['name']);
                        redirect('User'); //untuk akses user internal
                    } elseif ($user['role_id'] == 4) {
                        $this->session->set_flashdata('loginsuccessmsg', 'Hello, ' . $user['name']);
                        redirect('Member'); //untuk akses user external yang registrasi
                    } else {
                        $this->session->set_flashdata('loginsuccessmsg', 'Hello, guest');
                        redirect('Guest'); //untuk akses tamu tanpa registrasi
                    }
                } else {
                    $this->session->set_flashdata('errorlogin', 'Email or password incorrect please try again!');
                    redirect('Home');
                }
            } else {
                $this->session->set_flashdata('errorlogin', 'This email has not been activated!');
                redirect('Home');
            }
        } else {
            $this->session->set_flashdata('errorlogin', 'Email is not registered!');
            redirect('Home');
        }
    }

    public function registration()
    {
        /*         if ($this->session->userdata('email')) {
            redirect('dashboard');
        } */
        /*         if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } elseif ($this->session->userdata('role_id') == 2 or $this->session->userdata('role_id') == 3) {
            redirect('users');
        } elseif ($this->session->userdata('role_id') == 4) {
            redirect('members');
        } else {
            redirect('guest');
        } */
        $this->form_validation->set_rules('fullname', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_confirm]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register | eSignature 4.0';
            $data['label'] = 'eSignature 4.0';
            $data['bodyclass'] = 'bg-primary bg-lighten-md has-animation';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $nameuser = htmlspecialchars($this->input->post('name', true));
            $encrypted_name = md5($nameuser);
            $timeregister = time();
            $activationcode = md5(uniqid(rand()));
            $expirestime = strtotime('+4 days',  $timeregister);

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'role_id' => 5,
                'is_active' => 0,
                'date_created' => time(),
                'date_updated' => time(),
                'expired_time' => $expirestime,
                'activationcode' => $activationcode,
                'status_deleted' => 0
            ];

            $this->db->insert('tb_user', $data);

            //send mail for activate
            $this->load->config('email');
            $this->load->library('email');

            $from = $this->config->item('smtp_user');
            $to = htmlspecialchars($this->input->post('email', true));
            $subject = 'Verify Email Address';
            $message = 'Hello, ' . $nameuser . '!<br><br><br>
            Please click the button below to verify your email address.<br>
            <a href ="' . base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '" class="btn btn-success">Verify Email</a><br>
            If you did not create an account, no further action is required.<br>
            Regards,<br>
            Team<br><br>

            If you\'re having trouble clicking the "Verify Email Address" button copy and paste the URL below into your web browser: <br><br> <a href="' .
                base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '" class="btn btn-success">' . base_url() . 'auth/verification/' . $activationcode . '/' . $expirestime . '/' . $encrypted_name . '</a><br>';


            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
            } else {
                show_error($this->email->print_debugger());
            }

            $this->session->set_flashdata('registersuccess', 'Congratulation! your account has been created. Please check your mail & Login');
            redirect('Home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('logoutmsg', 'You have been logged out!');
        redirect('Home');
    }

    public function blocked()
    {
        /*  $this->load->view('auth/blocked'); */
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           403! Access Forbidden. Sorry, your not allowed to enter here! or Please contact your admin to activation.</div>');
        redirect('auth');
    }

    public function forgot()
    {
        echo " Forgot page";
    }

    public function verification($activationcode, $expirestime, $encrypted_name)
    {
        $data['filter2'] = [
            'activationcode' => $activationcode,
            'expirestime' => $expirestime,
            'encrypted_name' => $encrypted_name
        ];

        //var_dump($data['filter']);
        //http://localhost/esign2/auth/verification/59ded95232e77861c5228c9d8b664f48/1636698015/66ad3efc59c45f26f8934d98ba19ad45
        //http://localhost/esign2/auth/verification/52f5c3efbf48770248f52b0232c58843/1636698015/66ad3efc59c45f26f8934d98ba19ad45
        //http://localhost/esign2/auth/verification/4b3a1485828401393b9a9d668eabf67b/1636833180/0c54710e0735434dc50954e9dc78e11f
        $selisih = $expirestime - 1637005980; //floor($diff / (60 * 60 * 24))
        $datafilter = $this->db->get_where('tb_user', ['activationcode' => $activationcode, 'expired_time' => $expirestime])->row_array();
        $email = $datafilter['email'];
        $NewActiveCode = $datafilter['activationcode'];


        if (time() >= $expirestime) {
            // echo "<br>Link sudah tidak berlalu. Silakan klik link berikut untuk re-activation.";
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">The link is no longer valid. Please click the following link for pre-activation.<br><br><a class="badge badge-warning" href="' . base_url('auth/resend') . '">Resend activation link!</a></div>');
            redirect('auth/activation');
        } else {
            $activecode = $this->db->get_where('tb_user', ['activationcode' => $activationcode])->row_array();
            if ($activecode) {
                if ($activationcode == $datafilter['activationcode']) {
                    $data = array(
                        'is_active' => 1
                    );
                    //var_dump($activationcode . ' - ' . $activecode['activationcode']);
                    //die();
                    $this->db->where('activationcode', $activationcode);
                    $this->db->update('tb_user', $data);
                    //echo "<br>Akun anda sudah teraktivasi. Silakan Login untuk masuk.";
                    $this->session->set_flashdata('message', '<div class="alert" role="alert">Your account has been activated. Please Login to enter. <br><br><a class="badge badge-success" href="' . base_url('auth') . '">Login Now!</a></div>');
                    redirect('auth/activation');
                } else {
                    // echo "<br>Kode activasi salah. silakan reactivation kembali disini.";
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Invalid activation code. please reactivation back here.<br><br><a class="badge badge-warning" href="' . base_url('auth/resend') . '">Resend activation link!</a></div>');
                    redirect('auth/activation');
                }
            } else {
                // echo "<br>Akun atau Kode aktivasi anda tidak ditemukan. Silakan periksa kembali email/register ulang.";
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                 Your account or activation code was not found. Please check your email or register again.<br><br><a class="badge badge-danger" href="' . base_url('auth/registration') . '">Register Now!</a></div>');
                redirect('auth/activation');
            }
        }
    }

    public function activation()
    {
        $data['title'] = 'Activation | G-Sture 4.0';
        $data['label'] = 'G-Sture 4.0';
        $data['desclabel'] = '  Gramedia electronic Signature 4.0  ';
        $data['bodyclass'] = 'bg-silver bg-lighten-md';

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/activation', $data);
        $this->load->view('templates/auth_footer');
    }

    public function resend()
    {

        $this->form_validation->set_rules('emailresend', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Resend | G-Sture 4.0';
            $data['label'] = 'G-Sture 4.0';
            $data['desclabel'] = '  Gramedia electronic Signature 4.0  ';
            $data['headerlabel'] = 'Resend Email Activation';
            $data['detaillabel'] = 'Enter your email address below to have your activation email resent to you.';
            $data['bodyclass'] = 'bg-silver bg-lighten-md';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/resend');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_resend();
        }
    }

    public function _resend()
    {
        $email = $this->input->post('emailresend');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            //jika email terdaftar, reset activation code & expired time
            $id_user = $user['user_id'];
            $nameuser = $user['name'];
            $encryptednameResend = md5($nameuser);

            $timeResend = time();
            $ActivationCodeResend = md5(uniqid(rand()));;
            $expirestimeResend = strtotime('+4 days',  $timeResend);

            $data = array(
                'is_active' => 0,
                'date_updated' => $timeResend,
                'expired_time' => $expirestimeResend,
                'activationcode' => $ActivationCodeResend,
            );
            $this->db->where('email', $email);
            $this->db->where('user_id', $id_user);
            $this->db->update('tb_user', $data);

            //send mail for activate
            $this->load->config('email');
            $this->load->library('email');

            $from = $this->config->item('smtp_user');
            $to = $email;
            $subject = 'Reactivation Email Address';
            $message = 'Hello, ' . $nameuser . '!<br><br><br>Please click the button below to reactivation your email address.<br>
            <a href ="' . base_url() . 'auth/verification/' . $ActivationCodeResend . '/' . $expirestimeResend . '/' . $encryptednameResend . '" class="btn btn-success" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #58A4B0; text-decoration: none; border-radius: 6px;">Reactivation Email</a><br>
            <br>Regards,<br>Team<br><br>
            If you\'re having trouble clicking the "Reactivation Email" button copy and paste the URL below into your web browser: <br><br> <a href="' .
                base_url() . 'auth/verification/' . $ActivationCodeResend . '/' . $expirestimeResend . '/' . $encryptednameResend . '" class="btn btn-success">' . base_url() . 'auth/verification/' . $ActivationCodeResend . '/' . $expirestimeResend . '/' . $encryptednameResend . '</a><br>';

            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
            } else {
                show_error($this->email->print_debugger());
            }


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">If the email ' . $email . ' exists and has not been confirmed yet, we have sent an account confirmation email to ' . $email . '. <br>Please check your email to confirm your account. <br><br></div>');
            redirect('auth');
        } else {
            //jika email tidak terdaftar, arahkan ke register.
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Resend email activation. Your email is not registered!</div>');
            redirect('auth');
        }
    }
}
