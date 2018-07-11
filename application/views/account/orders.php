            <div class="account-content account-orders">

                <div class="col-xs-12 title-hero icy-bg">
                    <h1 class="page-title">order history</h1>
                </div>

                <div class="col-xs-12 col-md-8 col-md-offset-2 account-wrapper pad-80b">
                    <div class="row row-fixed">

                        <?php foreach ($orders as $order): ?>
                    
                        <div class="col-xs-12 order-history">
                            <div class="order-date">
                                <p><small><?php echo $order['date']; ?></small></p>
                                <h4>Order No. <?php echo $order['order_id']; ?></h4>
                                <button class="view-order btn btn-primary">View Details</button>
                            </div>

                            <div class="order-details row" style="display:none;">

                                <div class="col-sm-6">
                                    <?php $cart = unserialize($order['cart']); ?>
                                     
                                    <?php foreach ($cart as $item): ?>
                                    <?php $options = array_values($item['options']) ?>
                                    
                                    <div class="order-item">
                                         Item: <span><?php echo $item['name']; ?></span><br />
                                         Name: <span style="text-transform:uppercase;"><?php echo array_shift($options); ?></span><br />
                                         Quantity: <span><?php echo $item['qty']; ?></span><br>
                                         Subtotal: <span>$<?php echo $item['subtotal']; ?>.00</span>
                                    </div>
                                    
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-sm-6">
                                    <p>
                                        <strong>Order Total: </strong> <span>$<?php echo $order['total']; ?></span>
                                        <br />
                                        <strong>Order Status:</strong> <span><?php echo $order['status']; ?></span>
                                    </p>

                                    <p>
                                        <strong>Shipping Address</strong><br/>
                                        <span><?php echo $order['ship_address']; ?></span><br/>
                                        <br/>
                                        <strong>Billing Address</strong><br/>
                                        <span><?php echo $order['bill_address']; ?></span>
                                    </p>
                                </div>

                            </div> <!-- .order-details -->

                        </div> <!-- .order-history -->
                    
                        <?php endforeach; ?>

                    </div>
                </div><!-- .account-wrapper -->

            </div>