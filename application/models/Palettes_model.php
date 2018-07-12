<?php

class Palettes_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function create_palette()
    {
        $date = date ("F d, Y");
        $time = date ("H:i:s");
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        $data = array(
            'user_id' => $user_id,
            'date_created' => $date,
            'time_created' => $time,
            'rm1' => $this->input->post('choose1'),
            'rm2' => $this->input->post('choose2'),
            'rm3' => $this->input->post('choose3'),
            'rm4' => $this->input->post('choose4'),
            'rm5' => $this->input->post('choose5'),
            'rm6' => $this->input->post('choose6'),
            'rm7' => $this->input->post('choose7'),
            'rm8' => $this->input->post('choose8'),
            'rm9' => $this->input->post('choose9'),
            'rm10' => $this->input->post('choose10')
        );
        
        $this->db->insert('palettes', $data); //insert palette into db
        $id = $this->db->insert_id();
        return $id;
    }

    public function get_palette($id = FALSE)
    {
        if ($id === FALSE)
        {
            $this->db->order_by("palette_id", "asc");
            $query = $this->db->get('palettes');
            return $query->result_array();
        }

        $query = $this->db->get_where('palettes', array('palette_id' => $id));
        return $query->row_array();
    }
   
}