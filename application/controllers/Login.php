<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->load->model('LoginModel');
            $valid_user = $this->LoginModel->check_credential();

            if ($valid_user == FALSE) {
                redirect('login');
            } else {
                // if the username and password is a match
                $this->session->set_userdata('username', $valid_user->users_name);
                $this->session->set_userdata('group', $valid_user->users_role);

                switch ($valid_user->users_role) {
                    case 'Admin': //admin
                        redirect('Admin');
                        break;
                    case 'Member': //member
                        redirect('member');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
