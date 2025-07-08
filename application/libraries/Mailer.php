<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    protected $_ci;
    protected $email_pengirim = 'kkenaldeh@gmail.com'; // Isikan dengan email pengirim
    protected $nama_pengirim = 'SIAPS.COM'; // Isikan dengan nama pengirim
    protected $password = 'jdmt sqeg upgc npxy'; // Isikan dengan password email pengirim

    public function __construct(){
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        require_once(APPPATH.'third_party/phpmailer/Exception.php');
        require_once(APPPATH.'third_party/phpmailer/PHPMailer.php');
        require_once(APPPATH.'third_party/phpmailer/SMTP.php');
    }

    public function send($data){
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $this->email_pengirim; // Email Pengirim
        $mail->Password = $this->password; // Isikan dengan Password email pengirim
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
        // $mail->Port = 465;
        // $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
		$html = '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Verifikasi Email</title>
			<style>
				body {
					font-family: Arial, sans-serif;
					background-color: #f4f6f9;
					margin: 0;
					padding: 0;
				}
				.email-wrapper {
					max-width: 600px;
					margin: 40px auto;
					background-color: #ffffff;
					border-radius: 10px;
					overflow: hidden;
					box-shadow: 0 4px 10px rgba(0,0,0,0.1);
				}
				.email-header {
					background-color: #4CAF50;
					padding: 20px;
					text-align: center;
					color: #f0f0f0;
				}
				.email-header img {
					max-height: 50px;
				}
				.email-body {
					padding: 30px;
				}
				.email-body h2 {
					color: #333;
					margin-bottom: 10px;
				}
				.email-body p {
					color: #555;
					line-height: 1.6;
				}
				.otp-code {
					display: inline-block;
					background-color: #f0f0f0;
					color: #333;
					font-size: 24px;
					font-weight: bold;
					padding: 10px 20px;
					border-radius: 8px;
					margin-top: 20px;
				}
				.email-footer {
					background-color: #f4f4f4;
					text-align: center;
					padding: 15px;
					font-size: 12px;
					color: #888;
				}
				@media only screen and (max-width: 600px) {
					.email-body {
						padding: 20px;
					}
					.otp-code {
						font-size: 20px;
						padding: 8px 16px;
					}
				}
			</style>
		</head>
		<body>
			<div class="email-wrapper">
				<div class="email-header">
					<h2>Kode Verifikasi </h2>
				</div>
				<div class="email-body">
					<h2>Halo, </h2>
					<p>Kami menerima permintaan untuk verifikasi email Anda.</p>
					<p>Gunakan kode verifikasi berikut untuk melanjutkan proses:</p>
					<div class="otp-code">'. $data['kode']. '</div>
					<p>Kode ini hanya berlaku selama 10 menit. Jangan bagikan kepada siapa pun.</p>
					<p>Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.</p>
				</div>
				<div class="email-footer">
					&copy; ' . date("Y") . ' MyApp. Semua hak dilindungi.
				</div>
			</div>
		</body>
		</html>
		';

		$mail->Body = $html;
		// $mail->Body = $data['content'];
        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            $response = array('status'=>'true', 'message'=>'Email berhasil dikirim');
        }else{ // Jika Email Gagal dikirim
            $response = array('status'=>'false', 'message'=>'Email gagal dikirim');
        }
        return $response;
    }

}
