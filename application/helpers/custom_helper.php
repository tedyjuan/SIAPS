<?php
defined('BASEPATH') or exit('No direct script access allowed');




if (!function_exists('is_logged_in')) {
	function is_logged_in()
	{
		$CI = &get_instance();
		$is_logged = $CI->session->userdata('is_logged_in');

		if (!$is_logged) {
			$CI->session->sess_destroy();

			// Cek apakah ini request AJAX
			if ($CI->input->is_ajax_request()) {
				// Kirim response JSON khusus
				echo json_encode([
					'session_expired' => true,
					'redirect' => base_url('/'),
					'message' => 'Session Anda telah habis. Silakan login kembali.',
				]);
				http_response_code(401); // unauthorized
				exit;
			} else {
				// Request biasa
				redirect('/');
				exit;
			}
		}
	}
}


if (!function_exists('ringkasan')) {
	function ringkasan($teks, $panjang = 100)
	{
		$teks = strip_tags($teks); // Buang tag HTML
		if (strlen($teks) <= $panjang) return $teks;

		$potong = substr($teks, 0, $panjang);
		$spasiTerakhir = strrpos($potong, ' ');
		return substr($potong, 0, $spasiTerakhir) . '...';
	}
}
if (!function_exists('time_ago')) {
	function time_ago($datetime)
	{
		$timestamp = is_numeric($datetime) ? $datetime : strtotime($datetime);
		$diff = time() - $timestamp;

		if ($diff < 60) {
			return 'just now';
		}

		$units = [
			31536000 => 'year',
			2592000  => 'month',
			604800   => 'week',
			86400    => 'day',
			3600     => 'hour',
			60       => 'minute',
		];

		foreach ($units as $seconds => $unit) {
			$value = floor($diff / $seconds);
			if ($value >= 1) {
				return $value . ' ' . $unit . ($value > 1 ? 's' : '') . ' ago';
			}
		}

		return 'just now';
	}
}
if (!function_exists('check_role')) {
	function check_role($allowed_roles = [])
	{
		$CI = &get_instance();
		$user_role = $CI->session->userdata('role');

		if (!$user_role || !in_array($user_role, $allowed_roles)) {
			redirect('auth/no_access');
			exit;
		}
	}
}

// membuat csrf token sendiri 
if (!function_exists("get_csrf_token")) {
	function get_csrf_token()
	{
		$ci = &get_instance();
		if (!$ci->session->csrf_token) {
			$ci->session->csrf_token = hash('sha1', "tedyzhu@gmail.com" . time());
		}
		return $ci->session->csrf_token;
	}
}

if (!function_exists("get_csrf_name")) {
	function get_csrf_name()
	{
		return "token";
	}
}
if (!function_exists("get_csrf_id")) {
	function get_csrf_id()
	{
		return "token";
	}
}
if (!function_exists('add_csrf')) {
	function add_csrf()
	{
		return "<input type='hidden' class='form-control' readonly name='" . get_csrf_name() . "' id='" . get_csrf_id() . "' value='" . get_csrf_token() . "' />";
	}
}
if (!function_exists('errorform')) {
	function errorform($code, $pesan)
	{
		$CI = &get_instance();
		$data['kode'] = $code;
		$data['pesan'] = $pesan;
		$CI->load->view('errorpages/404', $data);
	}
}

function sanitize_input($input)
{
	if (is_array($input)) {
		return array_map('sanitize_input', $input);
	} else {
		$input = trim($input);
		$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
		return $input;
	}
}

