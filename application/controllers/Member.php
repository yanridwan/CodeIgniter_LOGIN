<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group') != 'Member') {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('member');
    }
}
