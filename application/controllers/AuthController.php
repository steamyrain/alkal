<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Auth\ControllerInterface;

class AuthController extends CI_Controller implements ControllerInterface {

    public function getUserProvider() {
        return 'AlkalUserProvider';
    }

    public function getMiddleware() {
        return 'AlkalAuthMiddleware';
    }

    public function login() {
        $this->load->view('template_administrator/header');
        $this->load->view('administrator/login.php');
        $this->load->view('template_administrator/footer');
        $username = $this->input->post('username');
        $password = $this->input->post('username');
        echo $username;
        echo $password;
    }

    public function logout() {
        return;
    }

    public function signup() {
        return;
    }
    public function emailVerification($token) {
        return;
    }

    public function passwordReset() {
        return;
    }

    public function passwordResetForm($token) {
        return;
    }
}
