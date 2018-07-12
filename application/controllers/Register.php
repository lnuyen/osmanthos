<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');

        $this->pageTitle = 'Account';
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        //$this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','trim|min_length[8]|max_length[20]|required');
        $this->form_validation->set_rules('confirm_password','Confirm password','trim|matches[password]|required');

        if($this->form_validation->run()===FALSE)
        {
            $metadata['title'] = $this->pageTitle;

            $this->load->view('templates/header', $metadata);
            $this->load->view('register/index');
            $this->load->view('templates/footer');
        }
        else
        {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('email');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name
            );

            if($this->ion_auth->register($username,$password,$email,$additional_data))
            {
                $_SESSION['auth_message'] = 'Your account has been created. You may now sign in.';
                $this->session->mark_as_flash('auth_message');
                redirect('login');
            }
            else
            {
                $_SESSION['auth_message'] = $this->ion_auth->errors();
                $this->session->mark_as_flash('auth_message');
                redirect('register');
            }
        }
    }

    public function invite() {
        $metadata['title'] = 'Request an invite';

        $this->load->view('templates/header', $metadata);
        $this->load->view('register/invite');
        $this->load->view('templates/footer');
    }

    public function mc_confirmed() {
        $metadata['title'] = 'Confirmation';

        $this->load->view('templates/header', $metadata);
        $this->load->view('register/mc-confirmed');
        $this->load->view('templates/footer');
    }
}