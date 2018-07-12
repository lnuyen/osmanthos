<?php
class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->model('products_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache"); 
    }
    
    public function index()
    {
    	//remove_ssl();
        if (!$this->ion_auth->logged_in()) //redirect logged out users to sign in, except for home page
        {
            redirect('/auth/login');
        }
        
        $data['title'] = 'My Collection';        
        $this->load->view('templates/header', $data);
        $this->load->view('account/index', $data);
        $this->load->view('templates/footer');
    }

    public function mods($message="")
    {
        if (!$this->ion_auth->logged_in()) //redirect logged out users to sign in, except for home page
        {
            redirect('/auth/login');
        }
        
        $data = array(
            'title' => 'My Mods',
            'message' => $message,
            'mods' => $this->account_model->get_mods_by_id(),
            'faves' => $this->account_model->get_fave_mods_by_id(),
            'template' => 'account-mods',
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('account/mods', $data);
        $this->load->view('templates/footer');
    }
    
    public function sets($message = "")
    {   
        if (!$this->ion_auth->logged_in()) //redirect logged out users to sign in, except for home page
        {
            redirect('/auth/login');
        }
        
        $data = array (
            'sets' => $this->account_model->get_sets_by_id(),
            'title' => 'My Sets',
            'message' => $message,
            'mods' => $this->account_model->get_mods_by_id()
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('account/sets', $data);
        $this->load->view('templates/footer');
    }
    
    public function fragrances()
    {
        if (!$this->ion_auth->logged_in()) //redirect logged out users to sign in, except for home page
        {
            redirect('/auth/login');
        }
        
        $data['fragrances'] = $this->account_model->get_fragrances_fs_by_id();
        $data['mods'] = $this->account_model->get_mods_by_id();
        $data['title'] = 'My Fragrances';
        
        $this->load->view('templates/header', $data);
        $this->load->view('account/fragrances', $data);
        $this->load->view('templates/footer');
    }
    
    //get member's order history
    function orders()
    {
        $data['orders'] = $this->products_model->get_order_history_by_id();
        $data['title'] = 'My Order History';
        
        $this->load->view('templates/header', $data);
        $this->load->view('account/orders', $data);
        $this->load->view('templates/footer');
    }
    
    // ADD rm to favorites
    public function favorite()
    {
        $this->form_validation->set_rules('name', 'Name','required');
        $this->form_validation->set_rules('slug', 'Slug','required');

        if ($this->form_validation->run() === FALSE || !$this->ion_auth->logged_in())
        {
            echo json_encode('false');

        }
        else
        {
            $this->account_model->add_fave_rm();
            echo json_encode('true');
        }
    }
    
    // ADD frag to favorites
    public function favorite_frag()
    {
        $this->form_validation->set_rules('name', 'Name','required');
        $this->form_validation->set_rules('slug', 'Slug','required');

        if ($this->form_validation->run() === FALSE || !$this->ion_auth->logged_in())
        {
            echo json_encode('false');

        }
        else
        {
            $this->account_model->add_fave_frag();
            echo json_encode('true');
        }
    }
    
    // ADD mod to favorites
    public function favorite_mod()
    {
        $this->form_validation->set_rules('formula_id', 'Formula ID','required');
        $this->form_validation->set_rules('formula_name', 'Formula Name','required');

        if ($this->form_validation->run() === FALSE || !$this->ion_auth->logged_in())
        {
            echo json_encode('false');
        }
        else
        {
            $this->account_model->add_fave_mod();
            echo json_encode('true');
        }
    }

    // ADD blend to favorites
    public function favorite_blend()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');

        if ($this->form_validation->run() === FALSE || !$this->ion_auth->logged_in())
        {
            echo json_encode('false');

        }
        else
        {
            $this->account_model->add_fave_blend();
            echo json_encode('true');
        }
    }
    
    public function create_set()
    {
        $formulas = array_map('intval', ($this->input->post('formula')));
        $count = count($formulas);

        $this->form_validation->set_rules('t_name', 'Name', 'required');
        $this->form_validation->set_rules('formula1_id', 'Mod 1');
        $this->form_validation->set_rules('formula2_id', 'Mod 2');
        $this->form_validation->set_rules('formula3_id', 'Mod 3');

        if ( empty($formulas) || $count != 3)
        {
            echo json_encode('false materials');
        }
        elseif ($this->form_validation->run() === FALSE )
        {
            echo json_encode('false no name');
        }
        else
        {
           $data['set_name'] = $this->account_model->check_set_name(); 

           if ( !empty($data['set_name']) ) //name has already been used
           {
               echo json_encode('false repeat name');
           }
           else
           {
               $this->account_model->create_set(); //name is unique -> success!
               echo json_encode('success');
           }            
        }
    }

    public function check_mod_name()
    {
        $data['mod_name'] = $this->account_model->check_mod_name(); 

       if ( !empty($data['mod_name']) ) //name has already been used
       {
           echo json_encode('false repeat name');
       }
       else
       {
           echo json_encode('success');
       }
    }
    
    public function create_fragrance()
    {
        $this->form_validation->set_rules('formula_id', 'Formula ID', 'required'); // third attribute is required ! OMFG
        $this->form_validation->set_rules('full-size-name', 'Fragrance Name', 'required'); // third attribute is required ! OMFG
        // $this->form_validation->set_rules('full-size-your-name', 'Your Name');
        // $this->form_validation->set_rules('font', 'Font');
        
        if ($this->form_validation->run() === FALSE || !$this->ion_auth->logged_in()) //redirect logged out users to sign in 
        { 
           $this->fragrances();
        }
        else
        {
           $this->account_model->create_fragrance_fullsize(); //name is unique -> success!
           redirect('account/fragrances');           
        }
    }
    
    public function view($id)
    {
        if ( !$this->ion_auth->logged_in() ) //redirect logged out users
        {
            redirect('/auth/login');
        }
        
        $data['mod'] = $this->account_model->get_mods_by_id($id);
        $data['favorite'] = $this->account_model->is_favorite_mod($id);
        $data['uri'] = $this->uri->segment(2,0);

        if ( empty($data['mod']) || $data['uri'] === 0 )
        {
            show_404();
        }

        $name = $data['mod']['f_name'];
        $data['title'] = ucwords($name.' - My Formulas');

        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        if ( $data['uri'] === 'mods' )
        {
            if ( $data['mod']['user_id'] === $user_id || $this->ion_auth->is_admin() )
            {
                $this->load->view('templates/header', $data);
                $this->load->view('account/view', $data);
                $this->load->view('templates/footer');
            }
            else {
                show_404();
            }
        }
        else {
            $this->load->view('account/view', $data);
        }
    }

    public function is_favorite_mod($id)
    {
        $data['favorite'] = $this->account_model->is_favorite_mod($id);

        if (!isset($data['favorite']['formula_name'])) {
            echo json_encode('not_fave');
        } else {
            echo json_encode('is_fave');
        }
    }

    public function mod_notes()
    {
        $this->form_validation->set_rules('notes', 'notes', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');
        
        if ($this->form_validation->run() === FALSE )
        {
            echo json_encode('false');
        }
        else
        {
            $this->account_model->update_mod_notes();
            echo json_encode('true');   
        }
    }
    
}