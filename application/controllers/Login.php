<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mglobal');
		// $is_logged = $this->session->userdata('is_logged_in');
		// if ($is_logged) {
		// 	redirect('Dashboard');
		// }
	}
	public function index()
	{
		// $a = password_hash('role2@gmail.com123', PASSWORD_DEFAULT);
		//  var_dump($a); die; 
		$this->load->view('forntend/login/v_formlogin');
	}

	function proseslogin(){
		if ($this->input->post('token') != $this->session->csrf_token || !$this->input->post('token') ||  !$this->session->csrf_token) {
			$this->session->unset_userdata('csrf_token');
			$jsonmsg = array(
				"hasil" => 'false',
				"pesan" => "Token Tidak Sesuai",
			);
			echo json_encode($jsonmsg);
		} else {
			$this->form_validation->set_rules('myemail', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('floatingInput', 'Password', 'required');
			// Custom pesan error
			$this->form_validation->set_message('required', '{field} wajib diisi.');
			if ($this->form_validation->run() == FALSE) {
				$jsonmsg = [
					'hasil'            => 'false',
					'param'            => 'validasi',
					'err_email'        => strip_tags(form_error('email', '', '')),
					'err_userPassword' => strip_tags(form_error('floatingInput', '', '')),
				];
				echo json_encode($jsonmsg);
			} else {
				$email     = sanitize_input($this->input->post('myemail'));
				$userPassword = $this->input->post('floatingInput');
				$concate      = $email  . $userPassword;
				$data_user    = $this->Mglobal->getWhere("tbl_user", ['szEmail' => $email])->row();
				if ($data_user == null) {
					$jsonmsg = [
						'hasil'     => 'false',
						'param'     => 'validasi',
						'err_email' => "email Tidak Terdaftar",
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
						$jsonmsg = [
							'hasil'     => 'false',
							'param'     => 'validasi',
							'err_userPassword' => "Password Tidak Valid",
						];
						echo json_encode($jsonmsg);
					}
				}
			}
		}
		
	}
	 public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	 }
}
