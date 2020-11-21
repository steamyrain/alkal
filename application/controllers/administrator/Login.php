<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Auth;

class Login extends CI_Controller {
    public function index()
	{
		$this->load->view('template_administrator/header');
		$this->load->view('administrator/login');
		$this->load->view('template_administrator/footer');
	}
}
