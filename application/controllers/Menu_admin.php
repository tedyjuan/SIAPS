<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('backend/template/v_dashboard');
	}
}
