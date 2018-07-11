           
            <div class="paletteswrapper">
            	<h1 class="page-title">Palettes</h1>
            	<div class="directory-details">
            		<h2>Sample ten blends and/or raw materials from our collection.<br/>
            			<small><em class="nc">$10. 1ML glass screw top vials</em></small>
            		</h2>
            	</div>

            	<div id="palettes-sidebar">
            		<p><em>Need Some Ideas?</em></p>
            		<h4>Top Notes <i class="fa fa-angle-right"></i></h4>
            		<ul>
            			<?php foreach ($raw_materials as $rm)
		                    {
		                    	if ( $rm['tmd'] === 'top') echo '<li>'.$rm['name'].'</li>';
		                    }
	                    ?>
            		</ul>
            		<h4>Heart Notes <i class="fa fa-angle-right"></i></h4>
            		<ul>
            			<?php foreach ($raw_materials as $rm)
		                    {
		                    	if ( $rm['tmd'] === 'heart') echo '<li>'.$rm['name'].'</li>';
		                    }
	                    ?>
            		</ul>
            		<h4>Base Notes <i class="fa fa-angle-right"></i></h4>
            		<ul>
            			<?php foreach ($raw_materials as $rm)
		                    {
		                    	if ( $rm['tmd'] === 'base') echo '<li>'.$rm['name'].'</li>';
		                    }
	                    ?>
            		</ul>
            		<h4>Floral Notes <i class="fa fa-angle-right"></i></h4>
            		<ul>
            			<?php foreach ($raw_materials as $rm)
		                    {
		                    	if ( $rm['family'] === 'floral') echo '<li>'.$rm['name'].'</li>';
		                    }
	                    ?>
            		</ul>
            	</div>
                <!--<div class="palettes" name="floral">
                	<a class="fader" href="#">
                		<img src='assets/public/images/palettes/floral.png' />
                		<img src='assets/public/images/palettes/floralAlt.png' />
                	</a>
                </div>
                <div class="palettes" name="top">
                	<a class="fader" href="#">
                		<img src='assets/public/images/palettes/top.png' />
                		<img src='assets/public/images/palettes/topAlt.png' />
                	</a>
                </div>
                <div class="palettes" name="base">
                	<a class="fader" href="#">
                		<img src='assets/public/images/palettes/base.png' />
                		<img src='assets/public/images/palettes/baseAlt.png' />
                	</a>
                </div>
                <div class="palettes" name="choose">
                	<a class="fader" href="#">
                		<img src='assets/public/images/palettes/choose.png' />
                		<img src='assets/public/images/palettes/chooseAlt.png' />
                	</a>
                </div>-->
                <div class="palette-info" id="floral">
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
                <div class="palette-info" id="top">
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
                <div class="palette-info" id="base">
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
                <div class="palette-info" id="choose">
	                <p>Naturally, you may want to sample our collection of blends and raw materials before using them in your fragrance. 
                	Order a palette to receive ten small samples, blotters, and helpful tips.</p>
	                <p><em>Choose ten blends and/or raw materials:</em></p>
               	 	<div class="alert tc"></div>
	                <form id='your-palette' class="clearfix" method="post">
	                	<div class="left">
			                <select name="choose1">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
		                	    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose1', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose1', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose2">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose2', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose2', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose3">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose3', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose3', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose4">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose4', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose4', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose5">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose5', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose5', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 </div>
		               	 <div class="right">
		               	 	<select name="choose6">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose6', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose6', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose7">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose7', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose7', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose8">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose8', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose8', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose9">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose9', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose9', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 	<select name="choose10">
		                    	    <option value="" <?php echo set_select('myselect', '', TRUE); ?> >--</option>
			                    <?php foreach ($blends as $blend) 
		                        {
		                            echo '<option value="'.$blend['name'].'"'.set_select('choose10', $blend['name']).'>'.$blend['name'].'</option>';
		                        }
		                        ?>
			                    <?php foreach ($raw_materials as $rm)
			                    {
			                        echo '<option value="'.$rm['name'].'"'.set_select('choose10', $rm['name']).'>'.$rm['name'].'</option>';
			                    }
			                    ?>
		               	 	</select>
		               	 </div>
               	 	</form>
	                <?php //if ($this->tank_auth->get_user_id() == 1): ?>
	                <button id="order-palette">Add To Basket</button>
	                <?php //endif; ?>
                </div>
            </div>
            <div id="basketUpdate"></div>  

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

                    $('#palettes-sidebar ul').hide();
                    $paletteList = $('#palettes-sidebar h4');
                    $paletteList.click(function(){
                    	if ( $(this).hasClass('selected') ){
			                $paletteList.removeClass('selected').next().slideUp();
			                $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-right');
			            }
			            else {
			                $paletteList.removeClass('selected').next().slideUp();
			                $paletteList.find('i').removeClass('fa-angle-down').addClass('fa-angle-right');
			                $(this).addClass('selected').next().slideDown();
			                $(this).find('i').addClass('fa-angle-down').removeClass('fa-angle-right');
			            }
                    })
                    
                });

           		//var height = '320px',
           		//	background = "url('assets/public/images/backgrounds/palette-vials.jpg') center 84%";

           		//displayPageBanner (height, background);
                
            </script>