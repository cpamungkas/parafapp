<?php defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'ssl://smtp.googlemail.com', //'10.12.30.10', 
    'smtp_port' => 465,
    'smtp_user' => 'necha10.02@gmail.com', //'redaksi@gramediapustakautama.id', //'itservicedesk@gramedia.com',
    'smtp_pass' => 'rqjzzxkmyzehkuyh', //'1d427p8trb8347r', //'HDgr4m3d1470!',    
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
