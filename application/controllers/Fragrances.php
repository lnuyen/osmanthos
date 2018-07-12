<?php
class Fragrances extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fragrances_model');
        $this->load->model('account_model');
        //remove_ssl();
    }

    public function index()
    {

        // redirect to Raw Materials page
        redirect('scent-101', 'location', 301);

        $data = array(
            'title' => 'Fragrance Finder - Explore Classic and Popular Perfumes',
            'description' => 'A database of classic and popular perfumes where you can find inspiration and explore the ingredients in your favorite fragrances.',
            'fragrances' => $this->fragrances_model->get_frags(),
            'brands' => $this->fragrances_model->get_frag_brands(),
            'families' => $this->fragrances_model->get_frag_families(),
            'faves' => $this->account_model->get_fave_frag_by_id()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('fragrances/index', $data);
        $this->load->view('templates/footer');
        
    }

    public function view($slug)
    {
        $data['fragrance'] = $this->fragrances_model->get_frags($slug);
        $data['favorite'] = $this->fragrances_model->is_favorite($slug);

        if (empty($data['fragrance']))
        {
            show_404();
        }

        $name = $data['fragrance']['name'];
        $data['title'] = $name.' by '.$data['fragrance']['brand'].' - Fragrance Finder';
        $data['description'] = 'Learn more about the scent and characteristics of '.$name.' by '.$data['fragrance']['brand'];

        // get similar fragrances
        $family = $data['fragrance']['family'];
        $data['fragrances'] = $this->fragrances_model->get_frags_similar($family, $name);

        $this->load->view('templates/header', $data);
        $this->load->view('fragrances/view', $data);
        $this->load->view('templates/footer');

    }

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add new fragrance';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('family', 'Family');
        $this->form_validation->set_rules('price', 'Price');
        $this->form_validation->set_rules('mainIngredients', 'Main Ingredients');
        $this->form_validation->set_rules('notes', 'Notes');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('fragrances/add');

        }
        else
        {
            $this->fragrances_model->set_frags();
            redirect('fragrances');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');

        if (isset($_POST['edit_frags']))
        {
            $this->fragrances_model->edit_frags($id);
            redirect('fragrances');
        }
    }

}