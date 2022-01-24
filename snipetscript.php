$this->load->library('ciqrcode');

$output = [
'status' => false,
'message' => '',
'error' => ''
];
$filejudulPDF = $this->input->post('judulPDF', true);

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

//create QR Code
$params['data'] = site_url('pdf/sudah_ttd/' . $file_names[0] . '_signed.pdf');
$params['level'] = 'H';
$params['size'] = 4;
$params['savename'] = FCPATH . "pdf/qrcode/" . $qr_image;
$this->ciqrcode->generate($params);

//add logo in QR Code
$fullpathQR = FCPATH . "/pdf/qrcode/" . $qr_image;
$logopathQR = FCPATH . "/assets/img/logo/gsturelogo.png";
$QR = imagecreatefrompng($fullpathQR);
$logo = imagecreatefromstring(file_get_contents($logopathQR));
imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
imagealphablending($logo, false);
imagesavealpha($logo, true);
$QR_width = imagesx($QR); //get logo width
$QR_height = imagesy($QR); //get logo width

$logo_width = imagesx($logo);
$logo_height = imagesy($logo);

$logo_qr_width = $QR_width / 2;
$scale = $logo_width / $logo_qr_width;
$logo_qr_height = $logo_height / $scale;

imagecopyresampled($QR, $logo, $QR_width / 4, $QR_height / 3.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
imagepng($QR, $fullpathQR);

//encode PDF to Base64
$fullpathPDF = FCPATH . "pdf/belum_ttd" . "/" . $file_names[0] . '.pdf';
$data64 = base64_encode(file_get_contents($fullpathPDF));
$data['data64PDF'] = $data64;

$data['filenamepdf'] = $file_names[0] . '.pdf';
//var_dump($data['data64PDF']);
//die();

//save pdf unsigned to database
$userId = $data['user']['user_id'];
$email = $data['user']['email'];
$userName = $data['user']['name'];
$pdfTitle = $filejudulPDF;
$pdfOptionalMsg = trim($this->input->post('pdfOptionalMsg', true));

$datapdfunsigned = [
'id_sign_ttd' => NULL,
'user_id' => $userId,
'email' => NULL,
'pdf_title' => $pdfTitle,
'pdf_optional_msg' => $pdfOptionalMsg,
'pdf_unsigned' => $file_names[0],
'pdf_signed' => NULL,
'pdf_final_signed' => NULL,
'pdf_status' => 1, // 1::unsigned, 2::signed, 3::final signed
'qrcode' => $qr_image,
'user_created' => $userName,
'date_created' => time(),
'date_updated' => time()
];
$this->db->where('user_id', $userId);
$this->db->where('pdf_title', $pdfTitle);
$this->db->where('pdf_unsigned', $file_names[0]);
//$this->db->where('default_sign', 1);
$result = $this->db->get('tb_signature_docs');

if ($result->num_rows() == 0) {
// $this->db->insert('tb_signature_docs', $datapdfunsigned);
}