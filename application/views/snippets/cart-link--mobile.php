            <a id="cart-link" href="<?php echo base_url('checkout/cart'); ?>">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="294px" height="427.5px" viewBox="0 0 294 427.5" enable-background="new 0 0 294 427.5" xml:space="preserve">
                    <rect x="15" y="148.5" fill="#FFFFFF" stroke="#000000" stroke-width="30" stroke-miterlimit="10" width="264" height="264"></rect>
                    <path fill="none" stroke="#000000" stroke-width="30" stroke-miterlimit="10" d="M59.577,148.969C59.577,74.979,98.56,15,146.647,15
                    c48.087,0,87.07,59.979,87.07,133.969"></path>
                </svg>
                <span><?php echo $this->cart->total_items(); ?></span>
            </a>