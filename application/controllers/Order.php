<?php

class Order extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }
    
    function add()
    {
        $product = $this->products_model->get($this->input->post('id'));
        
        $insert = array (
            'id' => $this->input->post('id'),
            'qty' => 1,
            'price' => $product->price,
            'name' => $product->name
        );
        
        if ($product->option_name) {
            
            if ($this->input->post('option_name'))
            {
                $name = array (
                    $product->option_name => $this->input->post('option_name')
                );
            }
            else
            {
                /*
                $name = array (
                    $product->option_name => $product->option_values[$this->input->post($product->option_name)]
                );
                */
                $name = array (
                    $product->option_name => $product->option_value[$this->input->post($product->option_name)]
                );
            }
        }
        
        $id = array('item_id'=>$this->input->post('item_id'));
        
        $insert['options'] = array_merge($name, $id); 
        
        $this->cart->insert($insert);
        
        $cart = $this->cart->total_items();
        echo json_encode( array('status' => 'true', 'cart' => $cart) ); //test    
        //redirect('checkout/cart');
    }
    
    function remove($rowid)
    {
        $data = array (
            'rowid' => $rowid,
            'qty' => 0
        );
        
        $this->cart->update($data);
        
        redirect('checkout/cart');
    }

    function update(){

        $rowId  = $this->input->post('id');
        $amount = $this->input->post('amount');
        $item   = $this->cart->get_item($rowId);
        $qty    = $item['qty'];
        $newQty = $qty + $amount;

        $data = array (
            'rowid' => $rowId,
            'qty' => $newQty
        );

        $this->cart->update($data);

        $updatedItem        = $this->cart->get_item($rowId);
        $updatedCartTotal   = $this->cart->total();

        echo json_encode( array( 'item' => $updatedItem, 'cartTotal' => $updatedCartTotal ) );

    }
    
    function create_order()
    {
    	$this->products_model->create_order();
    }
    
}