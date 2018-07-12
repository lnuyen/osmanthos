<?php
class Lab extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('raw_materials_model');
        $this->load->model('lab_model');
        $this->load->model('account_model');
        $this->load->model('blends_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $data= array(
            'title' => 'Make Your Own Perfume — Lab',
            'description' => "Make your own perfume in the Scent Market Lab. In the lab you can browse ingredients, create new fragrances, and adjust fragrances you've already created.",
            'template' => 'lab',
            'raw_materials' => $this->raw_materials_model->get_rm(),
            'families' => $this->raw_materials_model->get_rm_families(),
        );

        if ( $this->ion_auth->logged_in() ) // show favorite raw materials for logged in users
        {
            $data['faves'] = $this->account_model->get_fave_rm_by_id();
            $data['mods']  = $this->account_model->get_mods_by_id();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('lab/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug)
    {
        $data['raw_material'] = $this->raw_materials_model->get_rm($slug);
        $data['blend'] = $this->blends_model->get_blends($slug);
        $data['favorite'] = $this->raw_materials_model->is_favorite($slug);

        $this->load->view('lab/view', $data);
    }

    public function create()
    {
        if ( !$this->ion_auth->logged_in() )
        {
            show_404();
        }

        $this->form_validation->set_rules('f_name', 'Name', 'required'); // third attribute is required ! OMFG

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $id = $this->lab_model->create_formula(); //create formula
            
            /* Uncomment to send emails when user creates their first mod

            $mods = $this->account_model->get_mods_by_id();
            $user = $this->ion_auth->user()->row();
            $user_id = $user->id;
            $user_email = $user->email;

            if (!empty($mods)) 
            {

                // Send "First Mod" Email
                $data = array('id' => $id, 'user_id' => $user_id);
                $html_email = $this->load->view('email/first_mod', $data, true);

                $this->email->from('hello@thescentmarket.com', 'Scent Market Customer Service');
                $this->email->to($user_email); 
                $this->email->bcc('hello@thescentmarket.com'); 

                $this->email->subject("Step One Complete! What's Next?");
                $this->email->message($html_email); 

                $this->email->send();
            } */
            
            redirect('account/mods');
        }
        
    }

    public function name_check($str)
    {
        if ($str == 'Name Your Formula...' || $str == '')
        {
            $this->form_validation->set_message('name_check', 'You forgot to name your formula!');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function new_mod($id)
    {

        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        $data= array(
            'raw_materials' => $this->raw_materials_model->get_rm(),
            'title' => 'Lab',
            'formula' => $this->account_model->get_mods_by_id($id),
            'faves' => $this->account_model->get_fave_rm_by_id(),
            'faves_blends' => $this->account_model->get_fave_blend_by_id(),
            'families' => $this->raw_materials_model->get_rm_families(),
            'blends' => $this->blends_model->get_blends(),
            'fullWidth' => TRUE,
            'template' => 'lab new-mod',
        );

        if ( $data['formula']['user_id'] == $user_id ) 
        {
            $this->load->view('templates/header', $data);
            $this->load->view('lab/new_mod', $data);
            $this->load->view('templates/footer');
        }
        else 
        {
            show_404(); 
        }
        
    }

}