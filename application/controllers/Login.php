<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mglobal');
		date_default_timezone_set('Asia/Jakarta');

		// $is_logged = $this->session->userdata('is_logged_in');
		// if ($is_logged) {
		// 	redirect('Dashboard');
		// }
	}
	public function index()
	{
		// $a = password_hash('role2@gmail.com123', PASSWORD_DEFAULT);
		$this->load->view('forntend/login/v_formlogin');
	}

	public function verify()
	{
		$token = $this->input->get('token-otp', TRUE); // dari URL
		$data_token    = $this->Mglobal->getWhere("tbl_token_email", ['uuid' => $token])->row();
		if($data_token == null){
			redirect('not-found');
			exit;
		}
		$data['waktu_datetime'] = $data_token->expired_at;
		$this->load->view('forntend/login/v_verification', $data);
	}
	public function lupapassword()
	{
		// Memuat helper untuk membuat CAPTCHA dan manipulasi file
		$this->load->helper(['captcha', 'file']);

		// Memuat library session CodeIgniter
		$this->load->library('session');

		// Path tempat menyimpan file CAPTCHA image
		$captchaPath = './captcha/';

		// URL untuk mengakses gambar CAPTCHA dari browser
		$captchaUrl  = base_url('captcha/');

		// Batas waktu kedaluwarsa file captcha (dalam detik)
		$expiration  = 30;

		// Timestamp mikro (pakai microtime) untuk keperluan nama file dan penghapusan
		$now = microtime(true);

		// Mengambil alamat IP pengguna
		$ip = $this->input->ip_address();

		// Timestamp biasa (detik) untuk digunakan pada logika rate limiting
		$nowInt = time();

		// =================== R A T E   L I M I T ===================
		// Mengambil data rate limit dari session
		$ip_limit = $this->session->userdata('captcha_limit');

		if (!$ip_limit) {
			// Jika data belum ada, buat data awal untuk IP ini
			$ip_limit = [
				'ip'         => $ip,
				'attempts'   => 1,
				'start_time' => $nowInt
			];
		} else {
			// Jika session sudah ada dan IP cocok
			if ($ip_limit['ip'] == $ip) {
				$elapsed = $nowInt - $ip_limit['start_time'];

				if ($elapsed < 600) { // Jika masih dalam 10 menit
					if ($ip_limit['attempts'] >= 10) {
						// Jika lebih dari 10 kali akses dalam 10 menit, redirect + flash pesan
						$this->session->set_flashdata('info', 'Kamu terlalu sering refresh captcha. Silakan coba lagi dalam 10 menit.');
						redirect('Login'); // Ganti dengan halaman login kamu
						return;
					} else {
						// Tambah jumlah percobaan refresh
						$ip_limit['attempts']++;
					}
				} else {
					// Sudah lewat 10 menit, reset ulang data limitnya
					$ip_limit['attempts'] = 1;
					$ip_limit['start_time'] = $nowInt;
				}
			} else {
				// IP berbeda (mungkin user lain atau session tumpang tindih), reset ulang
				$ip_limit = [
					'ip'         => $ip,
					'attempts'   => 1,
					'start_time' => $nowInt
				];
			}
		}

		// Simpan data IP limit yang baru ke session
		$this->session->set_userdata('captcha_limit', $ip_limit);

		// =================== H A P U S   C A P T C H A   L A M A ===================
		foreach (glob($captchaPath . '*.jpg') as $filePath) {
			$filename = pathinfo($filePath, PATHINFO_FILENAME);

			// Pastikan nama file berupa angka (karena kita pakai microtime sebagai nama)
			if (is_numeric($filename)) {
				// Jika umur file lebih dari batas expire, hapus
				if (($now - (float) $filename) > $expiration) {
					@unlink($filePath); // Hapus file gambar captcha lama
				}
			}
		}

		// =================== G E N E R A T E   C A P T C H A ===================
		// Gunakan nama file unik berdasarkan timestamp
		$fileName = microtime(true) . '.jpg';

		// Konfigurasi CAPTCHA
		$vals = [
			'word'        => '', // Biarkan kosong, akan digenerate otomatis
			'img_path'    => $captchaPath,
			'img_url'     => $captchaUrl,
			'img_name'    => $fileName,
			'font_path'   => FCPATH . 'public/admin/assets/fonts/static/Roboto-Black.ttf',
			'img_width'   => 150,
			'img_height'  => 50,
			'word_length' => 5, // Panjang karakter CAPTCHA
			'font_size'   => 20,
			'img_id'      => 'captcha_image',
			'pool'        => '0123456789abcdefghijkmnopqrstuvwxyz',
			'colors'      => [
				'background' => [255, 255, 255],
				'border'     => [255, 255, 255],
				'text'       => [0, 0, 0],
				'grid'       => [255, 40, 40],
			]
		];

		// Buat CAPTCHA berdasarkan konfigurasi di atas
		$captcha = create_captcha($vals);

		// Simpan kata yang benar ke session untuk validasi nanti
		$this->session->set_userdata('captcha_word', $captcha['word']);

		// Kirim gambar captcha ke view
		$data['captcha_image'] = $captcha['image'];

		// Tampilkan view form lupa password
		$this->load->view('forntend/login/v_lupapass', $data);
	}

	function proseslogin()
	{
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai, Silahkan Refresh Halaman Kembali",
			);
			echo json_encode($jsonmsg);
		} else {
			$this->form_validation->set_rules('myemail', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('floatingInput', 'Password', 'required');
			$this->form_validation->set_message('required', '{field} wajib diisi.');
			if ($this->form_validation->run() == FALSE) {
				$this->session->unset_userdata('csrf_token');
				$jsonmsg = [
					'hasil'            => 'false',
					'param'            => 'validasi',
					'err_email'        => strip_tags(form_error('myemail', '', '')),
					'err_userPassword' => strip_tags(form_error('floatingInput', '', '')),
				];
				echo json_encode($jsonmsg);
			} else {
				$email     = sanitize_input($this->input->post('myemail'));
				$userPassword = $this->input->post('floatingInput');
				$concate      = $email  . $userPassword;
				$data_user    = $this->Mglobal->getWhere("tbl_user", ['szEmail' => $email])->row();
				if ($data_user == null) {
					$this->session->unset_userdata('csrf_token');
					$jsonmsg = [
						'hasil' => 'false',
						"pesan" => "Email atau Password tidak valid",
						'kode'  => '0101',
					];
					echo json_encode($jsonmsg);
				} else {
					// $a = password_hash('teddy112233', PASSWORD_DEFAULT);
					if (password_verify($concate, $data_user->szPassword)) {
						$data_session = [
							'user_id'      => $data_user->id,
							'email'        => $data_user->szEmail,
							'name'         => $data_user->szName,
							'role'         => $data_user->szRole,
							'is_logged_in' => TRUE
						];
						$this->session->set_userdata($data_session);
						$jsonmsg = [
							'hasil' => 'true',
							'pesan' => "Selamat Datang Kembali",
							'redirecTO' =>  base_url('menu-admin'),
						];
						echo json_encode($jsonmsg);
					} else {
						$this->session->unset_userdata('csrf_token');
						$jsonmsg = [
							'hasil' => 'false',
							"pesan" => "Email atau Password tidak valid",
							'kode'  => '1010',
						];
						echo json_encode($jsonmsg);
					}
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}


	public function proses_lupapassword()
	{
		$this->load->library('session');
		$this->load->library('mailer');
		$this->load->helper(['form', 'url']);
		$this->load->library('form_validation');
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai, Silahkan Refresh Halaman Kembali",
			);
			echo json_encode($jsonmsg);
		} else {
			// Aturan validasi
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('captcha', 'Captcha', 'required');
			$this->form_validation->set_message('required', '{field} wajib diisi.');
			if ($this->form_validation->run() == FALSE) {
				// Jika validasi gagal, kembalikan ke form
				$this->session->unset_userdata('csrf_token');
				$jsonmsg = [
					'hasil'       => 'false',
					'param'       => 'validasi',
					'err_email'   => strip_tags(form_error('email', '', '')),
					'err_captcha' => strip_tags(form_error('captcha', '', '')),
				];
				echo json_encode($jsonmsg);
			} else {

				$email       = $this->input->post('email', TRUE);
				$captcha     = $this->input->post('captcha', TRUE);
				$sessCaptcha = $this->session->userdata('captcha_word');
				if ($captcha !== $sessCaptcha) {
					$this->session->unset_userdata('csrf_token');
					$jsonmsg = [
						'hasil' => 'false',
						"pesan" => "Captcha tidak cocok!",
					];
					echo json_encode($jsonmsg);
				} else {
					$get_user = $this->Mglobal->getWhere("tbl_user", ['szEmail' => $email])->row();
					if ($get_user != null) {
						$token_email = $this->generate_random_number_6();

						$sendmail = array(
							'email_penerima' => $email,
							'subjek'         => "RESET PASSWORD",
							'kode'           => $token_email,
						);

						$response_email =	$this->mailer->send($sendmail);
						if ($response_email['status'] == 'true') {
							$cek_email_token = $this->Mglobal->getWhere("tbl_token_email", ['email' => $email])->num_rows();
							if ($cek_email_token != 0) {
								$this->Mglobal->delete("tbl_token_email", ['email' => $email]);
							}
							$uuid_asli    = $this->uuid->v4();
							$uuid_bersih  = str_replace('-', '', $uuid_asli);
							$insert_token = [
								'uuid'       => $uuid_bersih,
								'email'      => $email,
								'token'      => $token_email,
								'expired_at' => date('Y-m-d H:i:s'),
								'status'     => '0',
							];
							$this->Mglobal->insert($insert_token, "tbl_token_email");
						}
						$redirect_url = base_url('verify?token-otp=' . $uuid_bersih);
						$jsonmsg = [
							'hasil'       => $response_email['status'],
							'pesan'       => $response_email['message'],
							'redirect_to' => $redirect_url,
						];
						echo json_encode($jsonmsg);
					} else {
						$jsonmsg = [
							'hasil' => 'false',
							'pesan' => 'Email Anda tidak terdaftar',
						];
						echo json_encode($jsonmsg);
					}
				}
			}
		}
	}
	public function generate_random_number_6()
	{
		$digits = '123456789'; // tanpa angka 0
		$result = '';
		for ($i = 0; $i < 5; $i++) {
			$result .= $digits[rand(0, strlen($digits) - 1)];
		}
		return $result;
	}

	public function proses_verify()
	{
		date_default_timezone_set('Asia/Jakarta');
		$uuid = $this->input->get('token-otp', TRUE); // dari URL
		$otp1 = $this->input->post('otp1', TRUE);
		$otp2 = $this->input->post('otp2', TRUE);
		$otp3 = $this->input->post('otp3', TRUE);
		$otp4 = $this->input->post('otp4', TRUE);
		$otp5 = $this->input->post('otp5', TRUE);
		$otp_full = $otp1 . $otp2 . $otp3 . $otp4 . $otp5;
		$data_token    = $this->Mglobal->getWhere("tbl_token_email", ['uuid' => $uuid])->row();
		if($data_token == null){
			$jsonmsg = [
				'hasil' => 'false',
				'pesan' => 'token otp anda tidak di kenali',
			];
			echo json_encode($jsonmsg);
			exit;
		}
		$otp_db = $data_token->token; 
		if($otp_db != $otp_full){
			$jsonmsg = [
				'hasil' => 'false',
				'pesan' => 'OTP di Tolak, Perikasa kembali OTP Anda',
			];
			echo json_encode($jsonmsg);
			exit;
		}
		// cek expaired 
		$expired_at      = strtotime($data_token->expired_at);  // ubah ke timestamp
		$now             = time();                              // sekarang (timestamp)
		$diff_in_minutes = ($now - $expired_at) / 60;
		if ($diff_in_minutes > 10) {
			$response = [
				'hasil' => 'false',
				'pesan' => 'Token sudah kadaluarsa, silakan minta ulang.'
			];
			echo json_encode($response);
			exit;
		}
		// $cek_email_token = $this->Mglobal->getWhere("tbl_token_email", ['email' => $email])->num_rows();

		 var_dump($data_token); die; 
		// Lakukan pengecekan token + otp di DB
		// Lalu kirim response JSON
	}
}
