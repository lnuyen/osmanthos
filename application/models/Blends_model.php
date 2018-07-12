<?php

class Blends_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_blends($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->order_by("id", "asc");
            $query = $this->db->get('blends');
            return $query->result_array();
        }

        $query = $this->db->get_where('blends', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_other_blends($name)
    {
        $this->db->limit(4)->order_by("name","random");
        $query = $this->db->get_where('blends', array('name !=' => $name));
        return $query->result_array();
    }

    public function set_blend()
    {

        $data = array(
            'name' => $this->input->post('name'),
            'slug' => $this->input->post('slug'),
            'description' => $this->input->post('description'),
            'family' => $this->input->post('family'),
            'raw_materials' => $this->input->post('raw_materials'),
            'notes' => $this->input->post('notes'),
            'rec_combos' => $this->input->post('rec_combos'),
            'tip1' => $this->input->post('tip1'),
            'tip1_info' => $this->input->post('tip1_info'),
            'tip2' => $this->input->post('tip2'),
            'tip2_info' => $this->input->post('tip2_info'),
            'tip3' => $this->input->post('tip3'),
            'tip3_info' => $this->input->post('tip3_info'),
            'blend1' => $this->input->post('blend1'),
            'blend1_slug' => $this->input->post('blend1_slug'),
            'blend2' => $this->input->post('blend2'),
            'blend2_slug' => $this->input->post('blend2_slug'),
            'blend3' => $this->input->post('blend3'),
            'blend3_slug' => $this->input->post('blend3_slug')
        );

        return $this->db->insert('blends', $data);
    }

    public function edit_blend($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'family' => $this->input->post('family'),
            'raw_materials' => $this->input->post('raw_materials'),
            'notes' => $this->input->post('notes'),
            'rec_combos' => $this->input->post('rec_combos'),
            'tip1' => $this->input->post('tip1'),
            'tip1_info' => $this->input->post('tip1_info'),
            'tip2' => $this->input->post('tip2'),
            'tip2_info' => $this->input->post('tip2_info'),
            'tip3' => $this->input->post('tip3'),
            'tip3_info' => $this->input->post('tip3_info'),
            'blend1' => $this->input->post('blend1'),
            'blend1_slug' => $this->input->post('blend1_slug'),
            'blend2' => $this->input->post('blend2'),
            'blend2_slug' => $this->input->post('blend2_slug'),
            'blend3' => $this->input->post('blend3'),
            'blend3_slug' => $this->input->post('blend3_slug')
        );

        $this->db->where('id', $id);
        $this->db->update('blends', $data);

    }

    public function is_favorite($slug)
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $query = $this->db->get_where('faves_blends',array('user_id' => $user_id, 'slug' => $slug));
        
        if ($query->num_rows() > 0)
        {
           return $query->row_array();
        }
    }

}
