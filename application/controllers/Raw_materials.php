<?php
class Raw_materials extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('raw_materials_model');
        $this->load->model('account_model');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Raw Materials - Perfume Ingredients',
            'description'   => 'Raw materials are the individual ingredients that make up a perfume formula. View our collection of natural and synthetic perfume ingredients.',
            'template'      => 'raw-materials',
            'raw_materials' => $this->raw_materials_model->get_rm(),
            'families'      => $this->raw_materials_model->get_rm_families(),
            'types'         => $this->raw_materials_model->get_rm_types(),
        );

        if ( $this->ion_auth->logged_in() ) // show favorite raw materials for logged in users
        {
            $data['faves'] = $this->account_model->get_fave_rm_by_id();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('raw-materials/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function view($slug)
    {
        $data['raw_material'] = $this->raw_materials_model->get_rm($slug);

        if ( $this->ion_auth->logged_in() ) // show if favorite raw material for logged in users
        {
            $data['favorite'] = $this->raw_materials_model->is_favorite($slug);
        }

        if (empty($data['raw_material']))
        {
            redirect('raw-materials');
        }

        $name = $data['raw_material']['name'];
        $data['title'] = ucwords($name.' - Perfume Ingredient');
        $data['description'] = 'Learn about the scent, characteristics and popular uses of the perfume ingredient '.$name.'. Join osmanthōs today to make your own perfume using '.$name.'.';
        $data['template'] = 'raw-material';

        // get similar raw materials
        $family = $data['raw_material']['family'];
        $data['raw_materials'] = $this->raw_materials_model->get_rms_similar($family, $name);

        $this->load->view('templates/header', $data);
        $this->load->view('raw-materials/view', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('scent', 'Scent', 'required');
        $this->form_validation->set_rules('family', 'Family', 'required');
        $this->form_validation->set_rules('tmd', 'TMD', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('price', 'Price');
        $this->form_validation->set_rules('perfumes', 'Perfumes');
        $this->form_validation->set_rules('pairswith', 'Pairs With');
        $this->form_validation->set_rules('notes', 'Notes');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('raw-materials/add');

        }
        else
        {
            $this->raw_materials_model->set_rm();
            redirect('raw-materials');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        if (isset($_POST['edit_rm']))
        {
            $this->raw_materials_model->edit_rm($id);
            redirect('raw-materials');
        }
    }

}