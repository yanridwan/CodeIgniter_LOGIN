<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group') != 'Admin') {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('admin');
    }
}
