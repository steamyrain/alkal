<?php

class DashboardAdminController extends CI_Controller{
 
    // index function acts as the index.html for controller
	public function index()
	{
        $userData = Auth::session()['user'];
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/dashboard',$userData);
        $this->load->view('template_administrator/footer');
    }
}
