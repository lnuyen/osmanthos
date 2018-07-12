<?php
class Palettes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('raw_materials_model');
        $this->load->model('palettes_model');
        $this->load->model('blends_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //remove_ssl();
    }

    public function index()
    {
        if ( !$this->ion_auth->logged_in() ) 
        {
            redirect('/auth/login/');
        }
			
        $data['title'] = 'Palettes';
        $data['description'] = 'Naturally, you may want to smell some blends and raw material before using them in your formula. Palettes allow you to smell ingredients at home. Order a palette to receive ten small samples, along with blotters, notes on each ingredient, and helpful tips.';
        $data['raw_materials'] = $this->raw_materials_model->get_rm();
        $data['blends'] = $this->blends_model->get_blends();

        $this->load->view('templates/header', $data);
        $this->load->view('palettes/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['palette'] = $this->palettes_model->get_palette($id);

        /*if (empty($data['raw_material']))
        {
            show_404();
        }*/

        $this->load->view('palettes/view', $data);
    }

    public function choose()
    {
        if ( !$this->ion_auth->logged_in() ) 
        {
            redirect('/auth/login/');
        }
            
        $data['title'] = 'Palettes';
        $data['description'] = 'Naturally, you may want to smell some blends and raw material before using them in your formula. Palettes allow you to smell ingredients at home. Order a palette to receive ten small samples, along with blotters, notes on each ingredient, and helpful tips.';
        $data['raw_materials'] = $this->raw_materials_model->get_rm();
        $data['blends'] = $this->blends_model->get_blends();

        $this->load->view('templates/header', $data);
        $this->load->view('palettes/choose', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
    	if ( !$this->ion_auth->logged_in() )
        {
            show_404();
        }
        
        $this->form_validation->set_rules('choose1', 'Raw Material 1', 'required');
        $this->form_validation->set_rules('choose2', 'Raw Material 2', 'required');
        $this->form_validation->set_rules('choose3', 'Raw Material 3', 'required');
        $this->form_validation->set_rules('choose4', 'Raw Material 4', 'required');
        $this->form_validation->set_rules('choose5', 'Raw Material 5', 'required');
        $this->form_validation->set_rules('choose6', 'Raw Material 6', 'required');
        $this->form_validation->set_rules('choose7', 'Raw Material 7', 'required');
        $this->form_validation->set_rules('choose8', 'Raw Material 8', 'required');
        $this->form_validation->set_rules('choose9', 'Raw Material 9', 'required');
        $this->form_validation->set_rules('choose10', 'Raw Material 10', 'required');
        
        if ($this->form_validation->run() === FALSE )
        {
            echo json_encode('false');
        }
        else
        {
            $id = $this->palettes_model->create_palette(); //create palette
            
            $insert = array (
	            'id' => '5',
	            'qty' => 1,
	            'price' => 20.00,
	            'name' => 'Palette',
	            'options' => array('option_name' => 'Custom','item_id' => $id)
            );
        
            $this->cart->insert($insert); //add palette to cart
            
            echo json_encode('true');
        }

    }

}