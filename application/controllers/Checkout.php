<?php

class Checkout extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
        $this->load->model('products_model');
        $this->load->library('email');
        //force_ssl();
    }
    
    public function index()
    {
        $data['title'] = 'Checkout';
        
        $this->load->view('templates/header', $data);
        $this->load->view('checkout/index');
        $this->load->view('templates/footer');
        
    }
    
    function cart()
    {
        $data['products'] = $this->products_model->get_all();
        $data['title'] = 'Shopping Cart';

        $this->load->view('templates/header', $data);
        $this->load->view('checkout/cart', $data);
        $this->load->view('templates/footer');
    }
    
    function total()
    {
        echo 'Cart Total';
        echo $this->cart->total();
    }
    
    function destroy()
    {
        $this->cart->destroy();
        echo 'destroy() called';
    }
    
    function charge()
    {
        require_once( '../application/config/stripe.php');

        // This worked! but what to do if customer is not logged in...

        // Check if customer exists in the database
        $isCustomer = $this->customers_model->get_customer_by_id();

        // If customer does not exist, create new customer
        if( empty($isCustomer) ) {

            $token  = $_POST['stripeToken'];

            $customer = Stripe_Customer::create(array(
                'email' => $_POST['email'],
                'card'  => $token
            ));

            $customer_id = $customer->id;
            $this->customers_model->create_customer($customer_id);

        } else { // If customer exists, retrieve Stripe ID and do not create new customer

            $customer_id = $isCustomer->stripe_id;
        }

        // Process the payment
        $charge = Stripe_Charge::create(array(
            //'customer' => $customer->id,
            'customer' => $customer_id,
            'amount'   => $this->cart->total()*100,
            'currency' => 'usd'
        ));
        
        // Generate unique order id
        $date = date('m');
        $minute = date('i');
        $hour = date('H');
        $user = $this->ion_auth->user()->row();
        $user_id = $user->id; 
        $orderid = $date.$minute.$user_id.$hour;

        // Add order info to database...
        $billArray = array(
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'add1' => $_POST['add1'],
                'add2' => $_POST['add2'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'zip' => $_POST['zip'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email']
        );

        $shipArray = array(
                'firstName' => $_POST['firstNameS'], 
                'lastName' => $_POST['lastNameS'],
                'add1' => $_POST['add1S'],
                'add2' => $_POST['add2S'],
                'city' => $_POST['cityS'],
                'state' => $_POST['stateS'],
                'zip' => $_POST['zipS'],
                'phone' => $_POST['phoneS']
        );

        $this->products_model->create_order($billArray,$shipArray,$orderid);

        // Send Confirmation Email
        $data = array(
                'ship' => $shipArray,
                'bill' => $billArray,
                'price' => $this->cart->total(),
                'cart' => $this->cart->contents(),
                'order_id' => $orderid,
                'email' => $_POST['email']
        );

        // Confirmation Email Template
        $html_email = $this->load->view('email/order-confirmation', $data, true);

        $this->email->from('hello@thescentmarket.com', 'Scent Market Customer Service');
        $this->email->to($_POST['email']); 
        $this->email->bcc('hello@thescentmarket.com'); 

        $this->email->subject('Order Confirmation');
        $this->email->message($html_email);	

        $this->email->send();
        
        // Destroy cart
        $this->cart->destroy();
        $this->confirmation($data);
        
    }
    
    function confirmation ($info)
    {
        $data['title'] = 'Order Confirmation';
        $data['info'] = $info;
        
        $this->load->view('templates/header', $data);
        $this->load->view('checkout/confirmation', $data);
        $this->load->view('templates/footer');
    }
    
    function show()
    {
        $cart = $this->cart->contents();
        echo "<pre>";
        print_r($cart);
    }

}