<?php

class Snippets extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function refresh_cart()
    {
        $this->load->view('snippets/cart-link');
    }

    public function refresh_cart_mobile()
    {
        $this->load->view('snippets/cart-link--mobile');
    }

}