            <div id="shopping-cart" class="clearfix">
                <div class="col-xs-12 title-hero icy-bg">
                    <h1 class="page-title">Shopping Basket</h1>
                </div>

                <div class="col-xs-12">
                    <div class="row row-fixed">
                        <div class="col-md-12 pad-80t">
                            <table>
                                
                                <?php if ($cart = $this->cart->contents()): ?>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cart as $item): ?>
                                <tr class="item" data-product-id="<?php echo $item['rowid']; ?>">
                                    <td><img src="<?php echo base_url('assets/public/images/products/'.$item['id'].'.jpg'); ?>" height="50" width="50" /></td>
                                    <td>
                                        <strong><?php echo $item['name']; ?></strong><br/>
                                        <?php if ($this->cart->has_options($item['rowid']))
                                        {
                                            $array = $this->cart->product_options($item['rowid']);
                                            
                                            if ( $item['name'] == 'Palette' ) { ?>
                                                <a class="cart-lightbox various fancybox.ajax details" href="<?php echo base_url('palettes/'.next($array)); ?>"><?php echo reset($array) ?></a>
                                            <?php } elseif ( $item['name'] == 'Sample' ) { ?>
                                                <a class="cart-lightbox various fancybox.ajax details" href="<?php echo base_url('account/'.next($array).'/lightbox'); ?>"><?php echo reset($array) ?></a>
                                            <?php } else {
                                                echo reset($array);
                                            }
                                            //foreach($this->cart->product_options($item['rowid']) as $option => $value)
                                            //{echo "<em>" . $value[0] . "</em>";}
                                        } ?>
                                    </td>
                                    <td><a class="qty-minus">-</a><span class="qty"><?php echo $item['qty']; ?></span><a class="qty-plus">+</a></td>
                                    <td>$<span class="subtotal"><?php echo $item['subtotal']; ?></span>.00</td>
                                    <td class="remove">
                                        <i class="remove-product icon icon-trash-o" data-url='<?php echo base_url('order/remove/'.$item['rowid']); ?>'></i>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <tr class="subtotal">
                                    <td></td>
                                    <td>Subtotal</td>
                                    <td></td>
                                    <td>$<span class="cart-total"><?php echo $this->cart->total(); ?></span>.00</td>
                                    <td></td>
                                </tr>
                                <tr class="shipping">
                                    <td></td>
                                    <td>Shipping</td>
                                    <td></td>
                                    <?php 

                                    $cartTotal = $this->cart->total();
                                    $shipping;

                                    if( $cartTotal >= 30 ) {
                                        $shipping = 0;
                                    } else {
                                        $shipping = 5;
                                    }

                                    ?>
                                    <td>$<span class="shipping"><?php echo $shipping; ?></span>.00</td>
                                    <td></td>
                                </tr>
                                <tr class="total">
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td></td>
                                    <td><strong>$<span class="cart-total"><?php echo $this->cart->total(); ?></span>.00</strong></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            <?php else: ?>
                                <p class="text-center">Your shopping basket is empty. <a href="<?php echo base_url('scent-kits'); ?>">Time to get busy!</a></p>    
                            <?php endif; ?>
                            </table>
                        </div>

                        <div class="col-md-12 text-right pad-80b">
                            <?php if ($cart = $this->cart->contents()): ?>
                            <?php echo anchor('checkout','Checkout','class="btn btn-primary btn-lg"'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>      

            <script type="text/javascript">
                $('.remove-product').click(function(){
                    var url = $(this).data('url');
                    window.location.href = url;
                })

                $('.qty-minus').click(function(){
                    var el = $(this);
                    var id = el.parents('tr').data('product-id');
                    var qty = el.siblings('.qty').text();

                    if ( qty > 1 ) {
                        updateQty(id, -1, el);
                    } else {
                        return;
                    }
                    
                })

                $('.qty-plus').click(function(){
                    var el = $(this);
                    var id = el.parents('tr').data('product-id');
                    updateQty(id, +1, el);
                })
            </script>