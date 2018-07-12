<?php

class Account_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }
    
    public function check_set_name() // check if trial name is unique
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $name = $this->input->post('t_name');
        
        $query = $this->db->get_where('trials', array('user_id' => $user_id, 't_name' => $name));
        
        if ($query->num_rows() > 0) // name is not unique
        {
           return $query->row_array();
        }
    }

    public function check_mod_name() // check if trial name is unique
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $name = $_POST['mod_name'];
        
        $query = $this->db->get_where('formulas', array('user_id' => $user_id, 'f_name' => $name));
        
        if ($query->num_rows() > 0) // name is not unique
        {
           return $query->row_array();
        }
    }
    
    public function create_set() 
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        $name = $this->input->post('t_name');
        $date = date ("F d, Y");
        $time = date ("H:i:s");
        $formulas = array_map('intval', ($this->input->post('formula')));
        
        $data = array(
                'user_id' =>$user_id,
                'date_created' => $date,
                'time_created' => $time,
                't_name' => $name,
                'formula1_id' => $formulas[0],
                'formula2_id' => $formulas[1],
                'formula3_id' => $formulas[2]
            );
            
        return $this->db->insert('trials', $data);
    }
    
    public function create_fragrance_fullsize()
    {
        $user = $this->ion_auth->user()->row();

        $data = array(
                'user_id' => $user->id,
                'date_created' =>  date("F d, Y"),
                'time_created' => date('H:i:s'),
                'formula_id' => $this->input->post('formula_id'),
                'fragrance_name' => $this->input->post('full-size-name'),
                // 'maker_name' => $this->input->post('full-size-your-name'),
                // 'font' => $this->input->post('font')
        );
        
        $this->db->insert('fragrances_fs', $data); 
    }

    public function get_mods_by_id($id = false)
    {
        if ($id === false)
        {
	        $user = $this->ion_auth->user()->row();
            $user_id = $user->id;
	        
	        $this->db->order_by('formula_id', 'desc');
	        $query = $this->db->get_where('formulas', array('user_id' => $user_id));
	        return $query->result_array();
        }
        
        $query = $this->db->get_where('formulas', array('formula_id' => $id));
        return $query->row_array();
    }
    
    public function get_sets_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('trial_id', 'desc');
        $query = $this->db->get_where('trials', array('user_id' => $user_id));
        return $query->result_array();
    }
    
    public function get_fragrances_fs_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('fragrance_id', 'desc');
        $query = $this->db->get_where('fragrances_fs', array('user_id' => $user_id));
        return $query->result_array();
    }
    
    public function add_fave_rm()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $data = array(
            'user_id' => $user_id,
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug')
        );
        
        return $this->db->insert('faves',$data); 
        
    }
    
    public function get_fave_rm_by_id ()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('name', 'asc');
        $query = $this->db->get_where('faves', array('user_id' => $user_id));
        return $query->result_array();
    }
    
    public function add_fave_frag()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $data = array(
            'user_id' => $user_id,
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug')
        );
        
        return $this->db->insert('faves_frags',$data); 
        
    }
    
    public function get_fave_frag_by_id ()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('name', 'asc');
        $query = $this->db->get_where('faves_frags', array('user_id' => $user_id));
        return $query->result_array();
    }

    public function add_fave_blend()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $data = array(
            'user_id' => $user_id,
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug')
        );
        
        return $this->db->insert('faves_blends',$data); 
    }        

    public function get_fave_blend_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('name', 'asc');
        $query = $this->db->get_where('faves_blends', array('user_id' => $user_id));
        return $query->result_array();
    }
    
    public function add_fave_mod()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $data = array(
            'user_id' => $user_id,
            'formula_name' => $this->input->post('formula_name'),
            'formula_id' => $this->input->post('formula_id')
        );
        
        return $this->db->insert('faves_formulas',$data); 
        
    }
    
    public function get_fave_mods_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $query = $this->db->get_where('faves_formulas',array('user_id' => $user_id));
        return $query->result_array();
    }
    
    public function is_favorite_mod($id)
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $query = $this->db->get_where('faves_formulas',array('user_id' => $user_id, 'formula_id' => $id));
        
        if ($query->num_rows() > 0)
        {
           return $query->row_array();
        }
    }

    public function update_mod_notes()
    {
        $id = $this->input->post('id');

        $data = array(
            'notes' => $this->input->post('notes') 
        );
        
        $this->db->where('formula_id', $id);
        $this->db->update('formulas', $data);
    }

}