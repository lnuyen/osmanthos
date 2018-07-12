<?php

class Lab_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function create_formula()
    {
        $date = date ("F d, Y");
        $time = date ("H:i:s");
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        $data = array(
            'user_id' => $user_id,
            'f_name' => $this->input->post('f_name'),
            'date_created' => $date,
            'time_created' => $time,
            'rm1' => $this->input->post('rm1'),
            'drops1' => $this->input->post('drops1'),
            'percent1' => $this->input->post('percent1'),
            'rm2' => $this->input->post('rm2'),
            'drops2' => $this->input->post('drops2'),
            'percent2' => $this->input->post('percent2'),
            'rm3' => $this->input->post('rm3'),
            'drops3' => $this->input->post('drops3'),
            'percent3' => $this->input->post('percent3'),
            'rm4' => $this->input->post('rm4'),
            'drops4' => $this->input->post('drops4'),
            'percent4' => $this->input->post('percent4'),
            'rm5' => $this->input->post('rm5'),
            'drops5' => $this->input->post('drops5'),
            'percent5' => $this->input->post('percent5'),
            'rm6' => $this->input->post('rm6'),
            'drops6' => $this->input->post('drops6'),
            'percent6' => $this->input->post('percent6'),
            'rm7' => $this->input->post('rm7'),
            'drops7' => $this->input->post('drops7'),
            'percent7' => $this->input->post('percent7'),
            'rm8' => $this->input->post('rm8'),
            'drops8' => $this->input->post('drops8'),
            'percent8' => $this->input->post('percent8'),
            'rm9' => $this->input->post('rm9'),
            'drops9' => $this->input->post('drops9'),
            'percent9' => $this->input->post('percent9'),
            'rm10' => $this->input->post('rm10'),
            'drops10' => $this->input->post('drops10'),
            'percent10' => $this->input->post('percent10'),
            'rm11' => $this->input->post('rm11'),
            'drops11' => $this->input->post('drops11'),
            'percent11' => $this->input->post('percent11'),
            'rm12' => $this->input->post('rm12'),
            'drops12' => $this->input->post('drops12'),
            'percent12' => $this->input->post('percent12')
        );
        
        $this->db->insert('formulas', $data); //insert formula into db

        $id = $this->db->insert_id();
        return $id;
    }
    
    public function get_formulas()
    {
        $this->db->order_by('formula_id', 'desc');
        $query = $this->db->get('formulas');
        return $query->result_array();
    }
}