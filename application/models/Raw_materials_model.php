<?php

class Raw_materials_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_rm($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->order_by("name", "asc");
            $query = $this->db->get('raw_materials');
            return $query->result_array();
        }

        $query = $this->db->get_where('raw_materials', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_rms_similar($family, $name)
    {
        $this->db->limit(100)->order_by("name","random");
        $query = $this->db->get_where('raw_materials', array('name !=' => $name,'family' => $family) );
        return $query->result_array();
    }
    
    public function get_rm_families()
    {
        $this->db->order_by("family", "asc")->select('family')->distinct();
        $query = $this->db->get('raw_materials');
        return $query->result_array();
    }

    public function get_rm_types()
    {
        $this->db->order_by("type", "asc")->select('type')->distinct();
        $query = $this->db->get('raw_materials');
        return $query->result_array();
    }
    
    public function set_rm()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('name'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'slug' => $slug,
            'scent' => $this->input->post('scent'),
            'family' => $this->input->post('family'),
            'tmd' => $this->input->post('tmd'),
            'type' => $this->input->post('type'),
            'price' => $this->input->post('price'),
            'perfumes' => $this->input->post('perfumes'),
            'pairswith' => $this->input->post('pairswith'),
            'notes' => $this->input->post('notes')
        );

        return $this->db->insert('raw_materials', $data);
    }

    public function edit_rm($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'scent' => $this->input->post('scent'),
            'family' => $this->input->post('family'),
            'tmd' => $this->input->post('tmd'),
            'type' => $this->input->post('type'),
            'price' => $this->input->post('price'),
            'perfumes' => $this->input->post('perfumes'),
            'pairswith' => $this->input->post('pairswith'),
            'notes' => $this->input->post('notes')
        );

        $this->db->where('id', $id);
        $this->db->update('raw_materials', $data);

    }

    public function is_favorite($slug)
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $query = $this->db->get_where('faves',array('user_id' => $user_id, 'slug' => $slug));
        
        if ($query->num_rows() > 0)
        {
           return $query->row_array();
        }
    }

}
