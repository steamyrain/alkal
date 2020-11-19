<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function index() {
        ci()->load->view('administrator/add_admin');
    }
}
