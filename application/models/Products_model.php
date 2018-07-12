<?php

class Products_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('url');
    }
    
    function get_all()
    {
        $results = $this->db->get('products')->result();
        
        foreach ($results as &$result) 
        {
            /*
            if ($result->option_values)
            {
                $result->option_values = explode(',',$result->option_values);
            }
            */
            if ($result->option_value)
            {
                $result->option_value = explode(',',$result->option_value);
            }
        }
        
        return $results;
    }
    
    function get($id)
    {
        $results = $this->db->get_where('products', array('id' => $id)) -> result();
        $result = $results[0];
        
        /*
        if ($result->option_values)
        {
            $result->option_values = explode(',',$result->option_values);
        }
        */
        if ($result->option_value)
        {
            $result->option_value = explode(',',$result->option_value);
        }
        
        return $result;
    }
    
    
    function create_order($billArray,$shipArray,$orderid)
    {
    	$date = date ("F d, Y");
        $time = date ("H:i:s");
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        // Combine all shipping address data into one field
        $ship = $shipArray['firstName'].' '.$shipArray['lastName'].' '.$shipArray['add1'].' '.$shipArray['add2'].' '.$shipArray['city'].' '.$shipArray['state'].' '.$shipArray['zip'].' '.$shipArray['phone'];
        
        // Combine all billing address data into one field
        $bill = $billArray['firstName'].' '.$billArray['lastName'].' '.$billArray['add1'].' '.$billArray['add2'].' '.$billArray['city'].' '.$billArray['state'].' '.$billArray['zip'].' '.$billArray['phone'];

        $cart = serialize($this->cart->contents());
        
        $data = array(
            'user_id' => $user_id,
            'order_id' => $orderid,
            'date' => $date,
            'time' => $time,
            'ship_address' => $ship,
            'bill_address' => $bill,
            'email' => $billArray['email'],
            'cart' => $cart,
            'total' => $this->cart->total(),
            'status' => '0'
        );
        
        $this->db->insert('orders', $data);
    }
    
    function get_order_history_by_id()
    {
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id;
        
        $this->db->order_by('id', 'desc');
        $query = $this->db->get_where('orders', array('user_id' => $user_id));
        return $query->result_array();
    }

}