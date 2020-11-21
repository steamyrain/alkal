<?php

class DashboardUserController extends CI_Controller{

	public function index()
	{
        $userData = Auth::session()['user'];
		$this->load->view('template_pegawai/header');
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/dashboard',$userData);
		$this->load->view('template_pegawai/footer');
	}
}
