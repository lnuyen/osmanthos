<?php

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('raw_materials_model');
    }

    public function view($page = 'home')
    {
        if ( ! file_exists('../application/views/pages/'.$page.'.php'))
        {
            show_404(); // Whoops, we don't have a page for that!
        }

        // Set the Description meta tag for each page, or leave blank by default
        if ( $page === 'about-us') {
            $data['description'] = "Welcome to the new world of scent. osmanthōs makes it fun and easy to make your own fragrances by giving you all of the information, materials and tools in one place.";
        }
        elseif ( $page === 'how-it-works') {
            $data['description'] = 'osmanthōs equips you with all of the materials, supplies and information you need to create your own fragrances.';
        } 
        elseif ( $page === 'scent-101') {
            $data['description'] = 'Discover the art, science and laguage of scent.';
            $data['raw_materials'] = $this->raw_materials_model->get_rm();
            $data['families'] = $this->raw_materials_model->get_rm_families();

        } 
        elseif ( $page === 'home') {
            $data['description'] = "Create custom scents. We equip you with all of the materials, supplies and information you need to start creating your own fragrances.";
            $data['raw_materials'] = $this->raw_materials_model->get_rm();
        }
        else {
            // $data['description'] = '';
        }

        if ( $page === 'home') {
            $data['title'] = 'Make Your Own Perfume';
        }
        else {
            $data['title'] = ucwords(str_replace('-',' ',$page)); // Capitalize the first letter
        }

        $data['page'] = $page;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }

    public function signup()
    {
            $data['title'] = 'Sign Up';

            $this->load->view('pages/signup', $data);

    }
    
    public function confirm_email()
    {
            $data['title'] = 'Confirm Email';

            $this->load->view('templates/header', $data);
            $this->load->view('pages/confirm-email', $data);
            $this->load->view('templates/footer', $data);

    }
    
    public function confirmed()
    {
            $data['title'] = 'Confirmed'; 

            $this->load->view('templates/header', $data);
            $this->load->view('pages/confirmation', $data);
            $this->load->view('templates/footer', $data);
            
    }

}