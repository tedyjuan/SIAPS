<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myerror extends CI_Controller
{

	public function page_missing()
	{
		$this->output->set_status_header('404');
		$this->load->view('errors/html/my_404');
	}
}
