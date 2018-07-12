<?php

class Customers_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    function create_customer($customer_id) {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        $data = array(
                'user_id' => $user_id,
                'stripe_id' => $customer_id
            );

        $this->db->insert('customers_stripe', $data);
    }
    
    function get_customer_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;

        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where('customers_stripe', array('user_id' => $user_id));
        return $query->row();
    }
}