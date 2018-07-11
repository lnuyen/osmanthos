	<div class="admin-wrapper">

		<div class="col-md-12 text-center account-nav">
		    <a href="formulas">Formulas</a>
		    <a class="selected" href="#">Orders</a>
		    <a href="lab_records">Lab Records</a>
		</div>

		<div class="col-xs-12 title-hero invert">
            <h1 class="page-title">Admin Area : Orders</h1>
        </div>

        <div class="col-xs-12 text-center pad-80b">
	        Search by Order No.
	        <form>
	            <input type="text" id="search">
	        </form>
	    </div>

        <div class="col-xs-12 account-wrapper pad-80b">
            <div class="row row-fixed">
				<?php foreach ($orders as $order): ?>
				
				<div class="order-history col-xs-12">
					
					<div class="order-date">
						<p><small><?php echo $order['date']; ?> &mdash; <?php echo $order['time']; ?></small></p>
                        <h4>Order No. <?php echo $order['order_id']; ?></h4>
						<button class="view-order btn btn-primary">View Details</button>
					</div>

					<div class="order-details row" style="display: none;">
						<div class="col-sm-6">
							<?php $cart = unserialize($order['cart']); ?>
							<?php foreach ($cart as $item): ?>
							<?php $options = array_values($item['options']) ?>
							
							<div class="order-item">
								Item: <span><?php echo $item['name']; ?></span><br />
								ID: <span><?php echo $item['id']; ?></span><br />
								Quantity: <span><?php echo $item['qty']; ?></span><br />
								Name: <span style="text-transform:uppercase;"><?php echo array_shift($options); ?></span><br />
								Item ID: <span><?php echo $item['options']['item_id']; ?></span>
							</div>
							
							<?php endforeach; ?>
						</div>
						<div class="col-sm-6">
							<p>
	                            <strong>Order Total: </strong> <span>$<?php echo $order['total']; ?></span>
	                            <br />
	                            <strong>Order Status:</strong> <span><?php echo $order['status']; ?></span>
	                            <br />
	                            <strong>User ID:</strong> <span><?php echo $order['user_id']; ?></span>
	                            <br />
	                            <strong>Email:</strong><span><?php echo $order['email']; ?></span>
	                        </p>

	                        <p>
	                            <strong>Shipping Address</strong><br/>
	                            <span><?php echo $order['ship_address']; ?></span><br/>
	                            <br/>
	                            <strong>Billing Address</strong><br/>
	                            <span><?php echo $order['bill_address']; ?></span>
	                        </p>
						</div>
					</div>
				</div><!-- // .orders -->
				<?php endforeach; ?>
			</div>
        </div><!-- .account-wrapper -->

	</div><!-- .admin-wrapper -->
		
	<script src="<?php echo base_url('assets/public/js/jquery.quicksearch.js');?>" type="text/javascript"></script>
	<script type="text/javascript">

		$('.wrapper').addClass('admin-bg');

		$('input#search').quicksearch('div.order-history', {
	        selector: 'h4'
	    });

		$('.orders_head').click(function(){
			$(this).siblings('.order_details').slideToggle();
		})

	</script>