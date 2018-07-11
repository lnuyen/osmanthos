        <?php require_once( '../application/config/stripe.php'); ?>
        <script src="https://checkout.stripe.com/v2/checkout.js"></script>
        <script src="<?php echo base_url('assets/public/js/buy-controller.js'); ?>"></script>

        <div class="col-xs-12 title-hero icy-bg">
            <h1 class="page-title">Checkout</h1>
        </div>
        
        <div class="col-xs-12 pad-80">
            <div class="row row-fixed">
                <div class="col-xs-12 col-md-3" id="order-summary">
                    <div>
                        <?php if ($cart = $this->cart->contents()): ?>
                        <table>
                            <caption class="text-center">Order Summary</caption>
                            <?php foreach ($cart as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td>
                                    <?php if ($this->cart->has_options($item['rowid']))
                                    {
                                         $array = $this->cart->product_options($item['rowid']);
                                	     echo reset($array);
                                        //foreach($this->cart->product_options($item['rowid']) as $option => $value)
                                        //{echo "<em>" . $value . "</em>";}
                                    } ?>
                                </td>
                                <td>$<?php echo $item['subtotal']; ?></td>
                            </tr>
                            <?php endforeach;?>
                            <tr class="total">
                                <td colspan="2">Order Total</td>
                                <td>$<?php echo $this->cart->total(); ?></td>
                            </tr>
                        </table>
                        <?php else: ?>
                        <table>
                            <caption class="text-center">Shopping Basket</caption>
                        </table>
                        <p>There are no items in your basket.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                        
                <div class="col-xs-12 col-md-8 col-md-offset-1">
            		<form id="buy-form" method="post" action="javascript:">
                                    
                        <h4 id="shipping-details">1. Shipping Details</h4>
                        <hr>
                        <p class="message-sh coral-text"></p>
                        
                        <div id="buy-form-sh">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="first-name" spellcheck="false" value="">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="last-name" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="sh-address-line1" name="sh-address-line1" spellcheck="false">
                                <br>
                                <input type="text" class="form-control" id="sh-address-line2" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="sh-city" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <?php
                                    $states_arr = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
                                ?>
                                <?php
                                    function showOptionsDrop($array){
                                        $string = '';
                                        foreach($array as $k => $v){
                                            $string .= '<option value="'.$k.'">'.$v.'</option>'."\n";
                                        }
                                        return $string;
                                    }
                                ?>
                                <select id="sh-state" class="form-control">
                                    <option value="0">Choose a state</option>
                                    <?php echo showOptionsDrop($states_arr); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Zip</label>
                                <input type="text" class="form-control" id="sh-zip" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" id="sh-telephone" spellcheck="false">
                            </div>
                            
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="email" spellcheck="false">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="bil-as-sh" id="same" type="checkbox"> Use as billing address
                                </label>
                            </div>

                            <a href="#" id="display-bil" class="btn btn-primary">Continue</a>
                            <hr>
                        </div><!-- // #buy-form-sh -->
                        
                        <h4 id="billing-details">2. Billing Details</h4>
                        <hr>
                        <p class="message-bil coral-text"></p>
                        
                        <div id="buy-form-bil" style="display:none;">

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="bil-first-name" spellcheck="false" value="">
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="bil-last-name" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="bil-address-line1" spellcheck="false">
                                <br>
                                <input type="text" class="form-control" id="bil-address-line2" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="bil-city" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>State</label>
                                <select id="bil-state" class="form-control">
                                    <option value="0">Choose a state</option>
                                    <?php echo showOptionsDrop($states_arr); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Zip</label>
                                <input type="text" class="form-control" id="bil-zip" spellcheck="false">
                            </div>

                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" id="bil-telephone" spellcheck="false">
                            </div>

                            <input type="hidden" class="form-control" id="cart-total" name="cart-total" value="<?php echo $this->cart->total(); ?>">
                            
                            <a href="#" id="end-bil" class="btn btn-primary">Continue</a>
                            <hr>
                        </div><!-- // #buy-form-bil -->
                    </form>
                    
                    <!-- Stripe Pay Button -->
                    <form id="you-pay-now" action="checkout/charge" method="post">
                        <h4>3. Review Order &amp; Pay</h4>
                        <hr>
                        <div style="display:none;">
                            <table>
                                <tr>
                                    <td>Shipping Details</td>
                                    <td id="shipping-review"><span>Laura Nuyen</span><span>500 E 11th St</span><span>NY, NY 10009</span></td>
                                </tr>
                                <tr>
                                    <td>Billing Details</td>
                                    <td id="billing-review"><span>Laura Nuyen</span><span>500 E 11th St</span><span>NY, NY 10009</span></td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>$<?php echo $this->cart->total(); ?>.00</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$0.00</td>
                                </tr>
                                <tr>
                                    <td>Order Total</td>
                                    <td>$<?php echo $this->cart->total(); ?>.00</td>
                                </tr>
                            </table>
                            <hr>
                            <button id="payButton" class="btn btn-primary">Pay with Card</button>
                            <a href="https://stripe.com" target="blank" title="Powered by Stripe Payments" class="powered-by-stripe"><img src="<?php echo base_url('assets/public/images/checkout/powered-by-stripe.png') ?>" alt="Powered by Stripe"></a>
                        </div>

                    </form><!-- Stripe Pay Button -->

                </div>
            </div>
        </div>