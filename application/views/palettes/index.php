           
            <div class="paletteswrapper">

            	<div class="col-xs-12 title-hero icy-bg">
	            	<h1 class="page-title">Palettes</h1>
	            	<div class="directory-details">
	            		<h2>Sample ten blends and/or raw materials from our collection.<br/>
	            			<small>$20. 1 ml glass screw top vials **DILUTED**</small>
	            		</h2>
	            	</div>
                </div>
                
                <div class="palette-info hide" id="floral">
	                <h2>Floral Palette</h2>
	                <p>In perfumery, flowers are king. Nearly every fragrance contains a floral raw material, and floral bouquets are at the heart of many. The floral palette contains ten different floral raw materials. Learn the difference between rose essence and absolute, familiarize yourself with the ever popular jasmine, and get to know the complex scent of osmanthus. Each flower has a unique character, and there's no limit to the number of possible combinations when adding floral notes to your fragrance.</p>
	                <a href="<?php echo base_url('ingredients/geranium'); ?>">geranium</a><br />
	                <a href="<?php echo base_url('ingredients/iris'); ?>">iris</a><br />
	                <a href="<?php echo base_url('ingredients/jasmine-absolute'); ?>">jasmine absolute</a><br />
	                <a href="<?php echo base_url('ingredients/neroli'); ?>">neroli</a><br />
	                <a href="<?php echo base_url('ingredients/osmanthus'); ?>">osmanthus</a><br />
	                <a href="<?php echo base_url('ingredients/orange-flower-absolute'); ?>">orange flower absolute</a><br />
	                <a href="<?php echo base_url('ingredients/rose-absolute'); ?>">rose absolute</a><br />
	                <a href="<?php echo base_url('ingredients/rose-essence'); ?>">rose essence</a><br />
	                <a href="<?php echo base_url('ingredients/tuberose'); ?>">tuberose</a><br />
	                <a href="<?php echo base_url('ingredients/ylang-ylang'); ?>">ylang ylang</a><br /><br />
	                <h3>$10</h3>
	                <?php //if($this->tank_auth->get_user_id() == 1): ?>
	                <?php $attribute = array('id' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                        <?php echo form_hidden('id','2'); ?>
                        <?php echo form_hidden('option_name','Floral'); ?>
                        <?php echo form_submit(array(
                                'name' => 'action',
                                'value' => 'Add To Cart',
                                'class' => 'order-palette'
                            )); ?>
                        <?php echo form_close(); ?>
	                <?php //endif; ?>
                </div>

                <div class="palette-info hide" id="top">
	                <h2>Top Notes Palette</h2>
	                <p>Top notes are the sparkling introduction to a perfume and this palette highlights the most popular top notes in perfumery. Smell the difference between popular citrus materials like lemon and bergamot, mandarin and orange, and familiarize yourself with materials from the aromatic/herbal family like thyme, lavender, and clary sage. This palette also includes green notes like galbanum and violet leaves, that can add a wonderful, fresh facet to your fragrance.</p>
	                <a href="<?php echo base_url('ingredients/artemisia'); ?>">artemisia</a><br />
	                <a href="<?php echo base_url('ingredients/clary-sage'); ?>">clary sage</a><br />
	                <a href="<?php echo base_url('ingredients/lavender'); ?>">lavender</a><br />
	                <a href="<?php echo base_url('ingredients/thyme'); ?>">thyme</a><br />
	                <a href="<?php echo base_url('ingredients/bergamot'); ?>">bergamot</a><br />
	                <a href="<?php echo base_url('ingredients/lemon'); ?>">lemon</a><br />
	                <a href="<?php echo base_url('ingredients/mandarin'); ?>">mandarin</a><br />
	                <a href="<?php echo base_url('ingredients/orange'); ?>">orange</a><br />
	                <a href="<?php echo base_url('ingredients/galbanum'); ?>">galbanum</a><br />
	                <a href="<?php echo base_url('ingredients/violet-leaves'); ?>">violet leaves</a><br /><br />
	                <h3>$10</h3>
	                <?php //if($this->tank_auth->get_user_id() == 1): ?>
	                <?php $attribute = array('id' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                        <?php echo form_hidden('id','3'); ?>
                        <?php echo form_hidden('option_name','Top'); ?>
                        <?php echo form_submit(array(
                                'name' => 'action',
                                'value' => 'Add To Cart',
                                'class' => 'order-palette'
                            )); ?>
                        <?php echo form_close(); ?>
	                <?php //endif; ?>
                </div>

                <div class="palette-info hide" id="base">
	                <h2>Base Notes Palette</h2>
	                <p>In addition to the impact that base notes have on the scent of your fragrance, they also have important fixative properties that hold a fragrance together and increase its longevity. This palette contains popular woody raw materials like creamy sandalwood, earthy vetiver, and smoky guaiac wood. Find out what the balsamic family is all about with benzoin and vanilla absolute, and get to know musk, a popular raw material that contributes warmth and sensuality. Lastly, the palette includes labdanum and tonka beans from the amber and tobacco families.</p>
	                <a href="<?php echo base_url('ingredients/labdanum'); ?>">labdanum</a><br />
	                <a href="<?php echo base_url('ingredients/benzoin'); ?>">benzoin</a><br />
	                <a href="<?php echo base_url('ingredients/vanilla-absolute'); ?>">vanilla absolute</a><br />
	                <a href="<?php echo base_url('ingredients/musk'); ?>">musk</a><br />
	                <a href="<?php echo base_url('ingredients/tonka-beans'); ?>">tonka beans</a><br />
	                <a href="<?php echo base_url('ingredients/cedarwood'); ?>">cedarwood</a><br />
	                <a href="<?php echo base_url('ingredients/guaiac-wood'); ?>">guaiac wood</a><br />
	                <a href="<?php echo base_url('ingredients/oakmoss'); ?>">oakmoss</a><br />
	                <a href="<?php echo base_url('ingredients/patchouli'); ?>">patchouli</a><br />
	                <a href="<?php echo base_url('ingredients/sandalwood'); ?>">sandalwood</a><br />
	                <a href="<?php echo base_url('ingredients/vetiver'); ?>">vetiver</a><br /><br />
	                <h3>$10</h3>
	                <?php //if($this->tank_auth->get_user_id() == 1): ?>
	                <?php $attribute = array('id' => 'addtobasket'); echo form_open('order/add', $attribute); ?>
                        <?php echo form_hidden('id','4'); ?>
                        <?php echo form_hidden('option_name','Base'); ?>
                        <?php echo form_submit(array(
                                'name' => 'action',
                                'value' => 'Add To Cart',
                                'class' => 'order-palette'
                            )); ?>
                        <?php echo form_close(); ?>
	                <?php //endif; ?>
                </div>

                <div class="col-xs-12">
                	<div class="row row-fixed">
		                <div class="col-md-8 pad-80b palette-info" id="choose">
			                <p>Naturally, you may want to sample our collection of blends and raw materials before using them in your fragrance. 
		                	Order a palette to receive ten small (1 ml) samples, blotters, and helpful tips.</p>
			                <p><em>Choose ten blends and/or raw materials:</em></p>
			                <form id='your-palette' class="clearfix" method="post">
			                	<div class="row">
		           	 				<div class="alert text-center"></div>
				                	<div class="col-xs-12 col-sm-6">

				                		<?php for ($i = 1; $i <= 5; $i++): ?>

				                			<select name="<?php echo 'choose'.$i; ?>" class="form-control input-lg">
					                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
						                	    <?php foreach ($blends as $blend) 
						                        {
						                            echo '<option value="'.$blend['name'].'"'.set_select('choose'.$i, $blend['name']).'>'.$blend['name'].'</option>';
						                        }
						                        ?>
							                    <?php foreach ($raw_materials as $rm)
							                    {
							                        echo '<option value="'.$rm['name'].'"'.set_select('choose'.$i, $rm['name']).'>'.$rm['name'].'</option>';
							                    }
							                    ?>
						               	 	</select>

				                		<?php endfor; ?>
						                
					               	 </div>
					               	 <div class="col-xs-12 col-sm-6">

					               	 	<?php for ($i = 6; $i <= 10; $i++): ?>

				                			<select name="<?php echo 'choose'.$i; ?>" class="form-control input-lg">
					                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
						                	    <?php foreach ($blends as $blend) 
						                        {
						                            echo '<option value="'.$blend['name'].'"'.set_select('choose'.$i, $blend['name']).'>'.$blend['name'].'</option>';
						                        }
						                        ?>
							                    <?php foreach ($raw_materials as $rm)
							                    {
							                        echo '<option value="'.$rm['name'].'"'.set_select('choose'.$i, $rm['name']).'>'.$rm['name'].'</option>';
							                    }
							                    ?>
						               	 	</select>

				                		<?php endfor; ?>
					               	 	
					               	</div>
				               	</div>
		               	 	</form>
			                <button id="order-palette" class="btn btn-primary btn-lg">Add to Basket</button>
		                </div>

		                <div class="col-md-3 col-md-offset-1" id="palettes-sidebar">
			        		<p class="maison-mono">Raw Materials by Family</p>
			        		<h4><span>+</span> Amber</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'amber') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Aromatic/Herbal</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'aromatic/herbal') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Citrus</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'citrus') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Floral</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'floral') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Fruity</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'fruity') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Green</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'green') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Leather</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'leather') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Musk</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'musk') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Spicy</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'spicy') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Sweet</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'sweet') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        		<h4><span>+</span> Woody</h4>
			        		<ul class="list-unstyled">
			        			<?php foreach ($raw_materials as $rm)
				                    {
				                    	if ( $rm['family'] === 'woody') echo '<li>'.$rm['name'].'</li>';
				                    }
			                    ?>
			        		</ul>
			        	</div>
	                </div>
	            </div>
			</div>

            <script>
                $(document).ready(function() {
                    
                    $('.fader').hover(function() {
			   	 		$(this).find("img:last-child").fadeToggle(50,"linear");
				    });
				    
				    $('.palettes').click(function() {
				    	var $id = $(this).attr('name');
				    	$('.palette-info').hide(50);
				    	$('#'+$id).fadeIn(500);
				    });
		    
				    $('#order-palette').click(function(){
				        paletteSubmit();
				    });
                    
                    $('#addtobasket').submit(function(e){
                        
                        e.preventDefault();
                        
                        var $form = $(this);
                        var $id = $form.find( 'input[name="id"]' ).val();
                        var $option_name = $form.find( 'input[name="option_name"]' ).val();
                        var $item_id = null;
                        
                        addOrder($id, $option_name, $item_id);

                    });

                    $('#palettes-sidebar h4').click(function(){
                    	$(this).next('ul').slideToggle();
            			$(this).find('span').toggleClass('rotate-90');
                    })
                    
                });
                
            </script>