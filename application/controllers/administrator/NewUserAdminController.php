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
        //
        // query job data for view user_form jobId radio 
        $data['job'] = $this->job_model->ambil_semua_data()->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/user_form',$data);
        $this->load->view('template_administrator/footer');
    }

    public function input_aksi() {
        // userProviderInstance to hash password
        $userProviderInstance=Auth::loadUserProvider('AlkalUserProvider');

        // load form rules
        $this->_rules();

        if ($this->form_validation->run()==FALSE) {
            $this->input();
        }
        else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $jobId = $this->input->post('jobId');
            $gender = $this->input->post('gender');
            $role = $this->input->post('role');
            $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT); 

            $userData = [
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'username'=>$username,
                'jobId'=>$jobId,
                'gender'=>$gender,
                'role'=>$role,
                'password'=>$password,
            ];
            $this->user_model->create_user($userData);
            $this->session->set_flashdata('pesan',
                '<div 
                    class=" alert 
                            alert-success 
                            dismissible 
                            fade 
                            show
                            " 
                    role="alert">
                Data Berhasil Ditambahkan!
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="alert" 
                    aria-label="Close">
                <span 
                    aria-hidden="true">
                &times;
                </span>
                </button>
                </div>');
            redirect(route('user-table-admin'));
        }
    }
    
    public function _rules() {
		$this->form_validation->set_rules('first_name','first_name','required',['required' => 'Nama Depan Wajib Diisi']);
		$this->form_validation->set_rules('last_name','last_name','required',['required' => 'Nama Belakang Wajib Diisi']);
		$this->form_validation->set_rules('gender','gender','required',['required' => 'Jenis Kelamin Wajib Diisi']);
		$this->form_validation->set_rules('username','username','required',['required' => 'Username Wajib Diisi']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password Wajib Diisi']);
		$this->form_validation->set_rules('role','role','required',['required' => 'Role Wajib Diisi']);
		$this->form_validation->set_rules('jobId','jobId','required',['required' => 'Bidang Kerja Wajib Diisi']);
    }
}
