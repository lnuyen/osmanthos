<?php
class Kits extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('raw_materials_model');
        $this->load->model('kits_model');
        $this->load->model('blends_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $data['title'] = 'Scent Kits';
        $data['description'] = 'Everything you need to create custom scents. Each scent kit is based around a featured ingredient and contains a curated selection of raw materials to explore. Learn to smell and evaluate raw materials, then experiment with different blends to create unique fragrance formulas.';
        $data['template'] = 'scent-kits';
        $data['kits'] = $this->kits_model->get_kit();

        $this->load->view('templates/header', $data);
        $this->load->view('scent-kits/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug)
    {
        $data['kit'] = $this->kits_model->get_kit($slug);

        if (empty($data['kit']))
        {
            show_404();
        }

        $name = $data['kit']['name'];
        $number = $data['kit']['number'];
        $main_ingredient = $data['kit']['main_ingredient'];
        $data['title'] = ucwords('Scent Kit - ' . $number .' ' . $name);
        $data['template'] = 'scent-kit';
        $data['description'] = 'Create custom scents with a curated selection of raw materials featuring '.$name.'. Join osmanthōs today to make your own perfume using '.$name.'.';

        // get kit raw materials
        $data['raw_materials'] = $this->kits_model->get_kit_rms($slug);

        $this->load->view('templates/header', $data);
        $this->load->view('scent-kits/view', $data);
        $this->load->view('templates/footer');

    }

    public function mailer()
    {
        // My modifications to mailer script from:
        // http://blog.teamtreehouse.com/create-ajax-contact-form
        // Added input sanitizing to prevent injection

        // Only process POST reqeusts.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form fields and remove whitespace.
            $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
            $form_id = trim($_POST["form_id"]);

            // Check that data was sent to the mailer.
            if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                echo "Oops! There was a problem with your submission. Please complete the form and try again.";
                exit;
            }

            $this->email->from('mail@osmanthos.com', 'osmanthōs');
            $this->email->to('hello@osmanthos.com'); 
            $this->email->subject("New Email - Scent Kits List");
            $this->email->message("add me to the list! ---> $email\n\n$form_id");  

            //$this->email->send(); was causing the email to send twice. it send below

            // Send the email.
            if ( $this->email->send() ) {
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo "Success! You're on the list! We will notify you when Scent Kits are available.";
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo "Oops! Something went wrong and we couldn't send your message.";
            }

        } else {
            // Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "There was a problem with your submission, please try again.";
        }
    }

}