<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //remove_ssl();
    }
    
    public function index()
    {
        if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

        	$data['title'] = 'Admin';
            $data['fullWidth'] = TRUE;
        	
        	$this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');

        }

        else {

            // Whoops, we don't have a page for that!
            show_404();

        }
    }
    
    public function formulas()
    {
        if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

            $data['formulas'] = $this->admin_model->get_formulas();
            $data['title'] = 'Formulas';
            $data['fullWidth'] = TRUE;

            $this->load->view('templates/header', $data);
            $this->load->view('admin/formulas', $data);
            $this->load->view('templates/footer');

        }

        else {

            // Whoops, we don't have a page for that!
            show_404();

        }
    }
    
    public function orders()
    {
        if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {
            
            $data['orders'] = $this->admin_model->get_orders();
            $data['title'] = 'Orders';
            $data['fullWidth'] = TRUE;

            $this->load->view('templates/header', $data);
            $this->load->view('admin/orders', $data);
            $this->load->view('templates/footer');

        }

        else {

            // Whoops, we don't have a page for that!
            show_404();

        }
    }
    
    public function lab_records()
    {
        if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

            $data['records'] = $this->admin_model->get_lab_records();
            $data['title'] = 'Lab Records';
            $data['fullWidth'] = TRUE;
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/lab-records', $data);
            $this->load->view('templates/footer');

        }
        
        else {

            // Whoops, we don't have a page for that!
            show_404();

        }
        
        //echo '<pre>';
        //echo print_r($data);
    }
    
    public function submit_lab_record()
    {
        $this->form_validation->set_rules('formula_id','formula_id');
        $this->form_validation->set_rules('f_name', 'f_name');
        
        if ($this->form_validation->run() === FALSE )
        {
            echo json_encode('false');
        }
        else
        {
            $this->admin_model->create_lab_record();
            echo json_encode('true');   
        }
        
    }
    
    public function update_lab_record_notes()
    {
        $this->form_validation->set_rules('admin_notes', 'admin_notes');
        $this->form_validation->set_rules('id', 'id');
        
        if ($this->form_validation->run() === FALSE )
        {
            echo json_encode('false');
        }
        else
        {
            $this->admin_model->update_lab_record_notes();
            echo json_encode('true');   
        }
    }
}