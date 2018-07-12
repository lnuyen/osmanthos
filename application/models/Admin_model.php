<?php

class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    function get_formulas()
    {
        $this->db->order_by('formula_id', 'desc');
        $query = $this->db->get('formulas');
        return $query->result_array();
    }
    
    function get_orders()
    {
    	$this->db->order_by('id','desc');
    	$query = $this->db->get('orders');
    	return $query->result_array();
    }
    
    function get_lab_records()
    {
        $this->db->order_by('id','desc');
    	$query = $this->db->get('lab_record');
    	return $query->result_array();
    }
    
    function create_lab_record()
    {
        
        $data = array(
            'user_id' => $this->tank_auth->get_user_id(),
            'formula_id' => $this->input->post('formula_id'),
            'formula_name' => $this->input->post('f_name'),
            'date_created' => date ("F d, Y"),
            'time_created' => date ("H:i:s")
        );
        
        $this->db->insert('lab_record',$data);
    }
    
    function update_lab_record_notes()
    {
        $id = $this->input->post('id');
        $data = array(
            'admin_notes' => $this->input->post('admin_notes') 
        );
        
        $this->db->where('id', $id);
        $this->db->update('lab_record', $data);
    }
}