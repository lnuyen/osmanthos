<?php

class Kits_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_kit($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->order_by("id", "asc");
            $query = $this->db->get('kits');
            return $query->result_array();
        }

        $query = $this->db->get_where('kits', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_kit_rms($slug)
    {
        $this->db->limit(100)->order_by("name","random");
        $query = $this->db->get_where('raw_materials', array('kit' => $slug) );
        return $query->result_array();
    }

}
