<?php
class Blends extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blends_model');
        $this->load->model('raw_materials_model');
        $this->load->model('account_model');
        //remove_ssl();
    }

    public function index()
    {

        // redirect to Raw Materials page
        redirect('raw-materials', 'location', 301);

        $data = array(
            'title' => 'Custom Blends - Perfume Ingredients',
            'description' => 'We create each of our perfume blends to be played with, manipulated, and combined. Join Scent Market today and use our blends to make your own custom perfume.',
            'blends' => $this->blends_model->get_blends(),
            'faves' => $this->account_model->get_fave_blend_by_id()
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('blends/index', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function view($slug)
    {
        $data['blend'] = $this->blends_model->get_blends($slug);
        $data['favorite'] = $this->blends_model->is_favorite($slug);

        if (empty($data['blend']))
        {
            show_404();
        }

        $name = $data['blend']['name'];
        $data['title'] = $name;
        $data['blends'] = $this->blends_model->get_other_blends($name);

        $this->load->view('templates/header', $data);
        $this->load->view('blends/view', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('family', 'Family', 'required');
        $this->form_validation->set_rules('raw_materials', 'Raw Materials', 'required');
        $this->form_validation->set_rules('notes', 'Notes', 'required');
        $this->form_validation->set_rules('rec_combos', 'Recommended Combos');
        $this->form_validation->set_rules('tip1', 'Tip 1');
        $this->form_validation->set_rules('tip1_info', 'Tip 1 Info');
        $this->form_validation->set_rules('tip2', 'Tip 2');
        $this->form_validation->set_rules('tip2_info', 'Tip 2 Info');
        $this->form_validation->set_rules('tip3', 'Tip 3');
        $this->form_validation->set_rules('tip3_info', 'Tip 3 Info');
        $this->form_validation->set_rules('blend1', 'Blend 1');
        $this->form_validation->set_rules('blend1_slug', 'Blend 1 slug');
        $this->form_validation->set_rules('blend2', 'Blend 2');
        $this->form_validation->set_rules('blend2_slug', 'Blend 2 slug');
        $this->form_validation->set_rules('blend3', 'Blend 3');
        $this->form_validation->set_rules('blend3_slug', 'Blend 3 slug');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('blends/add');

        }
        else
        {
            $this->blends_model->set_blend();
            redirect('blends');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        if (isset($_POST['edit_blend']))
        {
            $this->blends_model->edit_blend($id);
            redirect('blends');
        }
    }

}