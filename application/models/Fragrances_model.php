<?php
class Fragrances_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_frags($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->order_by("name", "asc");
            $query = $this->db->get('fragrances');
            return $query->result_array();
        }

        $query = $this->db->get_where('fragrances', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_frags_similar($family, $name)
    {
        $this->db->limit(100)->order_by("name","random");
        $query = $this->db->get_where('fragrances', array('name !=' => $name,'family' => $family) );
        return $query->result_array();
    }
    
    public function get_frag_brands()
    {
        $this->db->order_by("brand", "asc")->select('brand')->distinct();
        $query = $this->db->get('fragrances');
        
        return $query->result_array(); 
    }
    
    public function get_frag_families()
    {
        $this->db->order_by("family", "asc")->select('family')->distinct();
        $query = $this->db->get('fragrances');
        
        return $query->result_array(); 
    }

    public function set_frags()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('name'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'year' => $this->input->post('year'),
            'family' => $this->input->post('family'),
            'price' => $this->input->post('price'),
            'slug' => $slug,
            'mainIngredients' => $this->input->post('mainIngredients'),
            'notes' => $this->input->post('notes')
        );

        return $this->db->insert('fragrances', $data);
    }

    public function edit_frags($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'year' => $this->input->post('year'),
            'family' => $this->input->post('family'),
            'price' => $this->input->post('price'),
            'mainIngredients' => $this->input->post('mainIngredients'),
            'notes' => $this->input->post('notes')
        );

        $this->db->where('id', $id);
        $this->db->update('fragrances', $data);

    }
    
    public function is_favorite($slug)
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $query = $this->db->get_where('faves_frags',array('user_id' => $user_id, 'slug' => $slug));
        
        if ($query->num_rows() > 0)
        {
           return $query->row_array();
        }
    }
}