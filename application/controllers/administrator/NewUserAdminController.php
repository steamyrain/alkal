<?php

use Luthier\Auth;
use Luthier\Debug;

class NewUserAdminController extends CI_Controller{
 
    
    // index function acts as the index.html for controller
	public function index()
	{
		$data['user'] = $this->user_model->ambil_semua_data()->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/user',$data);
        $this->load->view('template_administrator/footer');
    }

    public function input() {
        $data['job'] = $this->job_model->ambil_semua_data()->result();
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/user_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function input_aksi() {
        // userProviderInstance to hash password
        $userProviderInstance=Auth::loadUserProvider('AlkalUserProvider');

        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $username = $this->input->post('username');
        $jobId = $this->input->post('jobId');
        $gender = $this->input->post('gender');
        $role = $this->input->post('role');
        $password = $userProviderInstance->hashPassword($this->input->post('password')); 
        $userData = [
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'username'=>$username,
            'jobId'=>$jobId,
            'gender'=>$gender,
            'role'=>$role,
            'password'=>$password,
        ];
        Debug::log($userData,'info');
        $this->input();
    }
}
